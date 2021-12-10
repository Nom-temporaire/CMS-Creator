<?php

namespace App\Manager;



class ImageManager extends BaseManager
{
    public function uploadImage()
    {

        if (isset($_FILES['file'])) {
            //__DIR__ . './../public/images/' est le chemin vers le dossier ou l'on veut stocker les images
            $target_dir = '/var/www/html/public/images/';
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
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
            if (file_exists($target_file)) {
                //On rajoute_un_chiffre au nom de l'image
                // on va boucler tant que le fichier existe
                $i = 1;
                while (file_exists($target_file)) {
                    $i++;
                    $target_file = $target_dir . $i . basename($_FILES["file"]["name"]);
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
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    // le str target_file est le chemin vers l'image et va dans la bdd 
                    $targetId = 'SELECT MAX(idPost) FROM post';
                    $req = $this->pdo->prepare($targetId);
                    $req->execute();
                    $id = $req->fetch();

                    $insert = "INSERT INTO images (idPost, chemin) VALUES (:idPost, :chemin)";
                    $requete = $this->pdo->prepare($insert);
                    $data = [
                        'idPost' => $id[0],
                        'chemin' => $target_file
                    ];
                    $requete->execute($data);

                    echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}
