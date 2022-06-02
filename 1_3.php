<?php
    include "conn.php";
    $min_price = $_GET['min_price'];
    $max_price = $_GET['max_price'];
    $sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.items
    where $db.items.price >= :min_price and $db.items.price <= :max_price"
    );
    $sqlSelect->execute(array('min_price' => $min_price, 'max_price' => $max_price)); 
    $cell = $sqlSelect->fetchAll();
    echo json_encode($cell);
    ?>
