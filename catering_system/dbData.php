<?php

function getConnection() {
    $dbName = "cateringdb";
    $user = "root";
    $password = "";
    $host = "localhost";

    $conn = new mysqli($host, $user, $password, $dbName);
    if ($conn->connect_error) {
        return false;
    }

    return $conn;
}