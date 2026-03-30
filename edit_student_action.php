<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('models/database.php');

try {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $program = $_POST['program'];

    $query = 'UPDATE Student
              SET first_name = :first_name,
                  last_name = :last_name,
                  email = :email,
                  program = :program
              WHERE student_id = :student_id';

    $statement = $database->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':program', $program);
    $statement->execute();
    $statement->closeCursor();

    header('Location: student.php');
    exit();
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>