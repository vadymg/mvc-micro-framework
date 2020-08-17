<?php

/*
 * This file is part of the MVC Micro Framework.
 * 
 * @copyright VadymG, 2020
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!$users) {
    echo 'There no users.';
    return;
}

echo '<table>';
echo '<tr><td>ID</td><td>Name</td><td>Description</td><td>Is active</td></tr>';
foreach ($users as $user) {
    $isActive = $user['is_active'] ? 'Yes' : 'No';
    echo "<tr><td>{$user['id']}</td><td>{$user['name']}</td><td>{$user['description']}</td><td>{$isActive}</td></tr>";
}
echo '</table>';
