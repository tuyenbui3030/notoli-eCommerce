<?php
    echo "<h1>HOME</h1>";
    while($row = mysqli_fetch_array($data["itemProduct"])){
        echo $row["name"];
    }
?>