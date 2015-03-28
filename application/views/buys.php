<?php
	echo "<table>";
	if(!empty($buys))
	foreach($buys as $row)
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
		echo "<td>".anchor("buys/export/".$id,"دریافت عکسها")."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<td>".anchor("","دیدن محصولات")."</td>";
	
