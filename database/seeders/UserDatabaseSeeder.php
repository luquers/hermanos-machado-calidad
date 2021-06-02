<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reseteamos la cache sobre los permisos y roles
        app()['cache']->forget('spatie.permission.cache');

        // Creamos el rol admin(rol "admin")
        $webmaster = Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'manager'
        ]);
        Role::create([
            'name' => 'user'
        ]);

        // Creamos el usuario con todos sus atributos
        $admin = User::create([
            'username' => 'w3bm@st3r',
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@ieshnosmachado.org',
            'password' => Hash::make('machado.123'),
            'email_verified_at' => Carbon::now()
        ]);

        // Y ahora le asignamos el rol creado anteriormente al usuario
        $admin->assignRole($webmaster);

        //factory(User::class, 200)->create();
    }
}
