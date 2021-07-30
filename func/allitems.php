<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Diploma/504-A1/www/inc/conn.php');

    try {
        // $retrieveItems = "SELECT i.itemId, i.title, i.image, i.price, i.duration, i.quantity, i.description, i.location,
        // c.category, pay.paymentType, post.postType, s.saleType 
        // FROM item as i 
        // INNER JOIN categories AS c ON i.itemId = c.catId
        // INNER JOIN payment AS pay ON i.itemId = pay.payId
        // INNER JOIN postage AS post ON i.itemId = post.postId
        // INNER JOIN saleFormat AS s ON i.itemId = s.saleId";
        // $retrieveItems = "SELECT * 
        //     FROM item
        //     INNER JOIN categories AS c ON item.itemId = c.catId
        //     INNER JOIN payment AS pay ON item.itemId = pay.payId
        //     INNER JOIN postage AS post ON item.itemId = post.postId
        //     INNER JOIN saleFormat AS s ON item.itemId = s.saleId";
    //    $retrieveItems = "SELECT * 
    //         FROM item
    //         LEFT JOIN categories AS c ON item.itemId = c.catId
    //         LEFT JOIN payment AS pay ON item.itemId = pay.payId
    //         LEFT JOIN postage AS post ON item.itemId = post.postId
    //         LEFT JOIN saleFormat AS s ON item.itemId = s.saleId";
    $retrieveItems = "SELECT i.itemId, i.title, i.image, i.price, i.duration, i.quantity, i.description, i.location,
        c.category, pay.paymentType, post.postType, s.saleType 
        FROM item as i 
        LEFT JOIN categories AS c ON i.itemId = c.catId
        LEFT JOIN payment AS pay ON i.itemId = pay.payId
        LEFT JOIN postage AS post ON i.itemId = post.postId
        LEFT JOIN saleFormat AS s ON i.itemId = s.saleId";
        $getItems = $conn->prepare($retrieveItems);
        $getItems->execute();
        $allItems = $getItems->fetchAll();
    } catch (PDOException $e) {
        error_log($e->getMessage(), 0);
    }
?>