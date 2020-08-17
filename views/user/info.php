<?php

/*
 * This file is part of the MVC Micro Framework.
 * 
 * @copyright VadymG, 2020
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!$user) {
    echo 'There no user info.';
    return;
}

echo '<table>';
echo '<tr><td>Name</td><td>Description</td></tr>';
echo "<tr><td>{$user['name']}</td><td>{$user['description']}</td></tr>";
echo '</table>';