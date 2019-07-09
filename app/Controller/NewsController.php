<?php

class NewsController
{
    public function show($authorId, $newsId = null)
    {
        $db = getDB();
        if ($newsId) {
            $stmt = $db->prepare("SELECT * FROM news WHERE id=". $newsId ." AND author_id='". $authorId ."'");
            $stmt->bindParam("id", $id,PDO::PARAM_STR) ;
            $_SESSION['newsId'] = $newsId;
        } else {
            $stmt = $db->prepare("SELECT * FROM news WHERE author_id='". $authorId ."'");
        }
        $stmt->bindParam("author_id", $authorId,PDO::PARAM_STR) ;
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function add($authorId, $title, $description, $active)
    {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO news (name,description,is_active,author_id) VALUES ('". $title ."','".$description."',". $active.",". $authorId.")");
        $stmt->bindParam("name", $title,PDO::PARAM_STR);
        $stmt->bindParam("description", $description,PDO::PARAM_STR);
        $stmt->bindParam("is_active", $active,PDO::PARAM_STR);
        $stmt->bindParam("author_id", $authorId,PDO::PARAM_STR);
        $stmt->execute();
        //$uid=$db->lastInsertId(); // Last inserted row id
        $db = null;
        //$_SESSION['id']=$uid;
        return true;
    }

    public function update($id, $title, $description, $active)
    {
        $db = getDB();
        $stmt = $db->prepare("UPDATE news SET name = '". $title ."', description= '". $description ."', is_active = '". $active ."' WHERE id = ". $id .";");
        $stmt->bindParam("name", $title,PDO::PARAM_STR);
        $stmt->bindParam("description", $description,PDO::PARAM_STR);
        $stmt->bindParam("is_active", $active,PDO::PARAM_STR);
        $stmt->execute([$title, $description, $active]);
        $db = null;
        return true;
    }

    public function showPost()
    {

    }

    public function showAll()
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM news");
        $stmt->execute();
        $db = null;
        var_dump($stmt->fetchAll());exit;
        return $stmt->fetchAll();
    }
}