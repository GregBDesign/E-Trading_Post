<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Diploma/504-A1/www/inc/conn.php');

    try {
        $retrieveItems = "SELECT * FROM item 
            LEFT JOIN categories ON item.category = categories.catId 
            LEFT JOIN payment ON item.payment = payment.payId 
            LEFT JOIN postage ON item.postage = postage.postId
            LEFT JOIN saleFormat ON item.format = saleFormat.saleId";
        $getItems = $conn->prepare($retrieveItems);
        $getItems->execute();
        $allItems = $getItems->fetchAll();
    } catch (PDOException $e) {
        error_log($e->getMessage(), 0);
    }
?>