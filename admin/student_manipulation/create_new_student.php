<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}

    require_once('../../db/database.php');
    $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'onlineeducationsystem' AND TABLE_NAME = 'student'";
	$result = mysqli_query($con, $sql);
	$nextAutoIncrement = '';
	while($row = mysqli_fetch_assoc($result))
	{
		
		$nextAutoIncrement = $row['AUTO_INCREMENT'];
		
	}

    if(isset($_REQUEST['saveButton']))
    {
        //php validation
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
            echo "<h1>Invalid Email</h1> </center>  </div> " ;
            return;
            
        }
        if($_POST['name']=="")
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
            echo "<h1>Name is Blank</h1> </center>  </div> " ;
            return;
        }

        if($_POST['password']=="")
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
            echo "<h1>Password is Blank</h1> </center>  </div> " ;
            return;
        }

        if($_POST['email']=="")
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
            echo "<h1>Email is Blank</h1> </center>  </div> " ;
            return;
        }

        if($_POST['birthdate']=="")
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
            echo "<h1>Birthdate is Blank</h1> </center>  </div> " ;
            return;
        }
        
        if(is_numeric($_POST['name']))
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
            echo "<h1>Invalid Name</h1> </center>  </div> " ;
            return;
        }


        $sql = "INSERT INTO student VALUES (null, '$_POST[name]', '$_POST[email]', '$_POST[birthdate]', '$_POST[bloodgroup]', '$_POST[gender]')  ";
        mysqli_query( $con, $sql);
        $sql=" INSERT INTO authentication VALUES ($nextAutoIncrement, '$_POST[password]') ";
        mysqli_query( $con, $sql);
        header('Location:../index.php');
        return;

    }
    mysqli_close($con); 

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Create New Student</title>
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
        <script type="text/javascript" src="../../javascript/validate.js"></script>

    </head>

    <body>
        <div class="navbar">

            <a href="../index.php" style="float:left;">Home</a>
            <div class="dropdown">
            <button class="dropbtn">Student 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Create New</a>
                <a href="index.php">Student List</a>
                <a href="assign_course.php">Assign Course</a>
                

            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Course 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../course_manipulation/add_course.php">Add New</a>
                <a href="../course_manipulation/index.php">Course List</a>
                


            </div>
        </div>
        
        <div class="dropdown">
            <button class="dropbtn">Tutorial 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../tutorial_manipulation/create_new_tutorial.php">Add New</a>
                <a href="../tutorial_manipulation/index.php">Tutorial List</a>
                


            </div>
        </div>

            
            <a href="../../logout.php" style="float:right;">LOG OUT</a>

        </div>

        <div>
            
            <style>body
                            {
                                margin: 0;
                                padding: 0;
                                background-image: url(../../resources/bg.jpg);
                                background-size: cover;
                                font-family: sans-serif; 
                            } </style>
            </br>
            </br>
            </br>
            </br>
            <center>
                <form method="post" onsubmit="return createNewStudentValidate();">
                   <div style="position: absolute; color:#F0E68C;
    
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: auto;
	height: auto;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(0,0,0,.5);"> <table>
                        <tr>
                            <td>Name :</td>
                            <td><input type="text" name="name" id="name"><br/></td>
                        </tr>

                        <tr>
                            <td>Password :</td>
                            <td><input type="password" name="password" id="password"><br/></td>
                        </tr>

                        <tr>
                            <td>ID :</td>
                            <td><input type="text" name="id" id="id" <?php echo "value='$nextAutoIncrement'" ?> disabled ></td>
                        </tr>

                        <tr>
                            <td>Email :</td>
                            <td><input type="text" name="email" id="email"><br/></td>
                        </tr>

                        <tr>
                            <td>Birthdate :</td>
                            <td><input type="date" name="birthdate" id="birthdate" style="width:98%;"><br/></td>
                        </tr>

                        <tr>
                            <td>Blood Group :</td>
                            <td><select name="bloodgroup" id="bloodgroup" style="width:100%;">
                                      <option value="O+">O+</option>
                                      <option value="O-">O-</option>
                                      <option value="A+">A+</option>
                                      <option value="A-">A-</option>
                                      <option value="AB+">AB+</option>
                                      <option value="AB-">AB-</option>

                                        </select> </td>
                        </tr>

                        <tr>
                            <td>Gender :</td>
                            <td><input type="radio" name="gender" id="gender" value="Male" checked="checked">Male <input type="radio" name="gender" id="gender" value="Female">Female<br/></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" style="
                                  background-color : #31B0D5;
                                  color: white;
                                  width:100%;
                                  border-radius: 100px;
                                  border-color: #46b8da;" name="saveButton" id="saveButton" value="SAVE" style="width: 100%;" /></td>
                        </tr>

                    </table></div>
                </form>



            </center>
        </div>
    </body>

    </html>
