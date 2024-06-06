<?php
function findAll():array{
    $servername = "127.0.0.1";
    $port = "3306"; 
    $username = "root";
    $password = "123";
    $dbname = "aCouture";
    
    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=latin1";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT a.id, a.libelle, a.qteStock, a.prixAppro, c.nomCategorie, t.nomType 
        FROM article a
        JOIN categorie c ON a.categorieId = c.id
        JOIN type t ON a.typeId = t.id";

        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
    }
}

function getAllType():array {
    $servername = "127.0.0.1";
    $port = "3306"; 
    $username = "root";
    $password = "123";
    $dbname = "aCouture";
    
    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=latin1";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `type`"; 
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
    }
}

function getAllCategories():array{
    $servername = "127.0.0.1";
    $port = "3306"; 
    $username = "root";
    $password = "123";
    $dbname = "aCouture";
    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=latin1";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `categorie`"; 
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
    }
}

function dataFormulaire(): array {
    $categories = getAllCategories();
    $types = getAllType();
    
    return [
        'categories' => $categories,
        'types' => $types
    ];
}

function saveArticle(array $article): bool {
    $servername = "127.0.0.1";
    $port = "3306"; 
    $username = "root";
    $password = "123";
    $dbname = "aCouture";
    extract($article);
    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=latin1";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $conn->prepare("INSERT INTO article (libelle, qteStock, prixAppro, categorieId, typeId) VALUES (:libelle, :qteStock, :prixAppro, :categorieId, :typeId)");
        
        $sql->bindParam(':libelle', $libelle);
        $sql->bindParam(':qteStock', $qteStock);
        $sql->bindParam(':prixAppro', $prixAppro);
        $sql->bindParam(':categorieId', $nomCategorie);
        $sql->bindParam(':typeId', $nomType);

        $sql->execute();

        echo "New record created successfully";
        return true; 
    } catch(PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
        return false; 
    }
}
//DELETE FROM `article` WHERE `article`.`id` = 6 
//SELECT * FROM `article` WHERE `id`=1; 
function getById(int $id): array {
    $servername = "127.0.0.1";
    $port = "3306"; 
    $username = "root";
    $password = "123";
    $dbname = "aCouture";
    
    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=latin1";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT a.id, a.libelle, a.qteStock, a.prixAppro, a.categorieId, a.typeId, c.nomCategorie, t.nomType 
                FROM article a
                JOIN categorie c ON a.categorieId = c.id
                JOIN type t ON a.typeId = t.id 
                WHERE a.id = :id";
                
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
        return [];
    }
}



function suppression(int $id): bool {
    $servername = "127.0.0.1";
    $port = "3306"; 
    $username = "root";
    $password = "123";
    $dbname = "aCouture";
    
    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=latin1";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("DELETE FROM `article` WHERE `id` = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return true;
    } catch(PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
        return false;
    }
}
//UPDATE `article` SET `qteStock` = '120' WHERE `article`.`id` = 2; 
function modification(int $id, array $data): bool {
    $servername = "127.0.0.1";
    $port = "3306";
    $username = "root";
    $password = "123";
    $dbname = "aCouture";

    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (!isset($data['libelle'], $data['qteStock'], $data['categorieId'], $data['typeId'])) {
            throw new InvalidArgumentException('Invalid data provided');
        }
        $sql = $conn->prepare("
            UPDATE `article`
            SET `libelle` = :libelle, `qteStock` = :qteStock, `categorieId` = :categorieId, `typeId` = :typeId
            WHERE `id` = :id
        ");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':libelle', $data['libelle'], PDO::PARAM_STR);
        $sql->bindParam(':qteStock', $data['qteStock'], PDO::PARAM_INT);
        $sql->bindParam(':categorieId', $data['categorieId'], PDO::PARAM_INT);
        $sql->bindParam(':typeId', $data['typeId'], PDO::PARAM_INT);
        $sql->execute();
        return true;
    } catch (PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
        return false;
    } catch (InvalidArgumentException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

