<?php

namespace App\Manager;



class ImageManager extends BaseManager
{
    public function uploadImage()
    {

        if (isset($_FILES['file'])) {
            //__DIR__ . './../public/images/' est le chemin vers le dossier ou l'on veut stocker les images
            $target_dir = '/var/www/html/public/images/';
            $target_file = basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["file"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_dir . $target_file)) {
                //On rajoute_un_chiffre au nom de l'image
                // on va boucler tant que le fichier existe
                $i = 1;
                while (file_exists($target_dir . $target_file)) {
                    $i++;
                    $target_file = $i . "_" . basename($_FILES["file"]["name"]);
                }
            }
            // Check file size
            if ($_FILES["file"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $target_file)) {
                    // le str target_file est le chemin vers l'image et va dans la bdd 
                    $targetId = 'SELECT MAX(idPost) FROM post';
                    $req = $this->pdo->prepare($targetId);
                    $req->execute();
                    $id = $req->fetch();

                    $insert = "INSERT INTO images (idPost, chemin, idUser) VALUES (:idPost, :chemin, :idUser)";
                    $requete = $this->pdo->prepare($insert);
                    $data = [
                        'idPost' => $id[0],
                        'chemin' => $target_file,
                        'idUser' => $_SESSION['idUser']
                    ];
                    $requete->execute($data);

                    echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }

    // afficher une image
    public function getChemin($idPost)
    {
        $select = "SELECT chemin FROM images WHERE idPost = :id";
        $req = $this->pdo->prepare($select);
        $req->execute(['id' => $idPost]);
        $chemin = $req->fetch();
        return $chemin;
    }

    public function getCheminsFromUser($idUser)
    {
        $results = [];

        $select = "SELECT chemin FROM images WHERE idUser = :idUser";
        $this->pdoStatement = $this->pdo->prepare($select);
        $this->pdoStatement->bindValue(':idUser', $idUser);
        $this->pdoStatement->execute();

        while($image = $this->pdoStatement->fetchObject('App\Entity\Image')){
            $results[] = $image;
        }

        return $results;
    }

    public function getCheminsFromPost($idPost)
    {
        $results = [];

        $select = "SELECT chemin FROM images WHERE idPost = :idPost";
        $this->pdoStatement = $this->pdo->prepare($select);
        $this->pdoStatement->bindValue(':idPost', $idPost);
        $this->pdoStatement->execute();

        while($image = $this->pdoStatement->fetchObject('App\Entity\Image')){
            $results[] = $image;
        }

        return $results;
    }

    public function deleteImagesFromUser($idUser)
    {
        $delete = "DELETE FROM images WHERE idUser = :idUser";
        $this->pdoStatement = $this->pdo->prepare($delete);
        $this->pdoStatement->bindValue('idUser', $idUser, \PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    public function deleteImagesFromPost($idPost)
    {
        $delete = "DELETE FROM images WHERE idPost = :idPost";
        $this->pdoStatement = $this->pdo->prepare($delete);
        $this->pdoStatement->bindValue('idPost', $idPost, \PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }
}