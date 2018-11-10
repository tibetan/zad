<?php

namespace Gallery;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;;
use Zend\Loader\StandardAutoloader;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return array_merge(
            include __DIR__ . '/../config/module.config.php',
            include __DIR__ . '/../config/router.config.php'
        );
    }

//    public function getControllerConfig()
//    {
//        return [
//            'factories' => [
//                Controller\IndexController::class => function($container) {
//                    return new Controller\IndexController(
//                        $container->get(Entity\Album::class)
//                    );
//                },
//            ],
//        ];
//    }

//    // Обработчик события.
//    public function onDispatch(MvcEvent $event)
//    {
//        // Получаем контроллер, к которому был отправлен HTTP-запрос.
//        $controller = $event->getTarget();
//        // Получаем полностью определенное имя класса контроллера.
//        $controllerClass = get_class($controller);
//        // Получаем имя модуля контроллера.
//        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
//
//        // Переключаем лэйаут только для контроллеров, принадлежащих нашему модулю.
//        if ($moduleNamespace == __NAMESPACE__) {
//            $viewModel = $event->getViewModel();
//            $viewModel->setTemplate('layout/layout2');
//        }
//    }
}
