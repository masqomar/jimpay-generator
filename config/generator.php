<?php

return [
    /**
     * If any input file(image) as default will used options below.
     */
    'image' => [
        /**
         * Path for store the image.
         *
         * avaiable options:
         * 1. public
         * 2. storage
         */
        'path' => 'storage',

        /**
         * Will used if image is nullable and default value is null.
         */
        'default' => 'https://via.placeholder.com/350?text=No+Image+Avaiable',

        /**
         * Crop the uploaded image using intervention image.
         */
        'crop' => true,

        /**
         * When set to true the uploaded image aspect ratio will still original.
         */
        'aspect_ratio' => true,

        /**
         * Crop image size.
         */
        'width' => 500,
        'height' => 500,
    ],

    'format' => [
        /**
         * Will used to first year on select, if any column type year.
         */
        'first_year' => 1900,

        /**
         * If any date column type will cast and display used this format, but for input date still will used Y-m-d format.
         *
         * another most common format:
         * - M d Y
         * - d F Y
         * - Y m d
         */
        'date' => 'd/m/Y',

        /**
         * If any input type month will cast and display used this format.
         */
        'month' => 'm/Y',

        /**
         * If any input type time will cast and display used this format.
         */
        'time' => 'H:i',

        /**
         * If any datetime column type or datetime-local on input, will cast and display used this format.
         */
        'datetime' => 'd/m/Y H:i',

        /**
         * Limit string on index view for any column type text or longtext.
         */
        'limit_text' => 100,
    ],

    /**
     * It will used for generator to manage and showing menus on sidebar views.
     *
     * Example:
     * [
     *   'header' => 'Main',
     *
     *   // All permissions in menus[] and submenus[]
     *   'permissions' => ['test view'],
     *
     *   menus' => [
     *       [
     *          'title' => 'Main Data',
     *          'icon' => '<i class="bi bi-collection-fill"></i>',
     *          'route' => null,
     *
     *          // permission always null when isset submenus
     *          'permission' => null,
     *
     *          // All permissions on submenus[] and will empty[] when submenus equals to []
     *          'permissions' => ['test view'],
     *
     *          'submenus' => [
     *                 [
     *                     'title' => 'Tests',
     *                     'route' => '/tests',
     *                     'permission' => 'test view'
     *                  ]
     *               ],
     *           ],
     *       ],
     *  ],
     *
     * This code below always changes when you use a generator and maybe you must lint or format the code.
     */
    'sidebars' => [
        [
            'header' => 'Main',
            'permissions' => [
                'deviden view',
                'period view',
                'user topup view',
                'saving account type view',
                'saving account view',
                'cashflow view',
                'kop product type view',
                'user saving view',
                'kop product view',
                'user saving transaction view',
                'bank view',
                'cashflow transaction view'
            ],
            'menus' => [
                [
                    'title' => 'Main Data',
                    'icon' => '<i class="bi bi-collection-fill"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'deviden view',
                        'period view',
                        'kop product type view',
                        'kop product view',
                        'bank view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Prosentase SHU',
                            'route' => '/devidens',
                            'permission' => 'deviden view'
                        ],
                        [
                            'title' => 'Periode',
                            'route' => '/periods',
                            'permission' => 'period view'
                        ],
                        [
                            'title' => 'Tipe Produk Koperasi',
                            'route' => '/kop-product-types',
                            'permission' => 'kop product type view'
                        ],
                        [
                            'title' => 'Produk Koperasi',
                            'route' => '/kop-products',
                            'permission' => 'kop product view'
                        ],
                        [
                            'title' => 'Banks',
                            'route' => '/banks',
                            'permission' => 'bank view'
                        ]
                    ]
                ],
                [
                    'title' => 'Topup JIMPay',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'user topup view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Topup Anggota',
                            'route' => '/user-topups',
                            'permission' => 'user topup view'
                        ]
                    ]
                ],
                [
                    'title' => 'Kas Koperasi',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'saving account type view',
                        'saving account view',
                        'cashflow view',
                        'cashflow transaction view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Tipe Akun',
                            'route' => '/saving-account-types',
                            'permission' => 'saving account type view'
                        ],
                        [
                            'title' => 'Kode Akun',
                            'route' => '/saving-accounts',
                            'permission' => 'saving account view'
                        ],
                        [
                            'title' => 'Transaksi Kas',
                            'route' => '/cashflows',
                            'permission' => 'cashflow view'
                        ],
                        [
                            'title' => 'Cashflow Transactions',
                            'route' => '/cashflow-transactions',
                            'permission' => 'cashflow transaction view'
                        ]
                    ]
                ],
                [
                    'title' => 'Simpanan Anggota',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'user saving view',
                        'user saving transaction view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Simpanan Anggota',
                            'route' => '/user-savings',
                            'permission' => 'user saving view'
                        ],
                        [
                            'title' => 'Transaksi Simpanan',
                            'route' => '/user-saving-transactions',
                            'permission' => 'user saving transaction view'
                        ]
                    ]
                ]
            ]
        ],
        [
            'header' => 'Pembiayaan',
            'permissions' => [
                'paylater provider view',
                'paylater view',
                'paylater transaction view'
            ],
            'menus' => [
                [
                    'title' => 'Paylater Providers',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => '/paylater-providers',
                    'permission' => 'paylater provider view',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Paylaters',
                    'icon' => '<i class="bi bi-people"></i>',
                    'route' => '/paylaters',
                    'permission' => 'paylater view',
                    'permissions' => [],
                    'submenus' => []
                ],
            ]
        ],
        [
            'header' => 'Users',
            'permissions' => [
                'user view',
                'role & permission view'
            ],
            'menus' => [
                [
                    'title' => 'Users',
                    'icon' => '<i class="bi bi-people-fill"></i>',
                    'route' => '/users',
                    'permission' => 'user view',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Permissions',
                    'icon' => '<i class="bi bi-person-check-fill"></i>',
                    'route' => '/permissions',
                    'permission' => 'role & permission view',
                    'permissions' => [],
                    'submenus' => []
                ],
                [
                    'title' => 'Roles',
                    'icon' => '<i class="bi bi-person-check-fill"></i>',
                    'route' => '/roles',
                    'permission' => 'role & permission view',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ]
    ]
];
