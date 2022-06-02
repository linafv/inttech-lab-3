<?php
    include "conn.php";
    $vendor = $_GET['vendor']; 
    $sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.vendors
    inner join $db.items 
    on $db.vendors.ID_VENDORS = $db.items.fid_vendor
    where $db.vendors.name = :vendor"
    );
    $sqlSelect->execute(array('vendor' => $vendor));
    echo "Товары производителя $vendor: ";
    echo "<ol>";
    while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
      $item = $cell[3];
      echo "<li> Товар: $item </li>";
    }
    echo "</ol>";
?>
