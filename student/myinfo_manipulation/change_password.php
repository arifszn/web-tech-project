
<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}
	require_once('../../db/database.php');
	
	

	$sql = "SELECT * FROM authentication WHERE Student_id=$_SESSION[sessionId]";
	
	$result = mysqli_query( $con, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if(!$row)
	{
		echo 'Student does not exist';
		return;
	}


if(isset($_POST['btnSubmit']))
	{
        if($_REQUEST['oldPassword']=="")
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
			echo "<h1>Old Password is empty</h1> </center>  </div> " ;
            return;
        }
        if($_REQUEST['oldPassword']!=$row['Password'])
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
			echo "<h1>Old Password is incorrect</h1> </center>  </div> " ;
            return;
        }
        
        if($_REQUEST['newPassword']!=$_REQUEST['confirmPassword'])
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
			echo "<h1>Passwords do not match</h1> </center>  </div> " ;
            return;
        }
        
        if($_REQUEST['newPassword']=="")
        {
            echo "<center> <div> <h1>ERROR!!</h1>";
            echo "<img src='../../resources/error.jpg' alt='Error'> ";
			echo "<h1>Password is empty</h1> </center>  </div> " ;
            return;
        }
    
    
    
    
	
		$sql = "UPDATE authentication SET Password='$_POST[newPassword]' WHERE Student_id=$_SESSION[sessionId]";
		mysqli_query( $con, $sql);
		header('Location:../index.php');
		return;
	}
	mysqli_close($con);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
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
        
        <a href="../../logout.php" style="float:right;">LOG OUT</a>

    </div>
    
    
    
    <br>
	<center><h2>Change Password</h2>
	
	<br/><br/>
	<form method="post"  onsubmit="return changePassword();">
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
	background: rgba(0,0,0,.5);"><table>
			<tr>
				<td>Old Password</td>
				<td><input type="password" name="oldPassword" id="oldPassword" /></td>
			</tr>
			<tr>
				<td>New Password</td>
				<td><input type="password" name="newPassword" id="newPassword"/></td>
			</tr>
			
			<tr>
				<td>Confirm Password</td>
				<td><input type="password" name="confirmPassword" id="confirmPassword"/></td>
			</tr
			
			<tr>
				<td></td>
				<td><input type="submit" name="btnSubmit" id="btnSubmit" value="Update" style="
                                  background-color : #31B0D5;
                                  color: white;
                                  width:100%;
                                  border-radius: 100px;
                                  border-color: #46b8da;" /></td>
			</tr>
		</table></div>
	</form></center>
    
</body>
</html>