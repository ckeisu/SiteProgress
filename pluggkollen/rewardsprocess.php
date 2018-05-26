<?php
include 'connect.php';
$sql = "SELECT COUNT(personnummer) AS countRating
FROM omdome";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($countRating = $result->fetch_assoc()) {
    echo "<h2>". $countRating["countRating"]."</h2><br>";
    $_SESSION ['countRating'] = $countRating;
    }
} else {
    echo "Du har inga omdömen ännu!";
}
?>