<?php
session_start();

include("connect.php");

if ($_SESSION['token'] !== $_POST['token']) {

    die("Something went wronge");

}

if ( ($_SERVER['REQUEST_METHOD'] == 'POST'))  {

    $nickname = filter_var($_POST['nickname'], FILTER_SANITIZE_STRING);

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $con->prepare("SELECT * FROM users where nickname = ?");

    $stmt->execute(array($nickname));

    if (!empty($nickname) ||  !empty($_POST['password'])) {

        $GLOBALS['row'] = $stmt->fetch(MYSQLI_ASSOC);

        $GLOBALS['db_pass'] = $row['password'];
    }

    $count = $stmt->rowCount();

    if ($_SESSION['token'] !== $_POST['token']) {

        echo "Something went worng...";
        
    } elseif (empty($nickname) ||  empty($_POST['password'])) {

        echo "All inputs are requierd";

    } elseif(!password_verify($_POST['password'], $db_pass)) {

        echo "Name or password is wrong, try again";

    } elseif($count == 0) {

        echo "User doesn't exist";

    } else {

        echo "done";

        $_SESSION['nickname'] = $nickname;       
        
    }
}