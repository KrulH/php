<?php
$connection = mysqli_connect('localhost', 'root', 'deneme', 'cms');
if(!$connection) {
    die("Database connection failed");
}