<?php

declare(strict_types=1);

define('ROOT_PATH', __DIR__ . '/../');

require_once ROOT_PATH . 'config/config.php';
require_once './autoload.php';

use VG\core\Dispatcher;

/**
 * This file is part of the VadymG package.
 * 
 * @copyright VadymG, 2020 
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$dispatch = new Dispatcher();
$dispatch->dispatch();
