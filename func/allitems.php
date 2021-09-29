<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/www/inc/connheroku.php');

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