<?php

namespace Phptools\Mysql;

use PDOException;

class Pdo
{
    protected $registry = [];

    protected $tmp = [];

    protected $connection;

    protected $dsn;

    /**
     * Undocumented function
     *
     * @param string $type
     * @param string $dbname
     * @param string $host
     * @param string $username
     * @param string $password
     * @param array $driver_options
     */
    public function __construct($type = "", $dbname = "", $host = "", $username = "", $password = "", $driver_options = [])
    {
        $this->dsn = "$type:dbname=$dbname;host=$host";
        try {
            $this->connection = new \PDO($this->dsn, $username, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Undocumented function
     *
     * @param string $statment
     * @return void
     */
    public function query($statment = "")
    {
        if($statment){
            $this->connection->query($statment);
        }else{
            throw new PDOException("SQL Statement is null!");
        }
    }

    /**
     * Undocumented function
     *
     * @param string $table
     * @param array $params
     * @return void
     */
    public function add($table = "", $params = [])
    {
        if(!$table){
            throw new \PDOException("Table name is not defined");
        }
        $fields = "";
        $binds = "";
        $executable = [];
        $size = count($params);
        $i = 1;
        foreach($params as $field => $value){
            if($size!=$i){
                $fields .= "$field,";
                $binds .=":$field,";
            }else{
                $fields .= $field;
                $binds .= ":$field";
            }
            $executable[":$field"] = $value;
            $i++;
        }
        $sql = "INSERT INTO `$table` ($fields) VALUES ($binds)";
        $statment = $this->connection->prepare($sql);
        $result = $statment->execute($executable);
        return $result;
    }

    public function delete()
    {

    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function transaction()
    {

    }

    public function rollback()
    {

    }

    public function connection()
    {
        return $this->connection;
    }

    public function exec($sql = "")
    {
        return $this->connection->exec($sql);
    }
}