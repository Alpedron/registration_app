<?php
require_once('models/database.php');

$query = 'SELECT 
            Section.section_id,
            Section.section_number,
            Section.semester,
            Section.year,
            Section.schedule,
            Section.modality,
            Section.capacity,
            Section.seats_available,
            Course.course_code,
            Faculty.first_name,
            Faculty.last_name
          FROM Section
          JOIN Course ON Section.course_id = Course.course_id
          JOIN Faculty ON Section.faculty_id = Faculty.faculty_id
          ORDER BY Section.section_id';

$statement = $database->prepare($query);
$statement->execute();
$sections = $statement->fetchAll();
$statement->closeCursor();
?>

<?php include 'header.php'; ?>

<h2>Section List</h2>
<a href="add_section.php" class="btn">Add Section</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Course</th>
        <th>Section Number</th>
        <th>Semester</th>
        <th>Year</th>
        <th>Faculty</th>
        <th>Schedule</th>
        <th>Modality</th>
        <th>Capacity</th>
        <th>Seats Available</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($sections as $section) : ?>
        <tr>
            <td><?php echo $section['section_id']; ?></td>
            <td><?php echo $section['course_code']; ?></td>
            <td><?php echo $section['section_number']; ?></td>
            <td><?php echo $section['semester']; ?></td>
            <td><?php echo $section['year']; ?></td>
            <td><?php echo $section['first_name'] . ' ' . $section['last_name']; ?></td>
            <td><?php echo $section['schedule']; ?></td>
            <td><?php echo $section['modality']; ?></td>
            <td><?php echo $section['capacity']; ?></td>
            <td><?php echo $section['seats_available']; ?></td>

            <td>
                <form action="edit_section.php" method="get">
                    <input type="hidden" name="section_id"
                           value="<?php echo $section['section_id']; ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>

            <td>
                <form action="delete_section.php" method="post">
                    <input type="hidden" name="section_id"
                           value="<?php echo $section['section_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<br><br>
<h2>Add Section</h2>
<form action="add_section_action.php" method="post">
    <label>Course ID:</label>
    <input type="number" name="course_id" required><br><br>

    <label>Faculty ID:</label>
    <input type="number" name="faculty_id" required><br><br>

    <label>Section Number:</label>
    <input type="text" name="section_number" required><br><br>

    <label>Semester:</label>
    <input type="text" name="semester" required><br><br>

    <label>Year:</label>
    <input type="number" name="year" required><br><br>

    <label>Schedule:</label>
    <input type="text" name="schedule"><br><br>

    <label>Modality:</label>
    <input type="text" name="modality"><br><br>

    <label>Capacity:</label>
    <input type="number" name="capacity"><br><br>

    <label>Seats Available:</label>
    <input type="number" name="seats_available"><br><br>

    <input type="submit" value="Add Section"><br><br>
</form>

<br><br>
<h2>Update Section</h2>
<form action="edit_section_action.php" method="post">
    <label>Section:</label>
    <select name="section_id" required>
        <option value="">Select Section</option>
        <?php foreach ($sections as $section) : ?>
            <option value="<?php echo $section['section_id']; ?>">
                <?php echo $section['course_code'] . ' - Sec ' . $section['section_number']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>New Course ID:</label>
    <input type="number" name="course_id" required><br><br>

    <label>New Faculty ID:</label>
    <input type="number" name="faculty_id" required><br><br>

    <label>New Section Number:</label>
    <input type="text" name="section_number" required><br><br>

    <label>New Semester:</label>
    <input type="text" name="semester" required><br><br>

    <label>New Year:</label>
    <input type="number" name="year" required><br><br>

    <label>New Schedule:</label>
    <input type="text" name="schedule"><br><br>

    <label>New Modality:</label>
    <input type="text" name="modality"><br><br>

    <label>New Capacity:</label>
    <input type="number" name="capacity"><br><br>

    <label>New Seats Available:</label>
    <input type="number" name="seats_available"><br><br>

    <input type="submit" value="Update Section"><br><br>
</form>

<br><br>
<h2>Delete Section</h2>
<form action="delete_section.php" method="post">
    <label>Section:</label>
    <select name="section_id" required>
        <option value="">Select Section</option>
        <?php foreach ($sections as $section) : ?>
            <option value="<?php echo $section['section_id']; ?>">
                <?php echo $section['course_code'] . ' - Sec ' . $section['section_number']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Delete Section"><br><br>
</form>

<?php include 'footer.php'; ?>