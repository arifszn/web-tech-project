<?php

require_once('../../db/database.php');
	

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
	mysqli_close($con);

?>
<script type="text/javascript">document.getElementById('mytable').innerHTML="<?php echo $output ?>";</script>

