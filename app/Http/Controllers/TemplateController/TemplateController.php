<?php

namespace App\Http\Controllers\TemplateController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TemplateController extends Controller {

    public function components() {
        $users = [
            [
                'id' => 1,
                'name' => 'User 1'
            ],
            [
                'id' => 2,
                'name' => 'User 2'
            ],
            [
                'id' => 3,
                'name' => 'User 3'
            ]
        ];

        $userSelected = [
            [
                'id' => 2,
                'name' => 'User 2'
            ]
        ];

        $usersSelected = [
            [
                'id' => 2,
                'name' => 'User 2'
            ],
            [
                'id' => 3,
                'name' => 'User 3'
            ]
        ];

        return view('template.components', compact('users', 'usersSelected', 'userSelected'));
    }

}
