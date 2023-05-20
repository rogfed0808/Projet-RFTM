<?php

$servername = "sql936.main-hosting.eu";
$username = "u572789629_RFTM"; //ok
$password = "RogerFEDERER:08/08"; //ok
$dbname = "u572789629_RFTM"; //ok

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT TypeTournoi, Nom, Joue, DATE_FORMAT(DateDebut, '%b %e'), DATE_FORMAT(DateFin, '%b %e'), DATE_FORMAT(DateDebut, '%b'), DATE_FORMAT(DateFin, '%b'),
       DATE_FORMAT(DateFin, '%e'), YEAR(DateDebut), YEAR(DateFin) FROM Tournaments ORDER BY DateDebut LIMIT 5"; //prendre les 5 prochains à partir d'ajrd
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["TypeTournoi"] != '') {
            echo "<li>" . $row["TypeTournoi"] . " - ";
        } else {
            echo "<li>";
        }

        echo " " . $row["Nom"];
        if ($row["Joue"] == 1) //va jouer
        {
            echo " " . "&#9989";
        } else if ($row["Joue"] == 2) //on ne sait pas
        {
            echo " " . "&#10067";
        } else if ($row["Joue"] == 3) //ne vas pas jouer
        {
            echo " " . "&#10060";
        }

        if ($row["YEAR(DateDebut)"] != $row["YEAR(DateFin)"]) {
            echo " : " . $row["DATE_FORMAT(DateDebut, '%b %e')"];
            echo " " . $row["YEAR(DateDebut)"];
            echo " - " . $row["DATE_FORMAT(DateFin, '%b %e')"];
            echo " " . $row["YEAR(DateFin)"];
        } else {
            if ($row["DATE_FORMAT(DateDebut, '%b')"] != $row["DATE_FORMAT(DateFin, '%b')"]) {
                echo " : " . $row["DATE_FORMAT(DateDebut, '%b %e')"];
                echo " - " . $row["DATE_FORMAT(DateFin, '%b %e')"];
                echo ", " . $row["YEAR(DateDebut)"];
            } else {
                echo " : " . $row["DATE_FORMAT(DateDebut, '%b %e')"];
                echo "-" . $row["DATE_FORMAT(DateFin, '%e')"];
                echo ", " . $row["YEAR(DateDebut)"];
            }
        }
    }


} else {
    echo "0 results";
}

?>