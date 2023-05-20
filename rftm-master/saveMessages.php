<?php

$servername = "sql936.main-hosting.eu";
$username = "u572789629_RFTM"; //ok
$password = "RogerFEDERER:08/08"; //ok
$dbname = "u572789629_RFTM"; //ok

$name = $_POST["name"];
$firstName = $_POST["firstName"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!empty($nom) || !empty($firstName) || !empty($email) || !empty($subject) || !empty($message))
{
    $sql = "INSERT INTO Message VALUES(NULL,'$name', '$firstName', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        header('Location: pageContact.php?value=1#ok');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else
{
    header('Location: index.php');
}