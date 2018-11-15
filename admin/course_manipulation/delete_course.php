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
		
		$sql = "DELETE FROM course WHERE Course_id=$_POST[id]";
		mysqli_query( $con, $sql);
        
        $sql2="DROP TABLE chatbox_$_POST[id]"; 
        mysqli_query( $con, $sql2);
		header('Location:index.php');
		return;
	}

	$sql = "SELECT * FROM course WHERE Course_id=$_GET[id]";
	$result = mysqli_query( $con, $sql);
	$row = mysqli_fetch_assoc($result);
	if(!$row)
	{
		echo 'Course does not exist';
		return;
	}
mysqli_close($con);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Delete Course</title>
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
                            } </style>
        <div class="navbar">

            <a href="../index.php" style="float:left;">Home</a>
            <a href="index.php" style="float:left;">Back</a>
            <a href="../../logout.php" style="float:right;">LOG OUT</a>

        </div>



        <br>
        <center>
            <h2>Delete Course</h2>

            
            
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $row['Course_id']; ?>">
                <div style="position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: auto;
	height: auto;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(0,0,0,.5);">
                    
                    <h3>Are you sure to delete the following Course?</h3>
                    <table>
                    <tr>
                        <td>COURSE ID :</td>
                        <td>
                            <?php echo $_REQUEST['id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>COURSE NAME :</td>
                        <td>
                            <?php echo $row['Course_name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>COURSE DESCRIPTION :</td>
                        <td>
                            <?php echo $row['Course_description']; ?>
                        </td>
                    </tr>

                    
                </table>
                <input type="submit" style="
                                  background-color : #31B0D5;
                                  color: white;
                                  
                                  border-radius: 100px;
                                  border-color: #46b8da;" name="btnSubmit" value="Delete" />
                
                </div>
            </form>
        </center>
    </body>

    </html>
