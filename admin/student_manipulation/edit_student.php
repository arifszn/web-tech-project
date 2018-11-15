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
	if(($_POST[name] == '') or ($_POST[email] == '') or ($_POST[birthdate] == '') or ($_POST[bloodgroup] == '') or ($_POST[gender] == ''))
		{
			header('Location:../error.php');
		}
	else
		{
		$sql = "UPDATE student SET Name='$_POST[name]', Email='$_POST[email]', Birth_date='$_POST[birthdate]', Blood_group='$_POST[bloodgroup]', Gender='$_POST[gender]' WHERE Student_id=$_POST[id]";
		mysqli_query( $con, $sql);
		header('Location: index.php');
		return;
		}
	}

	$sql = "SELECT * FROM student WHERE Student_id=$_GET[id]";
	
	$result = mysqli_query( $con, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if(!$row)
	{
		echo 'Student does not exist';
		return;
	}
	mysqli_close($con);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Edit Student</title>
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
            <h2>Edit Student</h2>

            <br/><br/>
            <form method="post" onsubmit="return editStudentValidate();">
                <input type="hidden" name="id" value="<?php echo $row['Student_id']; ?>">
               <div style="position: absolute;
    color:#F0E68C;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: auto;
	height: auto;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(0,0,0,.5);"> <table>
                    <tr>
                        <td>NAME :</td>
                        <td><input type="text" name="name" id="name" value="<?php echo $row['Name']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>EMAIL :</td>
                        <td><input type="text" name="email" id="email" value="<?php echo $row['Email']; ?>" /></td>
                    </tr>
                    <tr>
                        <tr>
                            <td>BIRTH DATE :</td>
                            <td><input type="text" name="birthdate" id="birthdate" value="<?php echo $row['Birth_date']; ?>" /></td>
                        </tr <tr>
                        <td>BLOOD GROUP :</td>
                        <td><input type="text" name="bloodgroup" id="bloodgroup" value="<?php echo $row['Blood_group']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>GENDER :</td>
                        <td><input type="text" name="gender" id="gender" value="<?php echo $row['Gender']; ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btnSubmit" value="Update" style="
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
