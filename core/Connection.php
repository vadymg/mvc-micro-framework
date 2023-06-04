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
 * The Connection class.
 *
 * @author Vadym Gerega <vadym.gerega@gmail.com>
 */
class Connection
{

    /**
     * @var \PDO A PDO instance.
     */
    private $connection;

    /**
     * Get database connection.
     * 
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        if (!$this->connection) {
            try {
                $this->connection = new \PDO(DATABASE_URL, DATABASE_USERNAME, DATABASE_PASSWORD);
                $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $exc) {
                echo "Connection failed: " . $exc->getMessage();
            }
        }

        return $this->connection;
    }

}
