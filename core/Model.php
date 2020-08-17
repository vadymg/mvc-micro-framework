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

use VG\core\Connection;

/**
 * The Model class.
 *
 * @author Vadym Gerega <vadym.gerega@gmail.com>
 */
class Model
{

    /**
     * @var Connection A Connection instance.
     */
    private $connection;

    /**
     * @var string The current table name.
     */
    private $tableName;

    /**
     * Get connection.
     * 
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        if (!$this->connection) {
            $this->connection = new Connection();
        }

        return $this->connection->getConnection();
    }

    /**
     * Prepare SQL statement.
     * 
     * @param string $statement
     * 
     * @return \PDOStatement
     */
    protected function prepare(string $statement): \PDOStatement
    {
        return $this->getConnection()->prepare($statement);
    }

    /**
     * Find all entries.
     * 
     * @return array
     */
    public function findAll(): array
    {
        $statement = "SELECT * FROM {$this->_getTableName()};";
        $sql = $this->prepare($statement);
        $sql->execute();

        return $sql->fetchAll() ?? [];
    }

    /**
     * 
     * @param int|null $id
     * 
     * @return array
     */
    public function findById(?int $id = null): array
    {
        $statement = "SELECT * FROM {$this->_getTableName()} WHERE id = ?;";
        $sql = $this->prepare($statement);
        $sql->execute([$id]);

        $result = $sql->fetch();

        return $result !== false ? $result : [];
    }

    /**
     * Get table name from model.
     * 
     * @return string
     */
    private function _getTableName(): string
    {
        if (!$this->tableName) {
            $reflectionClass = new \ReflectionClass($this);
            $className = $reflectionClass->getShortName();
            $this->tableName = strtolower(trim($className, 's')) . 's';
        }

        return $this->tableName;
    }

}
