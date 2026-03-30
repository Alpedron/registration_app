<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('models/database.php');

try {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $program = $_POST['program'];

    $query = 'INSERT INTO Student
                (first_name, last_name, email, program)
              VALUES
                (:first_name, :last_name, :email, :program)';

    $statement = $database->prepare($query);
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