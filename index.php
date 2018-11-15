<?php

session_start();
if(isset($_COOKIE['cookieId'])) {
    $_SESSION['sessionId'] = $_COOKIE['cookieId'];
    if($_COOKIE['cookieId']=="admin")
    {
        header('Location:admin/index.php');

    }
    else{
        header("Location:student/index.php");
  
    }            
}
	if(isset($_POST['loginButton']))
	{
		$id = $_POST['id'];
		$ps = $_POST['password'];
		
        if($id=="admin" && $ps== "123")
        {
            $_SESSION["sessionId"] = "admin";
            setcookie("cookieId", "admin", time() + (86400 * 30), "/");
            header('Location:admin/index.php');
        }
        else if($id=="")
        {
            echo "<style>body
                            {
                                margin: 0;
                                padding: 0;
                                background-image: url(resources/error_bg.jpg);
                                background-size: cover;
                                font-family: sans-serif; 
                            } </style>";
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='resources/error.jpg' alt='Error'> ";
			echo "<h1>ID is Blank</h1> </center>  </div> " ;
            return;
        }
        else if($ps=="")
        {
            echo "<style>body
                            {
                                margin: 0;
                                padding: 0;
                                background-image: url(resources/error_bg.jpg);
                                background-size: cover;
                                font-family: sans-serif; 
                            } </style>";
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='resources/error.jpg' alt='Error'> ";
			echo "<h1>Password is Blank</h1> </center>  </div> " ;
            return;

        }
        //checking if inputed id is int or not
        else if ( strval($id) != strval(intval($id)) ) 
        {
            echo "<style>body
                            {
                                margin: 0;
                                padding: 0;
                                background-image: url(resources/error_bg.jpg);
                                background-size: cover;
                                font-family: sans-serif; 
                            } </style>";
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='resources/error.jpg' alt='Error'> ";
            echo "<h1>Incorrect ID Syntex</h1> </center>  </div> " ;
            return;
        }
       
        
        
		else
		{//db part
            
            	require_once('db/database.php');
                $sql = "SELECT * FROM authentication WHERE Student_id=$id";
                $result=mysqli_query($con,$sql);  
                $row=mysqli_fetch_array($result);

                if(!$row)
                {
                   echo "<style>body
                            {
                                margin: 0;
                                padding: 0;
                                background-image: url(resources/error_bg.jpg);
                                background-size: cover;
                                font-family: sans-serif; 
                            } </style>";
                    echo "<center> <div> <h1>ERROR!!</h1>";
                    echo "<img src='resources/error.jpg' alt='Error'> ";
                    echo "<h1>ID Not Registered</h1> </center>  </div> " ;
                    
                    return;
                }

                if($ps==$row['Password']) //verification successful
                {
                    $_SESSION["sessionId"] = $id;
                    setcookie("cookieId", $id, time() + (86400 * 30), "/");
                    header("Location:student/index.php");
                }
                if($ps!=$row['Password'])
                {
                    echo "<style>body
                            {
                                margin: 0;
                                padding: 0;
                                background-image: url(resources/error_bg.jpg);
                                background-size: cover;
                                font-family: sans-serif; 
                            } </style>";
                    echo "<center> <div> <h1>ERROR!!</h1>";
                    echo "<img src='resources/error.jpg' alt='Error'> ";
                    echo "<h1>Incorrect Password!</h1> </center>  </div> " ;
                    return;
                }
        }
    }

    
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>LOGIN</title>
        <script type="text/javascript" src="javascript/validate.js"></script>
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
        <link rel="stylesheet" href="css/social.css">
        <link rel="stylesheet" href="css/index_style.css">
       

    </head>

    <body>
        
        
        <div class="navbar">
        
        
        
        <a href="signup.php" style="float:right;">SIGN UP</a>
            
       <p  style="float:right; color:dodgerblue ">Don't have an account?&nbsp;</p > 

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
        
        
        <div class="loginBox">
			<img src="resources/user.png" class="user">
			<h2>Log In Here</h2>


            <form method="post" onsubmit="return indexValidate();">
                
                
                
                
                        <p>ID</p>
                        <input type="text" name="id" id="id" placeholder="Enter ID">
                    


                    
                        <p>PASSWORD</p>
                        <input type="password" name="password" id="password" placeholder="Enter Password">
                    


                    
                        <input type="submit" name="loginButton" id="loginButton" value="LOGIN" />
                    
                    
            </form>


        </center>
    </body>

    </html>
