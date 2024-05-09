<?php

if(isset($_GET["barcode_id"]) && !empty($_GET["barcode_id"])){
   
    include "connect.php";
    $barcode_id = $_GET["barcode_id"];
    $sql = "DELETE FROM visitant WHERE barcode_id = ?";
    if($stmt = $conn->prepare($sql)){
        
        $stmt->bind_param("s", $param_barcode_id);
        $param_barcode_id = $barcode_id;
        if($stmt->execute()){
            
            header("location: add_barcode.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    
    $stmt->close();
    $conn->close();
} else{
    
    header("location: add_barcode.php");
    exit();
}
?>
