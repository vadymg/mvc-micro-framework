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
 * The Controller class.
 *
 * @author Vadym Gerega <vadym.gerega@gmail.com>
 */
class Controller
{

    /**
     * @var vars 
     */
    private $vars = [];

    /**
     * Render the view.
     * 
     * @param string $filename
     * @param array $params
     * 
     * @return void
     */
    public function render(string $filename, array $params = []): void
    {
        extract($params);
        ob_start();
        require_once $this->getFilePath($filename);
        $content_for_layout = ob_get_clean();

        echo $content_for_layout;
    }

    /**
     * Get file path for rendering the view.
     * 
     * @param string $filename
     * 
     * @return string
     */
    protected function getFilePath(string $filename): string
    {
        return ROOT_PATH . "views/" . strtolower(str_replace(['VG\\controllers\\', 'Controller'], '', get_class($this))) . '/' . $filename . '.php';
    }

}
