<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('models/database.php');

try {
    $student_id = $_POST['student_id'];
    $section_id = $_POST['section_id'];
    $enrollment_date = date('Y-m-d');

    if (empty($student_id) || empty($section_id)) {
        echo "<h3>Error</h3>";
        echo "<p>Please select both a student and a section.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit();
    }

    $check_query = 'SELECT * FROM Enrollment
                    WHERE student_id = :student_id
                    AND section_id = :section_id';

    $check_statement = $database->prepare($check_query);
    $check_statement->bindValue(':student_id', $student_id);
    $check_statement->bindValue(':section_id', $section_id);
    $check_statement->execute();
    $existing = $check_statement->fetch();
    $check_statement->closeCursor();

    if ($existing) {
        echo "<h3>Error</h3>";
        echo "<p>This student is already enrolled in that section.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit();
    }

    $query = 'INSERT INTO Enrollment
                (student_id, section_id, enrollment_date)
              VALUES
                (:student_id, :section_id, :enrollment_date)';

    $statement = $database->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $statement->bindValue(':section_id', $section_id);
    $statement->bindValue(':enrollment_date', $enrollment_date);
    $statement->execute();
    $statement->closeCursor();

    header('Location: index.php#enrollments');
    exit();

} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('models/database.php');

try {
    $enrollment_id = $_POST['enrollment_id'];
    $student_id = $_POST['student_id'];
    $section_id = $_POST['section_id'];

    if (empty($student_id) || empty($section_id)) {
        echo "<h3>Error</h3>";
        echo "<p>Please select both a student and a section.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit();
    }

    $check_query = 'SELECT * FROM Enrollment
                    WHERE student_id = :student_id
                    AND section_id = :section_id
                    AND enrollment_id != :enrollment_id';

    $check_statement = $database->prepare($check_query);
    $check_statement->bindValue(':student_id', $student_id);
    $check_statement->bindValue(':section_id', $section_id);
    $check_statement->bindValue(':enrollment_id', $enrollment_id);
    $check_statement->execute();
    $existing = $check_statement->fetch();
    $check_statement->closeCursor();

    if ($existing) {
        echo "<h3>Error</h3>";
        echo "<p>This student is already enrolled in that section.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit();
    }

    $query = 'UPDATE Enrollment
              SET student_id = :student_id,
                  section_id = :section_id
              WHERE enrollment_id = :enrollment_id';

    $statement = $database->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $statement->bindValue(':section_id', $section_id);
    $statement->bindValue(':enrollment_id', $enrollment_id);
    $statement->execute();
    $statement->closeCursor();

    header('Location: index.php#enrollments');
    exit();

} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>