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

use VG\{
    core\Controller, models\Users
};

/**
 * The UserController class.
 *
 * @author Vadym Gerega <vadym.gerega@gmail.com>
 */
class UserController extends Controller
{

    /**
     * Index action.
     * 
     * @return void
     */
    public function index(): void
    {
        $users = new Users();

        $this->render('index', ['users' => $users->findAll() ?? []]);
    }

    /**
     * Info action.
     * 
     * @param array $params
     * 
     * @return void
     */
    public function info(array $params = []): void
    {
        $users = new Users();

        $id = $params['id'] ?? null;
        $this->render('info', ['user' => $users->findById((int) $id) ?? []]);
    }

}
