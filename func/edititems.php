<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Diploma/504-A1/www/inc/conn.php');

    function editItem($id, $db){
        try {
            $itemToEdit = "SELECT * FROM item WHERE itemId = :id";
            $itemToEdit = $db->prepare($itemToEdit);
            $itemToEdit->bindParam(":id", $id);
            $itemToEdit->execute();
            return $editItem = $itemToEdit->fetchAll();
        } catch (PDOException $e) {
            error_log($e->getMessage(), 0);
        }
    }
?>