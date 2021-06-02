<?php


class RepositoryItems
{
    /**
     * @var Database
     */
    private $database;

    /**
     * RepositoryItems constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function listing()
    {
        return $this->database->all('SELECT * FROM Items');
    }

    public function create($name, $description)
    {
        $sth = "insert into `items` (`name`, `description`) values (  ?,? )";
        return $this->database->link->prepare($sth)->execute([$name, $description]);

    }

    public function delete($id)
    {
        $sth = "delete from `items` where id = ? limit 1";
        return $this->database->link->prepare($sth)->execute([$id]);
    }

    public function singleView($id)
    {
        $sth = $this->database->link->prepare("SELECT * FROM `items` where id=? limit 1");
        $sth->execute([$id]);

        return $sth->fetch();
    }

    public function update($name, $desc, $id)
    {
        $this->database->update(
            'Items',
            ['name' => $name, 'description'=>$desc],
            ['id' => $id]
        );
    }
}