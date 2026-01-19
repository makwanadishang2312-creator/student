<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #e8f4f8; font-family: Arial,ans-serif s;">
    <center>
        <h2>Student Registration Form</h2>
        <form method="POST" action="student.php">
            <table border="2" cellpadding="10">
                <tr>
                    <th>Student ID</th>
                    <td><input type="text" name="studentid" required></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>Course</th>
                    <td>
                        <select name="course" required>
                            <option value="">Select Course</option>
                            <option value="BCA">BCA</option>
                            <option value="B.Tech">B.Tech</option>
                            <option value="MBA">MBA</option>
                            <option value="MCA">BCA</option>
                            <option value="MTECH">BCA</option>
                            <option value="B.Com">B.Com</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Mobile No</th>
                    <td><input type="text" name="mobileno" required></td>
                </tr>
                <tr>
                    <th>Email ID</th>
                    <td><input type="email" name="emailid" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submitbtn" value="Submit">
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    </center>

    <?php
        if(isset($_POST['submitbtn']))
        {
            $studentid = $_POST['studentid'];
            $name = $_POST['name'];
            $course = $_POST['course'];
            $mobileno = $_POST['mobileno'];
            $emailid = $_POST['emailid'];

            // Validate Mobile Number (10 digits)
            if(!preg_match('/^[0-9]{10}$/', $mobileno))
            {
                echo "<center><font color='red' size='5'>Invalid Mobile Number! Must be 10 digits.</font></center>";
            }
            // Validate Email
            else if(!filter_var($emailid, FILTER_VALIDATE_EMAIL))
            {
                echo "<center><font color='red' size='5'>Invalid Email ID!</font></center>";
            }
            else
            {
                // Store data in a file
                $data = "Student ID: $studentid, Name: $name, Course: $course, Mobile: $mobileno, Email: $emailid\n";
                file_put_contents('student_data.txt', $data, FILE_APPEND);

                echo "<center><h2><font color='green'>Registration Successful!</font></h2>";
                echo "<table border='2' cellpadding='10'>";
                echo "<tr><th>Student ID</th><td>$studentid</td></tr>";
                echo "<tr><th>Name</th><td>$name</td></tr>";
                echo "<tr><th>Course</th><td>$course</td></tr>";
                echo "<tr><th>Mobile No</th><td>$mobileno</td></tr>";
                echo "<tr><th>Email ID</th><td>$emailid</td></tr>";
                echo "</table>";
                echo "<br><a href='student.php'><button>Add Another Student</button></a></center>";
            }
        }
    ?>
