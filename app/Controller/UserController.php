<?php

class UserController
{
    public function userLogin($email,$password)
    {
        try{
            $db = getDB();
            $hash_password= hash('sha256', $password); //Password encryption
            $stmt = $db->prepare("SELECT id,email FROM users2 WHERE email='". $email ."' AND password='". $hash_password ."' ");
            $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
            $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
            $stmt->execute();
            $count = $stmt->rowCount();
            $data=$stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            if($count)
            {
                $_SESSION['email'] = $data->email;
                $_SESSION['id']=$data->id; // Storing user session value
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    public function userRegistration($name,$password,$email)
    {
        try{
            $db = getDB();
            //$st = $db->prepare("SELECT id FROM users2 WHERE first_name=:name OR email=:email");
            //$st->bindParam("first_name", $name,PDO::PARAM_STR);
            //$st->bindParam("email", $email,PDO::PARAM_STR);
            //$st->execute();
            //$count=$st->rowCount();
//            if($count<1)
//            {
                $hash_password= hash('sha256', $password); //Password encryption
                $stmt = $db->prepare("INSERT INTO users2 (email,first_name,password) VALUES ('". $email ."','".$name."','". $hash_password."')");
                $stmt->bindParam("first_name", $name,PDO::PARAM_STR) ;
                $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
                $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
                $stmt->execute();
                $uid=$db->lastInsertId(); // Last inserted row id
                $db = null;

                $_SESSION['id']=$uid;
                return true;
//            } else {
//                $db = null;
//                return false;
//            }

        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function userDetails($id)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM users2 WHERE id=". $id ."");
            $stmt->bindParam("id", $id,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function getUserId($email)
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT id FROM users2 WHERE email='". $email ."'");
        $stmt->bindParam("email", $email,PDO::PARAM_STR) ;

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

}