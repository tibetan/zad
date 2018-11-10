<?php

namespace Gallery;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'controllers' => [
        'factories' => [
            Controller\GalleryController::class =>
                Controller\Factory\GalleryControllerFactory::class,
        ],
    ],

    'service_manager' => [
//        'aliases' => [
//            Model\AlbumInterface::class => Model\Album::class,
//        ],
//        'factories' => [
//            Model\Album::class => Model\Factory\AlbumModelFactory::class,
//        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'gallery' => __DIR__ . '/../view',
        ],
    ],

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
];
