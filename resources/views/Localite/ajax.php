
<?php

	echo "<select name='commune'>";
		$row=commune::find(1);
			echo "<option value='".$row["ville"]."'>".$row->ville."</option>";
		
	
	echo "</select>";
?>
