<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <?php $this->load->view('css.php'); ?>
    <script>
        function addStudent() {
            const name = prompt("Enter student's name:");
            const subject = prompt("Enter student's subject:");
            const marks = prompt("Enter student's marks:");

            if (name && subject && marks) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "<?= base_url('student/add'); ?>", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        location.reload();
                    }
                };
                xhr.send("name=" + name + "&subject=" + subject + "&marks=" + marks);
            }
        }

        function editStudent(id) {
            const name = prompt("Enter new student's name:");
            const subject = prompt("Enter new student's subject:");
            const marks = prompt("Enter new student's marks:");

            if (name && subject && marks) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "<?= base_url('student/update/'); ?>" + id, true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        location.reload();
                    }
                };
                xhr.send("name=" + name + "&subject=" + subject + "&marks=" + marks);
            }
        }

        function deleteStudent(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                window.location.href = '<?= base_url("student/delete/"); ?>' + id;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Teacher Dashboard</h2>
        <button onclick="addStudent()">Add New Student</button>
        <a href="<?= base_url("auth/logout/"); ?>"><button class="logout">Logout</button></a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['name']; ?></td>
                    <td><?= $student['subject']; ?></td>
                    <td><?= $student['marks']; ?></td>
                    <td><button onclick="editStudent(<?= $student['id']; ?>)">Edit</button></td>
                    <td><button onclick="deleteStudent(<?= $student['id']; ?>)">Delete</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
