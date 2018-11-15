<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}
	require_once('../../db/database.php');
	$flag=0;
    $sql = "SELECT * FROM assigned_course WHERE Course_id=$_GET[id] and Student_id=$_SESSION[sessionId] ";
	$result = mysqli_query( $con, $sql);
	$row = mysqli_fetch_assoc($result);
	if($row)
	{
		$flag=1;
	}



	$sql = "SELECT * FROM course WHERE Course_id=$_GET[id]";
	$result = mysqli_query( $con, $sql);
	$row = mysqli_fetch_assoc($result);
	if(!$row)
	{
		echo 'Course does not exist';
		return;
	}


if(isset($_POST['btnSubmit']))
	{
		
		$sql = "INSERT INTO assigned_course VALUES (null, $_SESSION[sessionId], $_POST[id],'$row[Course_name]')";
		mysqli_query( $con, $sql);
		header('Location: index.php');
		return;
	}
	mysqli_close($con);
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Register</title>
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
            <a href="index.php" style="float:left;">Back</a>
            <a href="../../logout.php" style="float:right;">LOG OUT</a>

        </div>
        <br>
        <?php
    if($flag==1)
    {
        echo "<center><h2>Already Registerred</h2> </center>";
        return;
    }
    ?>

            <center>
                <h2>Register for this course?</h2>

                <br/>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $row['Course_id']; ?>">
                    <table>
                        <tr>
                            <td>Course Name: </td>
                            <td>
                                <?php echo $row['Course_name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Description: </td>
                            <td>
                                <?php echo $row['Course_description']; ?>
                            </td>
                        </tr>


                        
                    </table>
                    <input type="submit" name="btnSubmit" value="OK" style="
                                  background-color : #31B0D5;
                                  color: white;
                                  
                                  border-radius: 100px;
                                  border-color: #46b8da;" />
                </form>
            </center>

    </body>

    </html>
