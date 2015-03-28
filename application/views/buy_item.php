<?php
	echo "<table>";
	if(!empty($licenses))
	foreach($licenses as $row)
	{
		echo "<tr>";
		foreach($row as $columns)
		{
			echo "<td>";
			echo $columns;
			echo "</td>";
		}
		$id=$row['id'];
		echo "<td>".anchor("buys/view/".$id,"مشاهده")."</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	
	echo anchor("buys","محصولات");