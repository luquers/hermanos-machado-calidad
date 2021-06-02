<?php

$urlBase = config('app.url');

return [
    "menu" => [
        [
            "url" => $urlBase,
            "name" => "home",
            "slug" => "home",
            "icon" => "feather icon-home"
        ],
        [
            "url" => "",
            "name" => "users",
            "slug" => "users",
            "icon" => "feather icon-users",
            "submenu" => [
                [
                    "url" => $urlBase . "/user",
                    "name" => "list",
                    "icon" => "feather icon-list"
                ],
                [
                    "url" => $urlBase . "/user/create",
                    "name" => "create",
                    "icon" => "feather icon-plus"
                ]
            ]
        ]
    ]
];