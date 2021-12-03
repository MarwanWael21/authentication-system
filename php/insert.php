<?php
session_start();
include ("connect.php");
    
    if ($_SESSION['token'] !== $_POST['token']) {

        die("Something went wronge");

    }

    if ( ($_SERVER['REQUEST_METHOD'] == 'POST') ) {
    
        $nickname = filter_var($_POST['nickname'], FILTER_SANITIZE_STRING);

        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $file = $_FILES['avatar'];

        $fileName = $file['name'];

        $fileTmp = $file['tmp_name'];

        $fileType = $file['type'];

        $fileSize = $file['type'];


        $allowedExtensions = ['jpeg', 'jpg', 'gif', 'png'];

        $userExtention = explode(".", $fileName);

        $dump = strtolower(end($userExtention));

        $stmt = $con->prepare("SELECT * FROM users where nickname = ?");

        $stmt->execute(array($nickname));

        $count = $stmt->rowCount();

        if ($_SESSION['token'] !== $_POST['token']) {

            echo "Something went worng...";

        } elseif (empty($nickname) || empty($username) || empty($email) || empty($_POST['password']) || empty($_FILES['avatar'])) {

            echo "All inputs are requierd";

        } elseif(!in_array($dump, $allowedExtensions)) {

            echo "Choose an image eith extension [jpg, jpeg, png, gif]";

        } elseif($count > 0) {
            echo "Profile name already exist, please choose another";
        }else {

            $uploadedFile = rand(0, 1000000) . "_" . $fileName;

            move_uploaded_file("$fileTmp", "uploads\\" . $uploadedFile);

            $stmt = $con->prepare("INSERT INTO users(nickname, username, email, password, avatar) VALUES(?, ?, ?, ?, ?) ");

            $stmt->execute(array($nickname, $username, $email, $password, $uploadedFile));

            if ($stmt) {

                echo "done";

            }
        }
    }
