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
 * The Router class.
 *
 * @author Vadym Gerega <vadym.gerega@gmail.com>
 */
class Router
{

    /**
     * Parse the request.
     * 
     * @param \VG\core\Request $request
     * 
     * @return void
     */
    public function parse(Request $request): void
    {
        $url = trim($request->getUrl(), '/') . '/';
        if ($url === '/') {
            $this->setDefaultRequest($request);
        } else {
            list(
                'controller' => $controller,
                'action' => $action,
                'params' => $params
                ) = $this->explodeUrl($url);

            $this->updateRequest($request, $controller, $action, $params);
        }
    }

    /**
     * Set default controller and action.
     * 
     * @param \VG\core\Request $request
     * 
     * @return void
     */
    public function setDefaultRequest(Request $request): void
    {
        $request
            ->setController('Default')
            ->setAction('index');
    }

    /**
     * Set request controller, action and parameters.
     * 
     * @param string $url
     * @param \VG\core\Request $request
     * 
     * @return void
     */
    private function updateRequest(Request $request, string $controller, ?string $action = null, ?array $params = []): void
    {
        $request
            ->setController($controller)
            ->setAction($action ? $action : 'index')
            ->setParams($params);
    }

    /**
     * Prepare the URL.
     * 
     * @param string $url
     * 
     * @return array
     */
    private function explodeUrl(string $url): array
    {
        $params = [];
        if (false === strpos($url, '?')) {
            $explode_url = explode('/', $url);
            list($controller, $action) = $explode_url;
            $params = array_slice($explode_url, 2);
        } else {
            $explode_url = explode('?', trim($url, '/'));
            list($controller, $action) = explode('/', $explode_url[0]);
            parse_str($explode_url[1], $params);
        }

        return [
            'controller' => $controller,
            'action' => $action,
            'params' => $params
        ];
    }

}
