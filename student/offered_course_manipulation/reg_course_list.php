<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}
	require_once('../../db/database.php');
	
	$sql = "SELECT * FROM assigned_course WHERE Student_id=$_SESSION[sessionId] ";
	$result = mysqli_query($con, $sql);
	$output = '';
	while($row = mysqli_fetch_assoc($result))
	{
		$output .= '<tr>';
		$output .= "<td>$row[Course_id]</td>";
		$output .= "<td>$row[Course_name]</td>";
		
		
		$output .= "<td><a href='delete_reg_course.php?id=$row[Reg_id]' style='color:red;'>DELETE</a>";
		$output .= '</tr>';
	}
	
	mysqli_close($con);
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Registered Courses</title>
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

        <center>
            <h2>Registered Courses</h2>

            <br/><br/>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>

                    <th>Option</th>
                </tr>
                <?php echo $output; ?>
            </table>
        </center>

    </body>

    </html>
