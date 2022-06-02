<?php
header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate'); 
    include "conn.php";
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<root>";
    $category = $_GET['category']; 
    $sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.category
    inner join $db.items 
    on $db.category.ID_Category = $db.items.fid_category
    where $db.category.name = :category"
    );
    $sqlSelect->execute(array('category' => $category));
    while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
      $item = $cell[3];
      echo "<row><item> $item </item></row>";
    }
    echo "</root>"
?>
