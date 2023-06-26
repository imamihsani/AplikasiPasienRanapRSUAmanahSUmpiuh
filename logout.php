<?php 
session_start();
session_destroy(); //session akan didestroy atau diakhiri ketika klik tombol logout
header("location:login.php"); //...lalu arahkan ke laman login