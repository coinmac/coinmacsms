<?php
$db = new mysqli('localhost','root','','smsdb');
$resource = $db->query('SELECT * FROM users');
while ( $rows = $resource->fetch_assoc() ) {
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $id = $row['id'];
    if(strlen($password)<20){
        $password = password_hash($password, PASSWORD_BCRYPT);
    }

    $db->query("UPDATE users SET username='$email', email='$username', password='$password' WHERE id='$id'");
}
$resource->free();
$db->close();
?>