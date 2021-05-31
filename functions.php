<?php

class Database
{
    private $link;


    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = require_once 'config.php';

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        $username = $config['username'];

        $password = $config['password'];

        $this->link = new PDO($dsn, $username, $password);

        return $this;
    }

    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute();
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

    public function listing()
    {
        $items = $this->query("SELECT * FROM `Items`");

        return $items;
    }

    public function create($name, $description)
    {
        $sth = "insert into `items` (`name`, `description`) values (  ?,? )";
        return $this->link->prepare($sth)->execute([$name, $description]);

    }

    public function delete($id)
    {
        $sth = "delete from `items` where id = ?";
        return $this->link->prepare($sth)->execute([$id]);
    }

    public function singleView($id)
    {
        $sth = $this->link->prepare("SELECT * FROM `items` where id=?");
        $sth->execute([$id]);
        return $sth->fetch();
    }

    public function update($name, $desc, $id)
    {
        $sth = "update `items` set `name` = ?, `description` = ?  where id = ?";
        return $this->link->prepare($sth)->execute([$name, $desc, $id]);
    }


}
