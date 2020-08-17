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

namespace VG\controllers;

use VG\core\Controller;

/**
 * The DefaultController class.
 *
 * @author Vadym Gerega <vadym.gerega@gmail.com>
 */
class DefaultController extends Controller
{

    /**
     * The index action.
     * 
     * @return void
     */
    public function index(): void
    {
        $this->render('index', ['controller' => 'Default']);
    }

}
