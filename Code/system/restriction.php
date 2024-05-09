<?php
session_start();
$hideAccountsButton = true; 

if(isset($_SESSION['admin_id']) || isset($_SESSION['stuff_id'])){
    
    if(isset($_SESSION['stuff_id'])){
        $hideAccountsButton = true;
        if(isset($_SESSION['admin_id']) || isset($_SESSION['stuff_id'])){
            $hideButtons = false;
        }
    } else {
        $hideAccountsButton = false;
    }
}
?>