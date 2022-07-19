<?php

    include_once("connections/connection.php");
    
    $con = connection();
    $sql = "SELECT course.coursetitle, (SELECT COUNT(*) FROM studentinformation WHERE studentinformation.courseid = course.courseid) as total from course LEFT JOIN studentinformation on course.courseid = studentinformation.courseid GROUP BY course.coursetitle;";
    $students = $con->query($sql) or die($con->error);
    $row = $students->fetch_assoc();

    
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
                flex-direction: column;
            }
            .wrapper{
                display: flex;
                align-items: center;
                flex-direction: column;
                border: 1px solid black;
                max-width: 1200px;
                width: 900px;
                height: 100vh;
                background-color: white;
            }
            .container{
                width:600px;
            }
        </style>
    </head>
    <body>
    <main>
        <div class="wrapper">
            <div class="container mt-3">
                <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">COURSE</th>
                    <th scope="col">STUDENTS ENROLLED</th>
                    </tr>
                </thead>
                <tbody>
                <?php do{ ?>
                    <tr>
                    
                    <td><?php echo $row['coursetitle'];?></td>
                    <td> <?php echo $row['total'];?></td>
                    </tr>
                <?php }while($row = $students->fetch_assoc()); ?> 
                </tbody>
                </table>
            </div>
            <a href="index.html" class="btn btn-primary">Home</a>

        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
    </html>