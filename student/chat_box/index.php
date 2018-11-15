<?php
session_start();
if(!isset($_SESSION['sessionId']))
{
    header('Location:../../index.php');
    return;
}


echo "<script type='text/javascript'>document.getElementById('typeBox').value=''</script>
";


    
	require_once('../../db/database.php');
	
    $sql9 = "SELECT * FROM course where Course_id=$_REQUEST[id]";
	
	$result9 = mysqli_query( $con, $sql9);
	
	$row9 = mysqli_fetch_assoc($result9);
    $enteredCorseName=$row9['Course_name'];



	$idholder=$_REQUEST['id'];

	$sql = "SELECT * FROM chatbox_$_REQUEST[id]";
	
	$result = mysqli_query( $con, $sql);
	$output = '';
	while($row = mysqli_fetch_assoc($result))
	{  
		$output .= '<tr>';
		$output .= "<td style='color:dodgerblue'>$row[Student_name] :</td>";
		$output .= "<td style='color:white'>$row[Message]</td>";
        $output .= '<td></td>';

		$output .= '</tr>';
	}
	
    if(isset($_REQUEST['typeBox']))
    {
        
        
        if($_REQUEST['typeBox']!="")
        {  
            $sql8 = "SELECT * FROM student WHERE Student_id=$_SESSION[sessionId]";
	
            $result8 = mysqli_query( $con, $sql8);
            $row8 = mysqli_fetch_assoc($result8);

            $loggedOnUserName=$row8['Name'];
            //delete previous msg
            date_default_timezone_set('Asia/Dhaka');
            $date = date('m/d/Y h:i:s a', time());
            
            
            $sql5="SELECT * FROM chatbox_$_REQUEST[id]";
            $result5 = mysqli_query( $con, $sql);
	       $counter=0;
	       while($row5 = mysqli_fetch_assoc($result5))
           { 
            $counter++;
            }
            
            if($counter>10)
            {
                $sql6= "DELETE FROM chatbox_$_REQUEST[id] LIMIT 1 ";
                mysqli_query( $con, $sql6);
            }
            
             $sql7= "INSERT INTO chatbox_$_REQUEST[id] (`Chat_id`, `Message`, `Student_name`, `Student_id`, `Course_id`, `Time`) VALUES (NULL, '$_REQUEST[typeBox]', '$loggedOnUserName', '$_SESSION[sessionId]', '$_REQUEST[id]', '$date');";
                mysqli_query( $con, $sql7);
            
            
           header('Location:#');

            
            
        }
        
    }

    
	mysqli_close($con);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Chat Box</title>
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
        
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	setInterval(function(){
		$("#mytable").load('refresh.php?id=<?php echo $idholder?>')     
    }, 2000);
});
</script>
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

        <center><h2 style="text-decoration: underline; color: #2F4F4F; font-family:Impact"><?php
        echo $enteredCorseName;
        ?></h2> </center>   

        <br>


        <br/><br/>
            
            <input type="hidden" name="id" value="<?php echo $row['Course_id']; ?>">
            
                <table name="mytable" id="mytable">
                    <?php
			echo $output;
			?> 
                    
                    
        </table>
                 
              <form method="post">
                    <table>
            <tr>
                <td><input style="
                                  background-color : #31B0D5;
                                  color: white;
                                  padding: 10px 20px;
                                  border-radius: 100px;
                                  border-color: #46b8da;


                                  position: fixed;
                                  bottom: 40px;
                                  left: 10px;
                                " type="submit" value="Refresh" name="refreshButton" id="refreshButton" /></td>

                                                                                                      
                  <td> <input style="
                                  background-color : #31B0D5;
                                  color: white;
                                  padding: 10px 80px;
                                  border-radius: 100px;
                                  border-color: #46b8da;


                                  position: fixed;
                                  bottom: 40px;
                                  left: 110px;
                                " type="text" name="typeBox" id="typeBox" autocomplete="off"/></td>
                    
                
                                  </tr>                                                                             
                            </table>
            
            </form>
        </form>
    </body>

    </html>
