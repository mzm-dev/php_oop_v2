<?php

/**
 * Class Categories
 */
class Categories
{
    // database dbection and table name
    private $db;
    private $table;

    /**
     * Category constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
        $this->table = 'categories';
    }

    public function all()
    {
        try {
            $query = "SELECT  * FROM $this->table";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findById($id = null)
    {
        try {

            $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id LIMIT 1");

            $stmt->execute(array(':id' => $id));

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function create($request)
    {

        try {

            $request = (object)$request;//Convert to std

            $name = $request->name;
            $created = date('Y-m-d H:i:s');
            $modified = date('Y-m-d H:i:s');


            $stmt = $this->db->prepare("INSERT INTO $this->table(name, created,modified) VALUES(:name, :created,:modified)");
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':created', $created);
            $stmt->bindparam(':modified', $modified);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function update($request)
    {

        try {

            $request = (object)$request;//Convert to std

            $id = $request->id;
            $name = $request->name;
            $modified = date('Y-m-d H:i:s');

            $stmt = $this->db->prepare("UPDATE $this->table SET name=:name, modified=:modified WHERE id=:id");
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':modified', $modified);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function delete()
    {

    }


}