<?php

$urlBase = config('app.url');

return [
    "menu" => [
        [
            "url" => $urlBase,
            "name" => "home",
            "slug" => "home",
            "icon" => "home"
        ],
        [
            "url" => "",
            "name" => "users",
            "slug" => "users",
            "icon" => "user",
            "roles" => ["admin"],
            "submenu" => [
                [
                    "url" => $urlBase . "/user",
                    "name" => "list",
                    "icon" => "list",
                    "slug" => "list"
                ],
                [
                    "url" => $urlBase . "/user/create",
                    "name" => "create",
                    "icon" => "plus",
                    "slug" => "create",

                ]
            ]
        ],
        [
            "url" => "",
            "name" => "chapters",
            "slug" => "chapters",
            "icon" => "folder",
            "submenu" => [
                [
                    "url" => $urlBase . "/chapter",
                    "name" => "list",
                    "icon" => "list",
                    "slug" => "list"
                ],
                [
                    "url" => $urlBase . "/chapter/create",
                    "name" => "create",
                    "icon" => "plus",
                    "slug" => "create",
                    "roles" => ["admin","manager"]
                ]
            ]
        ],
        [
            "url" => $urlBase . "/audit",
            "name" => "audit",
            "slug" => "audit",
            "icon" => "shield",
            "roles" => ["admin"]

        ],
    ]
];