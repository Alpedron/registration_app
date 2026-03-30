<?php
require_once('models/database.php');

//table join to get all enrollment info for display
$query = 'SELECT 
            Enrollment.enrollment_id,
            Student.first_name,
            Student.last_name,
            Course.course_code,
            Course.course_name,
            Section.section_number,
            Section.semester,
            Section.year,
            Enrollment.enrollment_date
          FROM Enrollment
          JOIN Student ON Enrollment.student_id = Student.student_id
          JOIN Section ON Enrollment.section_id = Section.section_id
          JOIN Course ON Section.course_id = Course.course_id
          ORDER BY Enrollment.enrollment_id';

$statement = $database->prepare($query);
$statement->execute();
$enrollments = $statement->fetchAll();
$statement->closeCursor();

// students dropdown
$student_query = 'SELECT * FROM Student ORDER BY last_name, first_name';
$student_statement = $database->prepare($student_query);
$student_statement->execute();
$students = $student_statement->fetchAll();
$student_statement->closeCursor();


// sections dropdown
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


// enrollment dropdown 
$enrollment_select_query = 'SELECT 
                              Enrollment.enrollment_id,
                              Student.first_name,
                              Student.last_name,
                              Course.course_code,
                              Section.section_number
                            FROM Enrollment
                            JOIN Student ON Enrollment.student_id = Student.student_id
                            JOIN Section ON Enrollment.section_id = Section.section_id
                            JOIN Course ON Section.course_id = Course.course_id
                            ORDER BY Enrollment.enrollment_id';

$enrollment_select_statement = $database->prepare($enrollment_select_query);
$enrollment_select_statement->execute();
$enrollment_options = $enrollment_select_statement->fetchAll();
$enrollment_select_statement->closeCursor();
?>

<!--navbar-->
<?php include 'header.php'; ?> 

<?php echo '<!-- INDEX DASHBOARD -->'; ?>
<h2>Enrollment List</h2>
<a href="add_enrollment.php" class="btn">Add Enrollment</a>
<br><br>

<?php if (count($enrollments) > 0) : ?>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Student</th>
        <th>Course</th>
        <th>Section</th>
        <th>Semester</th>
        <th>Year</th>
        <th>Enrollment Date</th>
    </tr>

    <?php foreach ($enrollments as $enrollment) : ?>
        <tr>
            <td><?php echo $enrollment['enrollment_id']; ?></td>
            <td><?php echo $enrollment['first_name'] . ' ' . $enrollment['last_name']; ?></td>
            <td><?php echo $enrollment['course_code'] . ' - ' . $enrollment['course_name']; ?></td>
            <td><?php echo $enrollment['section_number']; ?></td>
            <td><?php echo $enrollment['semester']; ?></td>
            <td><?php echo $enrollment['year']; ?></td>
            <td><?php echo $enrollment['enrollment_date']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php else : ?>
    <p>No enrollments yet.</p>
<?php endif; ?>

<br><br>

<h2 id="add-enrollment">Add Enrollment</h2>

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

<br><br>

<h2 id="update-enrollment">Update Enrollment</h2>

<form action="edit_enrollment_action.php" method="post">
    <label>Enrollment:</label>
    <select name="enrollment_id" required>
        <option value="">Select Enrollment</option>
        <?php foreach ($enrollment_options as $option) : ?>
            <option value="<?php echo $option['enrollment_id']; ?>">
                <?php
                echo 'ID ' . $option['enrollment_id'] . ' - ' .
                     $option['first_name'] . ' ' . $option['last_name'] .
                     ' - ' . $option['course_code'] .
                     ' - Sec ' . $option['section_number'];
                ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>New Student:</label>
    <select name="student_id" required>
        <option value="">Select Student</option>
        <?php foreach ($students as $student) : ?>
            <option value="<?php echo $student['student_id']; ?>">
                <?php echo $student['first_name'] . ' ' . $student['last_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>New Section:</label>
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

    <input type="submit" value="Update Enrollment">
</form>

<br><br>

<h2 id="delete-enrollment">Delete Enrollment</h2>

<form action="delete_enrollment.php" method="post">
    <label>Enrollment:</label>
    <select name="enrollment_id" required>
        <option value="">Select Enrollment</option>
        <?php foreach ($enrollment_options as $option) : ?>
            <option value="<?php echo $option['enrollment_id']; ?>">
                <?php
                echo 'ID ' . $option['enrollment_id'] . ' - ' .
                     $option['first_name'] . ' ' . $option['last_name'] .
                     ' - ' . $option['course_code'] .
                     ' - Sec ' . $option['section_number'];
                ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <input type="submit" value="Delete Enrollment">
</form>

<?php include 'footer.php'; ?>