<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/conn.php');

    unset($_SESSION["errors"]);
    unset($_SESSION["formData"]);

    // Key array created to store individual error messages
    $formErrs = [
        "title" => "",
        "description" => "",
        "price" => "",
        "qty" => "",
        "location" => ""
    ];

    // Image upload function
    function imgUpload() {
        $imgDir = $_SERVER['DOCUMENT_ROOT'] . '/www/public/assets/images/';
        $imgBase = basename($_FILES["image"]["name"]);
        $imgFile = $imgDir . $imgBase;
        move_uploaded_file($_FILES["image"]["tmp_name"], $imgFile);
        return $imgBase;
    }

    // Variables declared for input and text area fields
    $saleType = $_POST["type"];
    $category = $_POST["category"];
    $title = '';
    $description = '';
    $price = 0;
    $qty = 0;
    $payMethod = $_POST["method"];
    $duration = $_POST["duration"];
    $loc = '';
    $postage = $_POST["post"];
    
    if($_FILES["image"]["name"] != "" && !isset($_GET['id'])){
        $image = imgUpload();
    }
    if($_FILES["image"]["name"] == "" && !isset($_GET['id'])){
        $image = 'default.png';
    }

    // formReady variable is a flag to be set to true when there are no issues in the error array
    $formReady = false;

    // Function to sanitise user input
    function sanitise($variable, $formArea, $filter = FILTER_SANITIZE_STRING) {
        if(isset($_POST[$formArea])){
            return filter_var($_POST[$formArea], $filter);
        }
    }

    // Ternary operators used to check that input fields contain correct data.
    // If false, the specific error key in the array is updated
    // It true, the sanitise function is called and the variable is updated to the sanitised user input
    $_POST["title"] == '' ? $formErrs["title"] = "Field must be completed" : $title = sanitise($title, 'title');
    $_POST["description"] == '' ? $formErrs["description"] = "Field must be completed" : $description = sanitise($description, 'description');
    $_POST["price"] <= 0 || $_POST["price"] == '' ? $formErrs["price"] = "Field must be completed and be more than 0" : $price = (int)sanitise($price, 'price', FILTER_SANITIZE_NUMBER_INT);
    $_POST["qty"] <= 0 || $_POST["qty"] == '' ? $formErrs["qty"] = "Field must be completed and be more than 0" : $qty = (int)sanitise($qty, 'qty', FILTER_SANITIZE_NUMBER_INT);
    $_POST["location"] == '' ? $formErrs["location"] = "Field must be completed" : $loc = sanitise($loc, 'location');
    
    // If there are no errors in the error array the formready flag is set to true and the item is added to the db
    $formErrs["title"] == "" &&
    $formErrs["description"] == "" &&
    $formErrs["price"] == "" &&
    $formErrs["qty"] == "" &&
    $formErrs["location"] == "" ? $formReady = true : null;

    // Validation checks are completed on both new and updated items
    if($formReady){
        if(isset($_GET['edit'])){
            if($_FILES["image"]["name"] != "" ){
                    try {
                    // If the item is being edited and a new image uploaded
                    $image = imgUpload();
                    $updateItem = "UPDATE item SET description = :description, image = :image, location = :location, payment = :payment, postage = :postage WHERE itemId = :id";
                    $updateItem = $conn->prepare($updateItem);
                    $updateItem->bindParam(":description", $description);
                    $updateItem->bindParam(":location", $loc);
                    $updateItem->bindParam(":payment", $payMethod);
                    $updateItem->bindParam(":postage", $postage);
                    $updateItem->bindParam(":image", $image);
                    $updateItem->bindParam(":id", $_GET['edit']);
                    $updateItem->execute();
        
                    header("Location: ../index.php?status=edit");
                    } catch (PDOException $e) {
                        header("Location:../index/php?status=dberr");
                        error_log($e->getMessage(), 0);
                    }
            } else {
                // If the item is being edited and a new image isn't uploaded
                try {
                    $updateItem = "UPDATE item SET description = :description, location = :location, payment = :payment, postage = :postage WHERE itemId = :id";
                    $updateItem = $conn->prepare($updateItem);
                    $updateItem->bindParam(":description", $description);
                    $updateItem->bindParam(":location", $loc);
                    $updateItem->bindParam(":payment", $payMethod);
                    $updateItem->bindParam(":postage", $postage);
                    $updateItem->bindParam(":id", $_GET['edit']);
                    $updateItem->execute();
        
                    header("Location: ../index.php?status=edit");
                } catch (PDOException $e) {
                    header("Location:../index/php?status=dberr");
                    error_log($e->getMessage(), 0);
                }
            }
        } else {
            // New items to be added.
            try {
                $addItem = "INSERT INTO item VALUES (0, :title, :description, :image, :price, :duration, :category, 
                    :format, :quantity, :location, :payment, :postage)";
                $addItem = $conn->prepare($addItem);
                $addItem->bindParam(":title", $title);
                $addItem->bindParam(":description", $description);
                $addItem->bindParam(":image", $image);
                $addItem->bindParam(":price", $price);
                $addItem->bindParam(":duration", $duration);
                $addItem->bindParam(":category", $category);
                $addItem->bindParam(":format", $saleType);
                $addItem->bindParam(":quantity", $qty);
                $addItem->bindParam(":location", $loc);
                $addItem->bindParam(":payment", $payMethod);
                $addItem->bindParam(":postage", $postage);
                $addItem->execute();
    
                header("Location: ../index.php?status=add");
            } catch (PDOException $e) {
                header("Location:../index/php?status=dberr");
                error_log($e->getMessage(), 0);
            } 
        }
    } else {
        // If there are errors with the input fields
        $formArr = [
            "title" => $title,
            "description" => $description,
            "price" => $price,
            "qty" => $qty,
            "location" => $loc
        ];
        $_SESSION["errors"] = $formErrs;
        $_SESSION["formData"] = $formArr;
        isset($_GET['edit']) ? header("Location:../views/updateitem.php?id={$_GET['edit']}") : header("Location: ../sell.php");
    }
?>