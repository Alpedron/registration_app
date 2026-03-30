<?php
require_once('models/database.php');

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

<?php include 'header.php'; ?>

<h2>Add Enrollment</h2>

<a href="enrollments.php">Back to Enrollments</a>
<br><br>

<form action="add_enrollment_action.php" method="post">

    <label>Student:</label>
    <select name="student_id" required>
        <option value="">Select Student</option>
        <?php foreach ($students as $student) : ?>
            <option value="<?php echo $student['student_id']; ?>">
                <?php echo $student['first_name'] . ' ' . $student['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Section:</label>
    <select name="section_id" required>
        <option value="">Select Section</option>
        <?php foreach ($sections as $section) : ?>
            <option value="<?php echo $section['section_id']; ?>">
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

    <input type="submit" value="Add Enrollment">
</form>

<?php include 'footer.php'; ?>