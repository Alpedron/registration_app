<?php
require_once('models/database.php');

$faculty_id = $_POST['faculty_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$department = $_POST['department'];

$query = 'UPDATE Faculty
          SET first_name = :first_name,
              last_name = :last_name,
              email = :email,
              department = :department
          WHERE faculty_id = :faculty_id';

$statement = $database->prepare($query);
$statement->bindValue(':faculty_id', $faculty_id);
$statement->bindValue(':first_name', $first_name);
$statement->bindValue(':last_name', $last_name);
$statement->bindValue(':email', $email);
$statement->bindValue(':department', $department);
$statement->execute();
$statement->closeCursor();

header('Location: faculty.php');
?>