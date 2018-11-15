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
		
		$sql = "DELETE FROM student WHERE Student_id=$_POST[id]";
		mysqli_query( $con, $sql);
        $sql="DELETE FROM authentication WHERE Student_id=$_POST[id]";
		mysqli_query( $con, $sql);
        header('Location: index.php');
		return;
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
        <title>Delete Student</title>
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
            <a href="index.php" style="float:left;">Back</a>
            <a href="../../logout.php" style="float:right;">LOG OUT</a>

        </div>



        <br>
        <center>
            <h2>Delete Student</h2>

            <br/><br/>
            <h3>Are you sure to delete the following student?</h3>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $row['Student_id']; ?>">
                <table>
                    <tr>
                        <td>NAME :</td>
                        <td>
                            <?php echo $row['Name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>EMAIL :</td>
                        <td>
                            <?php echo $row['Email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>BIRTH DATE :</td>
                        <td>
                            <?php echo $row['Birth_date']; ?> </td>
                    </tr>
                    <tr>
                        <td>BLOOD GROUP :</td>
                        <td>
                            <?php echo $row['Blood_group']; ?> </td>
                    </tr>
                    <tr>
                        <td>GENDER :</td>
                        <td>
                            <?php echo $row['Gender']; ?> </td>
                    </tr>
                    
                </table>
                <input type="submit" style="
                                  background-color : #31B0D5;
                                  color: white;
                                  
                                  border-radius: 100px;
                                  border-color: #46b8da;" name="btnSubmit" value="Delete" />
            </form>
        </center>
    </body>

    </html>
