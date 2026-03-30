<?php
$data_source_name = 'mysql:host=localhost;dbname=registration';
$username = 'root';
$password = '';
$database = new PDO($data_source_name, $username, $password);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>