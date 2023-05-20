<?php

$servername = "sql936.main-hosting.eu";
$username = "u572789629_RFTM"; //ok
$password = "RogerFEDERER:08/08"; //ok
$dbname = "u572789629_RFTM"; //ok

$email = $_POST["Email"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

#vérification que l'adresse mail saisie n'est pas déjà dans la base de données
$sql0 = "SELECT Email FROM Emails";
$result = $conn->query($sql0);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //echo $row["Email"] . "<br>";
        if ($email == $row["Email"]) {
            header('Location: index.php?newsletter=1');
            exit();
        }
    }
}

#si l'adresse mail saisie n'est pas déjà dans la base, on l'ajoute
$sql = "INSERT INTO Emails(Email) VALUES('$email')";
if ( $email != "" ) {
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php?newsletter=2');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else
{
    header('Location: index.php');
}
