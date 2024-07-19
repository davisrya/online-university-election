<?php
    include 'admin_home.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='adminhome.css'>
    <link rel="shortcut icon" type="x-icon" href="../images/logo_ud.png">
</head>
<body>
    <div class="container">
        <header>
            <h1>Hello, <span style="color: orangered;">Mr. <?php echo htmlspecialchars($_SESSION['adminName']); ?></span></h1>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="admincontroler.php">Add Candidates</a></li>
                    <li><a href="view_votes.php">View-Result</a></li>
                    <li><a href="adminHome.php">View-Voters</a></li>
                    <li><a href="overview.php">Overview</a></li>
                    <li><a href="logout_admin.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h2>Registered Voters</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Registration No.</th>
                        <th>College</th>
                        <th>Program</th>
                        <th>Study Year</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                       <!-- <th>Action</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($student['id']); ?></td>
                        <td><?php echo htmlspecialchars($student['username']); ?></td>
                        <td><?php echo htmlspecialchars($student['registerNo']); ?></td>
                        <td><?php echo htmlspecialchars($student['college']); ?></td>
                        <td><?php echo htmlspecialchars($student['program']); ?></td>
                        <td><?php echo htmlspecialchars($student['studyYear']); ?></td>
                        <td><?php echo htmlspecialchars($student['gender']); ?></td>
                        <td><?php echo htmlspecialchars($student['email']); ?></td>
                        <td><?php echo htmlspecialchars($student['mobileNo']); ?></td>
                        <!--<td>
                            <a href="delete_student.php?id=<?php echo $student['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                        </td>-->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
