<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}
require_once('../../db/database.php');

	
	$sql = "SELECT AUTO_INCREMENT
            FROM information_schema.TABLES
            WHERE TABLE_SCHEMA = 'onlineeducationsystem'
            AND TABLE_NAME = 'course'";
	$result = mysqli_query($con, $sql);
	$nextAutoIncrement = '';
	while($row = mysqli_fetch_assoc($result))
	{
		
		$nextAutoIncrement = $row['AUTO_INCREMENT'];
		
	}



if(isset($_REQUEST['saveButton']))
{
    
    $cname=$_POST['courseName'];
    $des=$_POST['description'];
    if($cname=="")
    {
        header('Location:../error.php');
        return;
    }
    if($cname=="")
    {
        header('Location:../error.php');
        return;
    }
   if($des=="")
    {
        header('Location:../error.php');
        return;
    }
    
    $sql4 = "SELECT * FROM course WHERE Course_name='$_REQUEST[courseName]'";
	
	$result4 = mysqli_query( $con, $sql4);
	
	
	if($row4 = mysqli_fetch_assoc($result4))
	{
        echo "<center> <div> <h1>ERROR!!</h1>";
        echo "<img src='../../resources/error.jpg' alt='Error'> ";
        echo "<h1>Course Exists with Same Name</h1> </center>  </div> " ;
        return;
	}
   
    
	$sql = "INSERT INTO course VALUES (null,'$cname','$des')";
	mysqli_query( $con, $sql);
	
    $sql2 = "CREATE TABLE chatbox_$nextAutoIncrement (
                                        Chat_id      INT          NOT NULL AUTO_INCREMENT,
                                        Message     TEXT         NOT NULL,
                                        Student_name VARCHAR (50) NOT NULL,
                                        Student_id   INT NOT NULL,
                                        Course_id   INT NOT NULL,
                                        Time   VARCHAR (50) NOT NULL,
                                        
                                        PRIMARY KEY CLUSTERED (Chat_id ASC)
                                    );";
    
    
    if (mysqli_query($con, $sql2)) 
    {
        	header('Location:../index.php');

    } 
    else 
    {
        
        echo "Error creating table: " . mysqli_error($con);
    }
	return;
}

    mysqli_close($con);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Add New Course</title>
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
        <style>body
                            {
                                margin: 0;
                                padding: 0;
                                background-image: url(../../resources/bg.jpg);
                                background-size: cover;
                                font-family: sans-serif; 
                            } </style>
        <div class="navbar">

            <a href="../index.php" style="float:left;">Home</a>
            
            <div class="dropdown">
            <button class="dropbtn">Student 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../student_manipulation/create_new_student.php">Create New</a>
                <a href="../student_manipulation/index.php">Student List</a>
                <a href="../student_manipulation/assign_course.php">Assign Course</a>
                

            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Course 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Add New</a>
                <a href="index.php">Course List</a>
                


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
        <br>
        <center>
            <form method="post" id="myform" onsubmit=" return addCourse();">
                <div style="position: absolute; color:#F0E68C;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: auto;
	height: auto;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(0,0,0,.5);"><table>
                    <tr>
                        <td>New Course ID :</td>
                        <td><input style="width:100%;" type="text" name="courseId" id="courseId" <?php echo "value='$nextAutoIncrement'" ?> disabled><br/></td>
                    </tr>
                    <tr>
                        <td>New Course Name :</td>
                        <td><input type="text" style="width:100%;" name="courseName" id="courseName"><br/></td>
                    </tr>



                    <tr>
                        <td>Course Description :</td>
                        <td><textarea form="myform" rows="4" cols="50" name="description" id="description"></textarea><br/></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" style="
                                  background-color : #31B0D5;
                                  color: white;
                                  width:100%;
                                  border-radius: 100px;
                                  border-color: #46b8da;" name="saveButton" id="saveButton" value="SAVE"   /></td>
                    </tr>

                    

                </table></div>
            </form>



        </center>
    </body>

    </html>
