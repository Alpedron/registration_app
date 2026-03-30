<?php
require_once('models/database.php');

$course_query = 'SELECT * FROM Course ORDER BY course_code';
$course_statement = $database->prepare($course_query);
$course_statement->execute();
$courses = $course_statement->fetchAll();
$course_statement->closeCursor();

$faculty_query = 'SELECT * FROM Faculty ORDER BY last_name';
$faculty_statement = $database->prepare($faculty_query);
$faculty_statement->execute();
$faculty_members = $faculty_statement->fetchAll();
$faculty_statement->closeCursor();
?>

<?php include 'header.php'; ?>

<h2>Add Section</h2>

<a href="section.php">Back to Sections</a>
<br><br>

<form action="add_section_action.php" method="post">

    <label>Course:</label>
    <select name="course_id">
        <?php foreach ($courses as $course) : ?>
            <option value="<?php echo $course['course_id']; ?>">
                <?php echo $course['course_code'] . ' - ' . $course['course_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Section Number:</label>
    <input type="text" name="section_number"><br><br>

    <label>Semester:</label>
    <input type="text" name="semester"><br><br>

    <label>Year:</label>
    <input type="number" name="year"><br><br>

    <label>Faculty:</label>
    <select name="faculty_id">
        <?php foreach ($faculty_members as $faculty) : ?>
            <option value="<?php echo $faculty['faculty_id']; ?>">
                <?php echo $faculty['first_name'] . ' ' . $faculty['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Schedule:</label>
    <input type="text" name="schedule"><br><br>

    <label>Modality:</label>
    <input type="text" name="modality"><br><br>

    <label>Capacity:</label>
    <input type="number" name="capacity" min="0" required><br><br>

    <label>Seats Available:</label>
    <input type="number" name="seats_available" min="0" required><br><br>

    <input type="submit" value="Add Section">
</form>

<?php include 'footer.php'; ?>