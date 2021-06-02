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
            ],

            'description' => [
                'type' => 'string',
                'nullable' => true
            ],
        ]
    ],

    'model' => [
        'fillable' => [
            'code',
            'name',
            'description'
        ],

    ],

    'form' => [
        'code' => [
            'input' => 'text',
            'id' => 'code',
            'label' => 'global.code'
        ],

        'name' => [
            'input' => 'text',
            'id' => 'name',
            'label' => 'global.name'
        ],
        'description' => [
            'input' => 'textarea',
            'id' => 'description',
            'label' => 'global.description'
        ]

    ],


    'dataTables' => [
        'code' => [
            'label' => 'global.code'
        ],
        'name' => [
            'label' => 'global.name'
        ],
        'description' => [
            'label' => 'global.description'
        ]
    ]
];