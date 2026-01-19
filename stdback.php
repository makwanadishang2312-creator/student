<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

</body>
</html>