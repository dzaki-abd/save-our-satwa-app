<?php

return [
    'name' => 'Save Our Satwa',
    'manifest' => [
        'name' => 'Save Our Satwa',
        'short_name' => 'SOS',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#20c997',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => '#20c997',
        'icons' => [
            '48x48' => [
                'path' => '/img/icon/maskable_icon_x48.png',
                'sizes' => '48x48',
                'purpose' => 'any maskable'
            ],
            '72x72' => [
                'path' => '/img/icon/maskable_icon_x72.png',
                'sizes' => '72x72',
                'purpose' => 'any maskable'
            ],
            '96x96' => [
                'path' => '/img/icon/maskable_icon_x96.png',
                'sizes' => '96x96',
                'purpose' => 'any maskable'
            ],
            '128x128' => [
                'path' => '/img/icon/maskable_icon_x128.png',
                'sizes' => '128x128',
                'purpose' => 'any maskable'
            ],
            '192x192' => [
                'path' => '/img/icon/maskable_icon_x192.png',
                'sizes' => '192x192',
                'purpose' => 'any maskable'
            ],
            '384x384' => [
                'path' => '/img/icon/maskable_icon_x384.png',
                'sizes' => '384x384',
                'purpose' => 'any maskable'
            ],
            '512x512' => [
                'path' => '/img/icon/maskable_icon_x512.png',
                'sizes' => '512x512',
                'purpose' => 'any maskable'
            ],
        ],
        'splash' => [
            '640x1136' => '/img/splash/splash-640x1136.jpg',
            '750x1334' => '/img/splash/splash-750x1334.jpg',
            '828x1792' => '/img/splash/splash-828x1792.jpg',
            '1125x2436' => '/img/splash/splash-1125x2436.jpg',
            '1242x2208' => '/img/splash/splash-1242x2208.jpg',
            '1242x2688' => '/img/splash/splash-1242x2688.jpg',
            '1536x2048' => '/img/splash/splash-1536x2048.jpg',
            '1668x2224' => '/img/splash/splash-1668x2224.jpg',
            '1668x2388' => '/img/splash/splash-1668x2388.jpg',
            '2048x2732' => '/img/splash/splash-2048x2732.jpg',
        ],
        'shortcuts' => [
            [
                'name' => 'Home',
                'description' => 'Shortcut Link Home',
                'url' => '/home',
                'icons' => [
                    'src' => '/img/icon/maskable_icon_x512.png',
                    'purpose' => 'any'
                ]
            ],
        ],
        'custom' => []
    ]
];
