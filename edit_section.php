<?php
require_once('models/database.php');

$section_id = filter_input(INPUT_GET, 'section_id', FILTER_VALIDATE_INT);

$section_query = 'SELECT * FROM Section
                  WHERE section_id = :section_id';
$section_statement = $database->prepare($section_query);
$section_statement->bindValue(':section_id', $section_id);
$section_statement->execute();
$section = $section_statement->fetch();
$section_statement->closeCursor();

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

<!DOCTYPE html>
<html>
<head>
    <title>Edit Section</title>
</head>
<body>

<h2>Edit Section</h2>

<a href="section.php">Back to Sections</a>
<br><br>

<form action="edit_section_action.php" method="post">
    <input type="hidden" name="section_id"
           value="<?php echo $section['section_id']; ?>">

    <label>Course:</label>
    <select name="course_id">
        <?php foreach ($courses as $course) : ?>
            <option value="<?php echo $course['course_id']; ?>"
                <?php if ($course['course_id'] == $section['course_id']) echo 'selected'; ?>>
                <?php echo $course['course_code'] . ' - ' . $course['course_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Section Number:</label>
    <input type="text" name="section_number"
           value="<?php echo $section['section_number']; ?>"><br><br>

    <label>Semester:</label>
    <input type="text" name="semester"
           value="<?php echo $section['semester']; ?>"><br><br>

    <label>Year:</label>
    <input type="number" name="year"
           value="<?php echo $section['year']; ?>"><br><br>

    <label>Faculty:</label>
    <select name="faculty_id">
        <?php foreach ($faculty_members as $faculty) : ?>
            <option value="<?php echo $faculty['faculty_id']; ?>"
                <?php if ($faculty['faculty_id'] == $section['faculty_id']) echo 'selected'; ?>>
                <?php echo $faculty['first_name'] . ' ' . $faculty['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Schedule:</label>
    <input type="text" name="schedule"
           value="<?php echo $section['schedule']; ?>"><br><br>

    <label>Modality:</label>
    <input type="text" name="modality"
           value="<?php echo $section['modality']; ?>"><br><br>

    <label>Capacity:</label>
    <input type="number" name="capacity"
        value="<?php echo $section['capacity']; ?>" min="0" required><br><br>

    <label>Seats Available:</label>
    <input type="number" name="seats_available"
        value="<?php echo $section['seats_available']; ?>" min="0" required><br><br>

    <input type="submit" value="Update Section">
</form>

</body>
</html>