<?php

return [
    'views-namespace'   => 'laravel-components',
    'empty-value'       => '-',
    'default-classes'   => [
        'components'        => [
            'button'            => [
                'container'         => 'btn px-4 fw-bold',
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
                        'toggle'        => 'btn btn-secondary fw-bold dropdown-toggle',
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
                    'label'         => 'fw-bold text-dark',
                    'value'         => '',
                ],
                'pane-card'     => [
                    'container'     => 'd-block w-100',
                    'title'         => 'h2 mb-3 w-100 text-center',
                ],
            ],
            'form'          => [
                'form-input'    => [
                    'container'         => 'form-group mb-2',
                    'description'       => 'w-100 mb-2',
                    'input-container'   => 'position-relative',
                ],
                'label'         => [
                    'container'     => 'mb-1 user-select-none fw-bold',
                ],
                'inputs'        => [
                    'input'   => [
                        'container'     => 'form-control shadow-none',
                        'invalid'       => 'is-invalid',
                    ],
                    'select'        => [
                        'container'     => 'form-control shadow-none',
                        'invalid'       => 'is-invalid',
                    ],
                    'file'          => [
                        'container'         => 'file-input',
                        'input'             => 'm-0 px-2',
                        'label-container'   => 'm-0 p-1 px-3 rounded btn btn-secondary',
                        'label-icon'        => 'mr-2',
                        'label-text'        => '',

                    ],
                    'textarea'      => [
                        'container'     => 'form-control shadow-none',
                        'invalid'       => 'is-invalid',
                    ],
                ],
                'error'         => [
                    'container'     => 'invalid-feedback d-block'
                ],
            ]
        ],
        'layouts'       => [
            'pane'          => [
                'body'              => '',
                'app-div-outer'     => 'pane-layout bg-dark',
                'app-div-inner'     => 'd-flex align-items-center justify-content-center',
                'app-div-col'       => 'col-10 col-md-8 col-lg-6',
                'app-name'          => 'h1 text-white w-100 mb-4 text-center',
                'pane-container'    => 'rounded bg-light p-4',
            ],
        ],
    ],
];