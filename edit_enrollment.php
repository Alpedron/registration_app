<?php
require_once('models/database.php');

$enrollment_id = filter_input(INPUT_GET, 'enrollment_id', FILTER_VALIDATE_INT);

// get current enrollment
$enrollment_query = 'SELECT * FROM Enrollment
                     WHERE enrollment_id = :enrollment_id';
$enrollment_statement = $database->prepare($enrollment_query);
$enrollment_statement->bindValue(':enrollment_id', $enrollment_id);
$enrollment_statement->execute();
$enrollment = $enrollment_statement->fetch();
$enrollment_statement->closeCursor();

// get students
$student_query = 'SELECT * FROM Student ORDER BY last_name, first_name';
$student_statement = $database->prepare($student_query);
$student_statement->execute();
$students = $student_statement->fetchAll();
$student_statement->closeCursor();

// get sections with course info
$section_query = 'SELECT 
                    Section.section_id,
                    Course.course_code,
                    Course.course_name,
                    Section.section_number,
                    Section.semester,
                    Section.year
                  FROM Section
                  JOIN Course ON Section.course_id = Course.course_id
                  ORDER BY Course.course_code, Section.section_number';

$section_statement = $database->prepare($section_query);
$section_statement->execute();
$sections = $section_statement->fetchAll();
$section_statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Enrollment</title>
</head>
<body>

<h2>Edit Enrollment</h2>

<a href="enrollments.php">Back to Enrollments</a>
<br><br>

<form action="edit_enrollment_action.php" method="post">

    <input type="hidden" name="enrollment_id"
           value="<?php echo $enrollment['enrollment_id']; ?>">

    <label>Student:</label>
    <select name="student_id" required>
        <?php foreach ($students as $student) : ?>
            <option value="<?php echo $student['student_id']; ?>"
                <?php if ($student['student_id'] == $enrollment['student_id']) echo 'selected'; ?>>
                <?php echo $student['first_name'] . ' ' . $student['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Section:</label>
    <select name="section_id" required>
        <?php foreach ($sections as $section) : ?>
            <option value="<?php echo $section['section_id']; ?>"
                <?php if ($section['section_id'] == $enrollment['section_id']) echo 'selected'; ?>>
                <?php
                echo $section['course_code'] . ' - ' .
                     $section['course_name'] . ' - Sec ' .
                     $section['section_number'] . ' (' .
                     $section['semester'] . ' ' . $section['year'] . ')';
                ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <input type="submit" value="Update Enrollment">
</form>

</body>
</html>