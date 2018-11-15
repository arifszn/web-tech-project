<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}


    require_once('../../db/database.php');
    $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'onlineeducationsystem' AND TABLE_NAME = 'tutorial'";
	$result = mysqli_query($con, $sql);
	$nextAutoIncrement = '';
	while($row = mysqli_fetch_assoc($result))
	{
		
		$nextAutoIncrement = $row['AUTO_INCREMENT'];
		
	}



 $sql2 = "SELECT * FROM course";
	$output2 = '';
	$result2 = mysqli_query( $con, $sql2);
	
	while($row2 = mysqli_fetch_assoc($result2))
	{ 
		
        $output2 .="<option value=$row2[Course_id]> $row2[Course_id]</option>";
        
    }



if(isset($_REQUEST['saveButton']))
{
    if(($_POST['courseId'] == '') or ($_POST['tutorialTitle'] == '') or ($_POST['tutorialLink'] == ''))
		{
			header('Location:../error.php');
		}
	else
		{
	$sql = "INSERT INTO tutorial VALUES (null, '$_POST[courseId]', '$_POST[tutorialTitle]', '$_POST[tutorialLink]')";
	mysqli_query( $con, $sql);
    header('Location:../index.php');
	return;
    }
mysqli_close($con);
}


?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>New Tutorial</title>
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
                } 
        </style>
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
                <a href="../course_manipulation/add_course.php">Add New</a>
                <a href="../course_manipulation/index.php">Course List</a>
                


            </div>
        </div>
        
        <div class="dropdown">
            <button class="dropbtn">Tutorial 
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Add New</a>
                <a href="index.php">Tutorial List</a>
                


            </div>
        </div>

            <a href="../../logout.php" style="float:right;">LOG OUT</a>

        </div>

        </br>
        </br>
        </br>
        </br>
        <center>
            <form id='mform' method="post" onsubmit=" return createNewTurorial();">
                <div style="position: absolute;
    color:#F0E68C;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: auto;
	height: auto;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(0,0,0,.5);"><table>
                    <tr>
                        <td>TUTORIAL ID :</td>
                        <td><input type="text" name="tutorialid" id="tutorialid" <?php echo "value='$nextAutoIncrement'" ?> style="width:100%" disabled ><br/></td>
                    </tr>
                    <tr>
                        <td>Course ID :</td>
                        <td><select name="courseId" id="courseId" style="width:100%;">
                      <?php
                      echo $output2;
                      ?>

                        </select></td>
                    </tr>


                    <tr>
                        <td>Title :</td>
                        <td><input style='width:100%' type="text" name="tutorialTitle" id="tutorialTitle"><br/></td>
                    </tr>
                    <tr>
                        <td>Link :</td>


                        <td><textarea form="mform" rows="4" cols="50" name="tutorialLink" id="tutorialLink"></textarea><br/></td>


                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" name="saveButton" id="saveButton" value="SAVE" style="
                                  background-color : #31B0D5;
                                  color: white;
                                  width:100%;
                                  border-radius: 100px;
                                  border-color: #46b8da;" /></td>
                    </tr>


                </table></div>
            </form>



        </center>
    </body>

    </html>
