<?php

return [
    'migration' => [
        'columns' => [
            'code' => [
                'type' => 'string',
                'nullable' => false,
                'unique' => true
            ],

            'name' => [
                'type' => 'string',
                'nullable' => false,
                'unique' => true
            ]
        ]
    ],

    'model' => [
        'fillable' => [
            'code',
            'name'
        ],

    ],

    'form' => [
        'code' => [
            'input' => 'text',
            'id' => 'name',
            'label' => 'global.code'
        ],

        'name' => [
            'input' => 'text',
            'id' => 'name',
            'label' => 'global.name'
        ]

    ],


    'dataTables' => [
        'code' => [
            'label' => 'global.code'
        ],
        'name' => [
            'label' => 'global.name'
        ]
    ]
];