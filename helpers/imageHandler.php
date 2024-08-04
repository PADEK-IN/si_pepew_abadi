<?php

class ImageHandler {
    private $target_dir = "assets/img/barang/";
    private $target_dir_profile = "assets/img/profile/";
    private $max_file_size = 500000; // Maksimum ukuran file dalam byte (500KB)
    private $allowed_file_types = ['jpg', 'jpeg', 'png', 'gif']; // Jenis file yang diperbolehkan

    // image barang
    public function uploadImage($file) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $target_file = $this->target_dir . basename($file["name"]);
        
        // Cek apakah file adalah gambar
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            return ["success" => false, "message" => "File is not an image."];
        }

        // Cek ukuran file
        if ($file["size"] > $this->max_file_size) {
            return ["success" => false, "message" => "Sorry, your file is too large."];
        }

        // Cek jenis file
        if (!in_array($imageFileType, $this->allowed_file_types)) {
            return ["success" => false, "message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
        }

        // Cek apakah upload OK
        if ($uploadOk == 0) {
            return ["success" => false, "message" => "Sorry, your file was not uploaded."];
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return ["success" => true, "filename" => basename($file["name"])];
            } else {
                return ["success" => false, "message" => "Sorry, there was an error uploading your file."];
            }
        }
    }

    // image profile
    public function uploadImageProfile($file) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $target_file = $this->target_dir_profile . basename($file["name"]);
        
        // Cek apakah file adalah gambar
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            return ["success" => false, "message" => "File is not an image."];
        }

        // Cek ukuran file
        if ($file["size"] > $this->max_file_size) {
            return ["success" => false, "message" => "Sorry, your file is too large."];
        }

        // Cek jenis file
        if (!in_array($imageFileType, $this->allowed_file_types)) {
            return ["success" => false, "message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
        }

        // Cek apakah upload OK
        if ($uploadOk == 0) {
            return ["success" => false, "message" => "Sorry, your file was not uploaded."];
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return ["success" => true, "filename" => basename($file["name"])];
            } else {
                return ["success" => false, "message" => "Sorry, there was an error uploading your file."];
            }
        }
    }
}
?>
