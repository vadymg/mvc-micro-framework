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
 * The Request class.
 *
 * @author Vadym Gerega <vadym.gerega@gmail.com>
 */
class Request
{

    /**
     * @var string 
     */
    private $url;

    /**
     * @var string Current controller.
     */
    private $controller;

    /**
     * @var string Current action.
     */
    private $action;

    /**
     * @var array The parameters.
     */
    private $params = [];

    /**
     * The constructor.
     */
    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
    }

    /**
     * Get URL.
     * 
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set controller.
     * 
     * @param string $controller
     * 
     * @return \VG\core\Request
     */
    public function setController(string $controller): Request
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get controller.
     * 
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * Set action.
     * 
     * @param string $action
     * 
     * @return \VG\core\Request
     */
    public function setAction(string $action): Request
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     * 
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Set parameters.
     * 
     * @param array $params
     * 
     * @return \VG\core\Request
     */
    public function setParams(array $params = []): Request
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get parameters.
     * 
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

}
