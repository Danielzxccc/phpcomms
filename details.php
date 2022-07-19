<?php

    include_once("connections/connection.php");
    
    $con = connection();
    $id = $_GET['ID'];
    $sql = "SELECT studentinformation.studentid, studentinformation.studentfirstname, studentinformation.studentlastname, course.coursetitle from studentinformation JOIN course on studentinformation.courseid = course.courseid WHERE studentid = '$id';";
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
                justify-content: center;
                flex-direction: column;
            }
            .wrapper{
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                border: 1px solid black;
                max-width: 1200px;
                width: 900px;
                height: 50vh;
                background-color: white;
            }
            .inf-content{
                border:1px solid #DDDDDD;
                -webkit-border-radius:10px;
                -moz-border-radius:10px;
                border-radius:10px;
                box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
            }			                                                      
        </style>
    </head>
    <body>
    <main>
        <div class="wrapper">
        <div class="container d-flex align-items-center">
    <div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario"> 
        </div>
        <div class="col-md-6 mt-5">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                Identificacion                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        <?php echo $row['studentid'];?>    
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                FirstName                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        <?php echo $row['studentfirstname'];?>    
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                Lastname                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        <?php echo $row['studentlastname'];?>
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                Course                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                        <?php echo $row['coursetitle'];?> 
                        </td>
                    </tr>                     
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <a href="viewstudent.php" class="btn btn-primary">Back</a>
</div>
</div>                                        
        </div>
            
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
    </html>