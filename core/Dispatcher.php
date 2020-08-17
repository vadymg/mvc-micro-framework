<?php

declare(strict_types=1);

/*
 * This file is part of the MVC Micro Framework.
 * 
 * @copyright VadymG, 2020
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VG\core;

/**
 * The Dispatcher class.
 *
 * @author Vadym Gerega <vadym.gerega@gmail.com>
 */
class Dispatcher
{

    /**
     * @var Request A Request instance. 
     */
    private $request;

    /**
     * @var Router A Router instance. 
     */
    private $router;

    /**
     * Dispatch.
     * 
     * @return void
     */
    public function dispatch(): void
    {
        $request = $this->getRequest();
        $this->getRouter()->parse($request);

        $controller = $this->loadController($request->getController());
        call_user_func_array([$controller, $request->getAction()], [$request->getParams()]);
    }

    /**
     * Load controller.
     * 
     * @param string $controller
     * 
     * @return \VG\core\Controller
     */
    public function loadController(string $controller): Controller
    {
        $name = ucfirst(trim($controller, 's')) . 'Controller';
        $file = ROOT_PATH . "controllers/{$name}.php";
        require_once $file;

        $className = 'VG\\controllers\\' . $name;
        return new $className();
    }

    /**
     * Get request.
     * 
     * @return \VG\core\Request
     */
    private function getRequest(): Request
    {
        if (!$this->request) {
            $this->request = new Request();
        }

        return $this->request;
    }

    /**
     * Get router.
     * 
     * @return \VG\core\Router
     */
    private function getRouter(): Router
    {
        if (!$this->router) {
            $this->router = new Router();
        }

        return $this->router;
    }

}
