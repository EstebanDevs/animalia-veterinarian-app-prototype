<?php
    $servername = '172.30.176.1';
    $hostname = 'root';
    $databasename = 'animalia';
    $conn = mysqli_connect($servername, $hostname, '', $databasename);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    echo "Connected successfully";

?>