<?php
// try {
//     $con = new PDO('mysql:host=localhost;dbname=files;charset-uft8', 'root', '');
// } catch(Exception $e) {
//     echo $e -> getMessage();
// }

try {
    $con = new PDO('mysql:host=localhost;dbname=form;charset-utf8', 'root', '');
} catch(Exception $e) {
    echo $e -> getMessage();
}
