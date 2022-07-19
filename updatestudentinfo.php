<?php

    include_once("connections/connection.php");
    
    $con = connection();
    $fetch_course = "SELECT courseid FROM `course` WHERE 1";
    $courses = $con->query($fetch_course) or die($con->error);
    $row = $courses->fetch_assoc();

    $id = $_GET['ID'];
    $sql = "SELECT * FROM studentinformation WHERE studentid = '$id'";
    $students = $con->query($sql) or die($con->error);
    $result = $students->fetch_assoc();

    if(isset($_POST['submit'])){

        $id = $_GET['ID'];
        $studentfirstname = $_POST['studentfirstname'];
        $studentlastname = $_POST['studentlastname'];
        $courseid = $_POST['courseid'];

        $sql = "UPDATE studentinformation SET studentfirstname = '$studentfirstname', studentlastname = '$studentlastname', courseid = '$courseid' WHERE studentid = '$id'";
        $con->query($sql) or die ($con->error);
        echo header("Location: detailsenrollment.php?ID=".$id);
    }
        
    

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Student</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        body{
            background: url(https://ken.ph/designer-content/uploads/2018/02/20180220-sbu-career-talk.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            overflow: hidden;
        }
        .col-md-15 p{
            border-bottom: 3px solid white;
            padding-bottom: 10px;
        }
    </style>
    </head>
    <body>
        
        <div class="wrapper">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-15">
                    <div class="page-header">
                        <h2 style="font-family:Times New Roman; color:white; font-size: 2rem">Student Information</h>
                    </div>
                    <p style="font-family:Times New Roman; color:white; font-size: 1rem"=>Kindly complete this form to update student record to the database.</p>
                    
                    <form action="" method="post">		   
                    <div class="form-group">
                        <label style="font-family:Times New Roman; color:white; font-size: 2rem">First Name</label>
                        <input type="text" placeholder="Jennie" name="studentfirstname" class="form-control" value="<?php echo $result['studentfirstname'];?>" required>
                    </div>
                    <div class="form-group">
                        <label style="font-family:Times New Roman; color:white; font-size: 2rem">Last Name</label>
                        <input type="text" placeholder="Kim" name="studentlastname" class="form-control" value="<?php echo $result['studentlastname'];?>" required>
                    </div>
                    <label style="font-family:Times New Roman; color:white; font-size: 2rem" required>Course ID</label>
                    <select class="form-select" aria-label="Default select example" name="courseid">
                    <?php do{ ?>
                        <option value="<?php echo $row['courseid'];?>"><?php echo $row['courseid'];?></option>
                    <?php }while($row = $courses->fetch_assoc()); ?> 
                    </select>
                    <input type="submit" class="btn btn-primary w-100 mt-3" name="submit" value="Update Record">
                </form>
                <button onclick="history.back()" class="btn btn-primary w-100 mt-2">Back</button>
                </div>
            </div>
        </div>

        </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script>
        
    </script>


    </body>
    </html>