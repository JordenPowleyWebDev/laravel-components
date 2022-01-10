<?php

return [
    'views-namespace'   => 'laravel-components',
    'empty-value'       => '-',
    'default-classes'   => [
        'components'        => [
            'button'            => [
                'container'         => 'btn px-4 font-weight-bold',
                'icon'              => 'mr-2',
                'label'             => '',
            ],
            'controls'      => [
                'dropdown'      => [
                    'item'          => [
                        'container'     => 'dropdown-item',
                    ],
                    'divider'       => [
                        'container'     => 'dropdown-divider'
                    ],
                    'menu'          => [
                        'container'     => 'dropdown',
                        'toggle'        => 'btn btn-secondary dropdown-toggle',
                        'menu'          => 'dropdown-menu',
                    ],
                ],
            ],
            'layout'        => [
                'card'          => [
                    'container'     => 'card p-0 mb-3',
                    'inner'         => 'card-body p-3',
                ],
                'card-header'   => [
                    'container'     => 'd-flex justify-content-between align-items-center mb-3',
                    'title'         => 'h2 m-0 p-0',
                ],
                'card-data'     => [
                    'container'     => 'row mb-3',
                    'column'        => 'col-12 col-md-4 col-lg-3 mb-3',
                    'label'         => 'font-weight-bold text-dark',
                    'value'         => '',
                ],
            ]
        ],
    ],
];