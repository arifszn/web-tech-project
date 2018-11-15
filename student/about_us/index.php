<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}
	
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>About Us</title>
        <link rel="stylesheet" href="../../css/social.css">
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
                background-color: #f9f9f9;
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
    </head>
    

    <body>
        <style>body
                {
                    margin: 0;
                    padding: 0;
                    background-image: url(../../resources/bg.jpg);
                    background-size: cover;
                    font-family: sans-serif; 
                } 
        </style>
        <div class="navbar">

            <a href="../index.php" style="float:left;">Home</a>

            <a href="../../logout.php" style="float:right;">LOG OUT</a>

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
        
        
        
        <div style="text-align:center; left:100px; color:#F0E68C; font-family:sans-serif; display:block;
                  position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 350px;
	height: 420px;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(0,0,0,.5);  ">
        <img src="../../resources/owner.jpg" class="user" style="
                                                                 
                                                                    width: 180px;
                                                                    height: 150px;
                                                                    border-radius: 10%;
                                                                    overflow: hidden;
                                                                    
                                                                    
                                                                 
                                                               ">    
        
        <p>Arif Swozon</p>
        <p>American International University-Bangladesh</p>
        <p>CSE</p>    
        <p>swazan.arif@gmail.com</p>
        </div>
        
    </body>

    </html>
