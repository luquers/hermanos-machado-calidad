<?php

return [
    'migration' => [
        'columns' => [
            'revision' => [
                'type' => 'increments',
            ],

            'date' => [
                'type' => 'timestamp',
            ],

            'description' => [
                'type' => 'string',
                'nullable' => false
            ],
        ]
    ],

    'model' => [
        'fillable' => [
            'revision',
            'date',
            'description'
        ],

    ],

    'form' => [

        'description' => [
            'input' => 'textarea',
            'id' => 'description',
            'label' => 'global.description'
        ]

    ],


    'dataTables' => [
        'revision' => [
            'label' => 'global.revision'
        ],
        'description' => [
            'label' => 'global.description'
        ],
        'date' => [
            'label' => 'global.date'
        ]
    ]
];