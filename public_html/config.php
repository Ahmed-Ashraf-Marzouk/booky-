<?php
$servername = 'localhost';
$user = 'id19095779_bookyadmin';
$pass = '7)CTtEZp1%V&Axn7';
$dbname = 'id19095779_booky';


// login 
$conn = mysqli_connect($servername, $user, $pass, $dbname);

if (!$conn) {
    echo "<script>alert('Connection to database failed')</script>";
}
