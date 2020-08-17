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

spl_autoload_register(function($class_name) {
    $class = str_replace(['VG\\', '\\'], ['', '/'], $class_name);
    $file = ROOT_PATH . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
