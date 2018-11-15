<?php
	session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}
	require_once('../../db/database.php');
	
	if(isset($_POST['btnSubmit']))
	{
	   if(($_POST[courseId] == '') or ($_POST[tutorialTitle] == '') or ($_POST[tutorialLink] == ''))
		{
			header('Location:../error.php');
		}
	else
		{
		$sql = "UPDATE tutorial SET Course_id=$_POST[courseId], Title='$_POST[tutorialTitle]',Link='$_POST[tutorialLink]' WHERE Tutorial_id=$_POST[id]";
		mysqli_query( $con, $sql);
		header('Location: index.php');
		return;
    }
	}

	$sql = "SELECT * FROM tutorial WHERE Tutorial_id=$_GET[id]";
	
	$result = mysqli_query( $con, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if(!$row)
	{
		echo 'Tutorial does not exist';
		return;
	}
mysqli_close($con);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Edit Tutorial</title>
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
    <script type="text/javascript" src="../../javascript/validate.js"></script>

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
            <a href="index.php" style="float:left;">Back</a>
            <a href="../../logout.php" style="float:right;">LOG OUT</a>

        </div>



        <br>
        <center>
            <h2>Edit Tutorial</h2>

            <br/><br/>
            <form method="post" id='mform2' onsubmit=" return editTurorial();">
                <input type="hidden" name="id" value="<?php echo $row['Tutorial_id']; ?>">
                <table>
                    <tr>
                        <td>TUTORIAL ID :</td>
                        <td><input type="text" name="tutorialid" value="<?php echo $_REQUEST['id']; ?>" style="width:100%" disabled/></td>
                    </tr>
                    <tr>
                        <td>COURSE ID :</td>
                        <td><input type="text" name="courseId" id="courseId" value="<?php echo $row['Course_id']; ?>" style="width:100%" /></td>
                    </tr>
                    <tr>
                        <td>TITLE :</td>
                        <td><input type="text" name="tutorialTitle" id="tutorialTitle" value="<?php echo $row['Title']; ?>" style="width:100%" /></td>
                    </tr>
                    <tr>
                        <td>LINK :</td>
                        <td><textarea form="mform2" rows="4" cols="50" name="tutorialLink" id="tutorialLink" value="<?php echo $row['Link']; ?>"></textarea><br/></td>
                    </tr>

                    <td></td>
                    <td><input type="submit" name="btnSubmit" value="Update" style="
                                  background-color : #31B0D5;
                                  color: white;
                                  width:100%;
                                  border-radius: 100px;
                                  border-color: #46b8da;" /></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>

    </html>
