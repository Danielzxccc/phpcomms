<?php

    include_once("connections/connection.php");
    
    $con = connection();
    $id = $_GET['ID'];
    $sql = "SELECT enrollment.enrollmentid, enrollment.subjectid, subject.subjecttitle, subject.units from enrollment JOIN subject on enrollment.subjectid = subject.subjectid where studentid = '$id';";
    $students = $con->query($sql) or die($con->error);
    $row = $students->fetch_assoc();

    $query = "SELECT studentinformation.studentid, studentinformation.studentfirstname, studentinformation.studentlastname, course.coursetitle from studentinformation JOIN course on studentinformation.courseid = course.courseid WHERE studentid = '$id';";
    $studentinfo = $con->query($query) or die($con->error);
    $result = $studentinfo->fetch_assoc();

    $query1 = "SELECT SUM(subject.units) as totalunits from enrollment JOIN subject on enrollment.subjectid = subject.subjectid where studentid = '$id';";
    $total_units = $con->query($query1) or die($con->error);
    $units = $total_units->fetch_assoc();
    
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;1,300&display=swap" rel="stylesheet">
        <title>View Students</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: url(https://ken.ph/designer-content/uploads/2018/02/20180220-sbu-career-talk.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            main{
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
            .wrapper{
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                border: 1px solid black;
                width: 900px;
                height: 50vh;
                background-color: white;
            }
        </style>
    </head>
    <body>
    <main>
        <div class="wrapper p-2">
            <div class="d-flex justify-content-between w-100">
                <h5>Student Number : <?php echo $result['studentid'];?> </h5>
                <h5>Student Name : <?php echo $result['studentfirstname'];?> <?php echo $result['studentlastname'];?></h5>
                <h5>Course : <?php echo $result['coursetitle'];?></h5>
            </div>
            <div class="d-flex justify-content-start w-100">
                <h5 class="me-5">Subjects Enrolled :  </h5>
                <h5 class="ms-5">Total Units : <?php echo $units['totalunits'];?></h5>
            </div>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Description</th>
                <th scope="col">Units</th>
                </tr>
            </thead>
            <tbody>
            <?php do{ ?>
                <tr>
                <td>
                    <form action="deleteenrollment.php" method="post">
                    <button type="submit" name="delete" class="btn btn-danger" onclick="return confirmation()">Delete</button>
                    <input type="hidden" name="ID" value="<?php echo $row['enrollmentid']?>">
                    <input type="hidden" name="studentid" value="<?php echo $result['studentid']?>">
                    </form>
                </td>
                <td><?php echo $row['subjectid'];?></td>
                <td><?php echo $row['subjecttitle'];?></td>
                <td><?php echo $row['units'];?></td>
                </tr>
            <?php }while($row = $students->fetch_assoc()); ?> 
            </tbody>
            </table>
        <div class="d-flex">
             <a href="viewenrollment.php" class="btn btn-primary me-4">Back</a>
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Update
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="updatestudentinfo.php?ID=<?php echo $result['studentid']; ?>">Edit Student Infomartion</a></li>
            <li><a class="dropdown-item" href="addsubjects.php?ID=<?php echo $result['studentid']; ?>">Add Subject</a></li>
        </ul>
        </div>
        </div>
       
                                       
        </div>
            
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function confirmation() {
      return confirm('Are you sure you want to delele this?');
    }
    </script>
    </body>
    </html>