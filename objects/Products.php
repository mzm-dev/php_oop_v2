<?php

/**
 * Class Products
 */

class Products
{
    private $table;
    private $db;

    /**
     * Category constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
        $this->table = 'products';
    }

    public function all()
    {

        try {
            $query = "SELECT 
                            p.id as id,
                            p.name as name,
                            p.description as description,
                            p.price as price,
                            p.category_id as category_id,
                            
                            c.name as category                         
                        FROM $this->table p
                        JOIN categories c ON c.id = p.category_id 
                      ";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            #$stmt->execute(array(':id' => $id));
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

            $stmt = $this->db->prepare("SELECT *,c.name as category 
                                        FROM $this->table as p
                                        JOIN categories c ON c.id = p.category_id  
                                        WHERE p.id = :id LIMIT 1");

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

            $category = $request->category;
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;
            $created = date('Y-m-d H:i:s');
            $modified = date('Y-m-d H:i:s');


            $stmt = $this->db->prepare("INSERT INTO $this->table(name,description,price,category_id, created,modified) VALUES(:name,:description,:price,:category,:created,:modified)");
            $stmt->bindparam(':category', $category);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':description', $description);
            $stmt->bindparam(':price', $price);
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
            $category = $request->category;
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;
            $modified = date('Y-m-d H:i:s');

            $stmt = $this->db->prepare("UPDATE $this->table SET name=:name, description=:description, price=:price, category_id=:category, modified=:modified WHERE id=:id");
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':category', $category);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':description', $description);
            $stmt->bindparam(':price', $price);
            $stmt->bindparam(':modified', $modified);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function view()
    {

    }

    public function delete()
    {

    }

    public function category_list()
    {
        try {

            $query = "SELECT id, name FROM categories";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
                foreach ($results as $result) {
                    $list[] = array('value' => $result['id'], 'name' => $result['name']);
                }
                return $list;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
