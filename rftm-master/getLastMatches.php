<?php

$servername = "sql936.main-hosting.eu";
$username = "u572789629_RFTM"; //ok
$password = "RogerFEDERER:08/08"; //ok
$dbname = "u572789629_RFTM"; //ok

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Opponent, Tournament, Win, Score, DateMatch, DoubleMatch, NomJoueurDouble FROM LastMatches ORDER BY DateMatch DESC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["DoubleMatch"] == 0) #si c'est un match en simple
        {
            if ($row["Win"] == 1)
            {
                echo "<li><i>". $row["DateMatch"] . "</i> - <strong>" . $row["Tournament"] . ":</strong> R. Federer defeated " . $row["Opponent"] . " " . $row["Score"] . " &#9989" . "</li>";
            }
            else
            {
                echo "<li><i>". $row["DateMatch"] . "</i> - <strong>" . $row["Tournament"] . ":</strong> " . $row["Opponent"] . " defeated R. Federer " . $row["Score"] . " &#10060" . "</li>";
            }
        }
        else #si c'est ujn match en double
        {
            if ($row["Win"] == 1)
            {
                echo "<li><i>". $row["DateMatch"] . "</i> - <strong>" . $row["Tournament"] . ":</strong> R. Federer/" . $row["NomJoueurDouble"] . " defeated " . $row["Opponent"] . " " . $row["Score"] . " &#9989" . "</li>";
            }
            else
            {
                echo "<li><i>". $row["DateMatch"] . "</i> - <strong>" . $row["Tournament"] . ":</strong> " . $row["Opponent"] . " defeated R. Federer/" . $row["NomJoueurDouble"] . " " . $row["Score"] . " &#10060" . "</li>";
            }
        }

    }


} else {
    echo "0 results";
}

?>