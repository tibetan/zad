<?php

namespace Gallery;

use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\GalleryController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'gallery' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/gallery[/:action[/:slug[/:id]]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'slug'   => '[a-z]+',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\GalleryController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
];
