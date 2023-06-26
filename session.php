<?php 
session_start();
if(!isset($_SESSION['Username'])){ //jika session yang membawa login berdasarkan username, maka...
    header("location:login.php"); //...arahkan ke laman login
}else{ //jika tidak, maka...
    header("location.index.php"); //...arahkan ke laman index
}