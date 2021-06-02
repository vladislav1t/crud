<?php

class Database
{
    /** @var PDO */
    public $link;


    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        $config = require_once 'config.php';

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        $username = $config['username'];

        $password = $config['password'];

        $this->link = new PDO($dsn, $username, $password);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->link->prepare($sql);
        $sth->execute($params);

        return $sth;
    }

    public function query($sql)
    {
        $sth = $this->link->prepare($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false) {
            return [];
        }

        return $result;
    }


    public function update($table, $params =[], $where = [])
    {
        $query = 'UPDATE `'.$table.'` SET ';
        $setQuery = [];
        $whereQuery = [];
        $bindings = [];
        foreach ($params as $key=>$value) {
            $bindings[] = $value;
            $setQuery[] = '`'.$key.'`=?';
        }
        foreach ($where as $key=>$value) {
            $bindings[] = $value;
            $whereQuery[] = '`'.$key.'`=?';
        }

        $query.=implode(', ', $setQuery);
        if (!empty($whereQuery)) {
            $query.=' WHERE '.implode(' AND ', $whereQuery);
        }

        $sth = $this->link->prepare($query);
        $sth->execute($bindings);

        return $sth->rowCount();
    }

    public function all($query, $bindings = [])
    {
        $sth = $this->execute($query, $bindings);

        return $sth->fetchAll();
    }

    public function first($query, array $bindings = [])
    {
        $sth = $this->execute($query, $bindings);

        return $sth->fetch();
    }




}
