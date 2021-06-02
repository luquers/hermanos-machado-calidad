<?php

namespace App\Services\UserService;

use App\DataTables\WeddingDataTable;
use App\Models\Wedding;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UsersDataTable;
use App\Repositories\UserRepo;
use App\Models\User;
use Illuminate\View\View;
use JavaScript;

class UserService {

    protected $userRepo;

    public function __construct(UserRepo $userRepo) {
        $this->userRepo = $userRepo;
    }

    /**
     * Muestra un listado de los usuarios
     *
     * @param UsersDataTable $usersDataTable
     * @return View
     */
    public function index(UsersDataTable $usersDataTable) {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('user.index'), 'name' => __('menu.users')]
        ];

        $selectOptions = [
            ['name' => __('global.select_active'), 'id' => '1'],
            ['name' => __('global.select_deleted'), 'id' => '2'],
        ];


        return $usersDataTable->render('project.users.index', ['breadcrumbs' => $breadcrumbs,
            'select' => $selectOptions]);
    }

    /**
     * Muestra el formulario de creación
     *
     * @return View
     */
    public function create() {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('user.index'), 'name' => __('menu.users')],
            ['link' => route('user.create'), 'name' => __('menu.create')]
        ];
        $selectrole = [
            ['name' => __('global.admin'), 'id' => 'admin'],
            ['name' => __('global.manager'), 'id' => 'manager'],
            ['name' => __('global.user'), 'id' => 'user'],
        ];

        JavaScript::put([
           'locale' => app()->getLocale()
        ]);

        return view('project.users.create', compact('breadcrumbs', 'selectrole'));
    }

    /**
     * Muestra el formulario de edición de un usuario específica
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user) {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('user.index'), 'name' => __('menu.users')],
            ['link' => route('user.edit', ['user' => $user->id]), 'name' => __('global.edit')]
        ];
        $selectrole = [
            ['name' => __('global.admin'), 'id' => 'admin'],
            ['name' => __('global.manager'), 'id' => 'manager'],
            ['name' => __('global.user'), 'id' => 'user'],
        ];

        JavaScript::put([
            'locale' => app()->getLocale()
        ]);



        return view('project.users.edit', compact('user', 'breadcrumbs', 'selectrole'));
    }

    /**
     * Crea un nuevo usuario
     *
     * @param  array $data
     * @return \Illuminate\Http\Response
     */
    public function store(array $data) {

        try {
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);

            switch ($data['selectrole']) {
                case 'admin':
                    $user->assignRole('admin');
                    break;
                case 'manager':
                    $user->assignRole('manager');
                    break;
                case 'user':
                    $user->assignRole('user');
                    break;
            }



            // Si existe un avatar, se lo asignamos al usuario y lo añadimos a la coleción avatar
            try {
                $user->addMediaFromRequest('avatar')
                    ->toMediaCollection('avatar');
            }catch(\Throwable $exception) {}

            if (request()->wantsJson()) {
                return response()->okJson();
            }

            // Retornamos la vista con el mensaje de success
            return response()->okView('user.index');
        }catch(\Exception $exception) {
            // Retornamos la vista con el mensaje de error
            return response()->koView('user.index');
        }
    }

    /**
     * Actualiza un usuario específico
     *
     * @param  array $data
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, User $user) {

        try {
            if (array_key_exists('password', $data) && $data['password']) {
                $data['password'] = Hash::make($data['password']);
            }
            else {
                unset($data['password']);
            }

            // Si de la request viene el objeto avatar,
            if (isset($data['avatar'])) {
                // Comprobamos si ese usuario ya tiene un avatar puesto, y si es así,
                if ($user->getMedia('avatar')->first()) {
                    // Lo borramos
                    $user->getMedia('avatar')->first()->delete();
                }
                // Si no tiene avatar, se lo asignamos
                $user->addMediaFromRequest('avatar')
                    ->toMediaCollection('avatar');

                // Si le hemos dado al botón de "Remove", un input hidden cambia su estado,
            } elseif ($data['avatar-status'] == 0) {
                // y aquí borramos la foto que ya tenía.
                $user->getMedia('avatar')->first()->delete();
            }

            $user->fill($data)->update();
            if (isset($data['selectrole'])){

                    $user->roles()->detach();
                    switch ($data['selectrole']) {
                        case 'admin':
                            $user->assignRole('admin');
                            break;
                        case 'manager':
                            $user->assignRole('manager');
                            break;
                        case 'user':
                            $user->assignRole('user');
                            break;
                    }

            }

            // Retornamos la vista con el mensaje de success
            return response()->okView('user.index');
        }catch (\Exception $exception) {
            // Retornamos la vista con el mensaje de error
            return response()->koView('user.index');
        }
    }

    public function destroy(User $user) {

        /* Si el usuario seleccionado tiene el campo deleted_at distinto de null,
        * es que ya ha sido borrado anteriormente, por lo que lo borramos permanentemente
        */
        if ($user->deleted_at != null) {
            $user->forceDelete();
        }

        // Si no, lo borramos, por lo que se le aplica el softDelete
        $this->userRepo->delete($user);

        return response()->okJson();
    }

    public function restore(User $user)
    {

        $user->restore();

        return response()->okView('user.index', [], $user->name . " " . __('global.restored_successfully'));
    }
}