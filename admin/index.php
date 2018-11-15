<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../index.php');
    return;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <style>
        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
        }

        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: dodgerblue;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #87CEFA;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

    </style>
    <link rel="stylesheet" href="../css/social.css">

</head>

<body>
    

    <div class="navbar">
        <a href="#" style="float:left;">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Student 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="student_manipulation/create_new_student.php">Create New</a>
                <a href="student_manipulation/index.php">Student List</a>
                <a href="student_manipulation/assign_course.php">Assign Course</a>
                

            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Course 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="course_manipulation/add_course.php">Add New</a>
                <a href="course_manipulation/index.php">Course List</a>
                


            </div>
        </div>
        
        <div class="dropdown">
            <button class="dropbtn">Tutorial 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="tutorial_manipulation/create_new_tutorial.php">Add New</a>
                <a href="tutorial_manipulation/index.php">Tutorial List</a>
                


            </div>
        </div>
        <a href="about_us/index.php" style="float:left;">About Us</a>

        <a href="../logout.php" style="float:right;">LOG OUT</a>

    </div>
    
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'> 
  
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <nav class="social">
          <ul>
            <li><a href="https://facebook.com/swozon" target="_blank">Facebook <i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/arif_swozon" target="_blank">Twitter <i class="fa fa-twitter"></i></a></li>
            <li><a href="http://google.com/+ArifulAlamSwozon" target="_blank">Google+ <i class="fa fa-google-plus"></i></a></li>
            <li><a href="mailto:swazan.arif@gmail.com">Email <i class="fa fa-envelope"></i></a></li>
          </ul>
        </nav>
    
    <style>body
                            {
                                margin: 0;
                                padding: 0;
                                background-image: url(../resources/bg.jpg);
                                background-size: cover;
                                font-family: sans-serif; 
                            } </style>
    
    
   <center> <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <style>
            .mySlides {display:none;}
        </style>


     
        <h2 class="w3-center" style="color:#2F4F4F">Welcome back, Admin</h2>
        <div class="w3-content w3-section" style="max-width:900px">
        <img class="mySlides" src="../resources/slide/slide(1).jpg" style="width:100%">
        <img class="mySlides" src="../resources/slide/slide(2).jpg" style="width:100%">
        <img class="mySlides" src="../resources/slide/slide(3).jpg" style="width:100%">
        <img class="mySlides" src="../resources/slide/slide(4).jpg" style="width:100%">
        <img class="mySlides" src="../resources/slide/slide(5).jpg" style="width:100%">
        <img class="mySlides" src="../resources/slide/slide(6).jpg" style="width:100%">




        </div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000); 
}
</script>
</center>
</body>

</html>
