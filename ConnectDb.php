<?php

class ConnectDb
{

    private $host = 'localhost';
    private $dbname = 'MihasProject';
    private $username = 'root';
    private $password = '';
    /**
     * @var PDO
     */
    public $con;

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {

        try {

            $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch (PDOException $e) {
            LogicException::error($e->getMessage());
        }
    }

    public function getAccountInfo()
    {
        $acc_info = $this->con->prepare("SELECT * FROM `users`");
        $acc_info->execute();

        return $results = $acc_info->fetchAll(PDO::FETCH_OBJ);

    }

    public function delete()
    {
        $sql = "DELETE FROM users WHERE id =  :ID";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':ID', $_GET['del_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function edit()
    {
//        $image = $_FILES['image']['name'];
//        $target = "image/" . basename($image);
        $id = $_GET['id'];
        $name = $_GET['name'];
        $surname = $_GET['surname'];
        $role = $_GET['role'];

        $stmt = $this->con->prepare("UPDATE users set name = :name ,surname = :surname,role =:role where id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
//        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->execute();

//        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
//            echo "Image uploaded successfully";
//        } else {
//            echo "Failed to upload image";
//        }
    }


    public function Registration()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        if (!empty($_POST)) {

        }
    }


}