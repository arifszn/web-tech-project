<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}
	require_once('../../db/database.php');
	
    $sql9 = "SELECT * FROM course where Course_id=$_REQUEST[id]";
	
	$result9 = mysqli_query( $con, $sql9);
	
	$row9 = mysqli_fetch_assoc($result9);
    $enteredCorseName=$row9['Course_name'];
	

	$sql = "SELECT * FROM tutorial WHERE Course_id=$_REQUEST[id]";
	
	$result = mysqli_query( $con, $sql);
	$output = '';
	while($row = mysqli_fetch_assoc($result))
	{
		$output .= '<tr>';
		$output .= "<h1>$row[Title]</h1>";
		$output .= "$row[Link]";
		$output .= '</tr> <tr><br><br><br> <br></tr>';
	}
	mysqli_close($con);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Tutorial</title>
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

            <a href="../../logout.php" style="float:right;">LOG OUT</a>

        </div>



        <br>


        <br/><br/>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['Course_id']; ?>">
            
            <center>
                <h2 style="text-decoration: underline; color: #2F4F4F; font-family:Impact"><?php
                echo $enteredCorseName;
                ?></h2>
                <table>
                    <?php
			echo $output;
			?>
                </table>
            </center>
        </form>
    </body>

    </html>
