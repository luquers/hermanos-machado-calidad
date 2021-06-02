<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', '10codetemplate');
set('keep_releases', 3);
set('ssh_multiplexing', false);
set('http_user', '20122');
set('http_group', '1128');

// Project repository
set('repository', 'git@github.com:10codeSoftware/10codetemplate.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

// Change default php command
set('bin/php', function() {
    return '/usr/local/lib/php-7.3.6/bin/php';
});
// Change default composer command
set('bin/composer', function() {
    run("cd {{release_path}} && {{bin/php}} composer.phar install");
    return '{{bin/php}} {{release_path}}/composer.phar';
});
set('composer_action', null);
set('composer_options', null);

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', [
    'bootstrap',
    'storage',
    'public',
    'shared'
]);

// Hosts
host('preproduccion')
    ->hostname('5.145.172.43')
    ->port(4939)
    ->user('root')
    ->forwardAgent(true)
//    ->configFile('/Users/isaaccamposrodriguez/.ssh/config')
    ->identityFile('/Users/isaac/.ssh/id_rsa')
    ->stage('preproduccion')
    ->set('branch', 'Develop')
    ->set('deploy_path', '/furanet/sites/10codetemplate.es/web/htdocs');
    
// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

// Tasks
task('permissions', function ()  {
    run('sudo chmod -R 775 {{deploy_path}}/current/bootstrap');
    run('sudo chmod -R 775 {{deploy_path}}/current/public');
    run('sudo chmod -R 775 {{deploy_path}}/current/storage');
    run('sudo chown -R {{http_user}}:{{http_group}} {{deploy_path}}/current');
    run('sudo chown -R {{http_user}}:{{http_group}} {{deploy_path}}/releases');
    run('sudo chown -R {{http_user}}:{{http_group}} {{deploy_path}}/current/public');
    run('sudo chown -R {{http_user}}:{{http_group}} {{deploy_path}}/shared');
});

task('javascript', function() {
   run('cd {{release_path}} && npm install');
   run('cd {{release_path}} && npm run dev');
});

//task('upload', function () {
//    upload(__DIR__ . "/public/js/", '{{release_path}}/public/js/');
//    upload(__DIR__ . "/public/css/", '{{release_path}}/public/css/');
//    upload(__DIR__ . "/public/mix-manifest.json", '{{release_path}}/public/mix-manifest.json');
//});

task('deployProduccion', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
])->onHosts('produccion');

task('deployPreproduccion', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
//    'upload',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'javascript',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate:fresh',
    'artisan:db:seed',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
])->onHosts('preproduccion');

// php deployer.phar clear-cache preproduccion
task('clear-cache', function () {
    run('cd {{release_path}} {{bin/php}} artisan config:cache');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

