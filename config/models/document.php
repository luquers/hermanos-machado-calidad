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

            'link' => [
                'type' => 'string',
                'nullable' => true
            ],
        ]
    ],

    'model' => [
        'fillable' => [
            'code',
            'name',
            'link'
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
        'link' => [
            'input' => 'textarea',
            'id' => 'link',
            'label' => 'global.link'
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
            'label' => 'global.link'
        ]
    ]
];