<?php

    include_once("connections/connection.php");
    
    $con = connection();
    if(isset($_POST['submit'])){

        $subjectid = $_POST['subjectid'];
        $subjecttitle = $_POST['subjecttitle'];
        $units = $_POST['units'];


        $sql = "INSERT INTO `subject` (`subjectid`, `subjecttitle`, `units`) VALUES ('$subjectid', '$subjecttitle', '$units')";
        $con->query($sql) or die ($con->error);
        echo header("Location: success.html");
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
                        <h2 style="font-family:Times New Roman; color:white; font-size: 2rem">Subject</h>
                    </div>
                    <p style="font-family:Times New Roman; color:white; font-size: 1rem"=>Kindly complete this subject to add course record to the database.</p>
                    
                    <form action="" method="post">		  
                    <div class="form-group">
                        <label style="font-family:Times New Roman; color:white; font-size: 2rem">Subject ID</label>
                        <input type="text" placeholder="ICT01" name="subjectid" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label style="font-family:Times New Roman; color:white; font-size: 2rem">Subject Title</label>
                        <input type="text" placeholder="Programming 1" name="subjecttitle" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label style="font-family:Times New Roman; color:white; font-size: 2rem">Units</label>
                        <input type="text" placeholder="2" name="units" class="form-control" required>
                    </div>
                    <input type="submit" class="btn btn-primary w-100 mt-3" name="submit" value="Input Record">
                </form>
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