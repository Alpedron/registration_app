<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('models/database.php');

$course_id = $_POST['course_id'];
$section_number = trim($_POST['section_number']);
$semester = trim($_POST['semester']);
$year = $_POST['year'];
$faculty_id = $_POST['faculty_id'];
$schedule = isset($_POST['schedule']) ? trim($_POST['schedule']) : '';
if ($schedule === '') {
    $schedule = 'TBA';
}
$modality = trim($_POST['modality']);
$capacity = $_POST['capacity'];
$seats_available = $_POST['seats_available'];

if (
    empty($section_number) ||
    empty($semester) ||
    empty($year) ||
    empty($modality) ||
    $capacity === '' ||
    $seats_available === ''
) {
    echo "Error: Please fill in all fields. Capacity and Seats Available cannot be blank.";
    exit();
}

if (!is_numeric($capacity) || !is_numeric($seats_available)) {
    echo "Error: Capacity and Seats Available must be numbers.";
    exit();
}

if ($capacity < 0 || $seats_available < 0) {
    echo "Error: Capacity and Seats Available cannot be negative.";
    exit();
}

if ($seats_available > $capacity) {
    echo "Error: Seats Available cannot be greater than Capacity.";
    exit();
}

try {
    $query = 'INSERT INTO Section
                (course_id, section_number, semester, year, faculty_id, schedule, modality, capacity, seats_available)
              VALUES
                (:course_id, :section_number, :semester, :year, :faculty_id, :schedule, :modality, :capacity, :seats_available)';

    $statement = $database->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->bindValue(':section_number', $section_number);
    $statement->bindValue(':semester', $semester);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':faculty_id', $faculty_id);
    $statement->bindValue(':schedule', $schedule);
    $statement->bindValue(':modality', $modality);
    $statement->bindValue(':capacity', $capacity);
    $statement->bindValue(':seats_available', $seats_available);
    $statement->execute();
    $statement->closeCursor();

    header('Location: section.php');
    exit();
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>