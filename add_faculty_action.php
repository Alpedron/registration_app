<?php
require_once('models/database.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$department = $_POST['department'];

$query = 'INSERT INTO Faculty
            (first_name, last_name, email, department)
          VALUES
            (:first_name, :last_name, :email, :department)';

$statement = $database->prepare($query);
$statement->bindValue(':first_name', $first_name);
$statement->bindValue(':last_name', $last_name);
$statement->bindValue(':email', $email);
$statement->bindValue(':department', $department);
$statement->execute();
$statement->closeCursor();

header('Location: faculty.php');
?>