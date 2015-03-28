<?php

	if(!empty($imgs))
	{
		echo "<table>";
		foreach($imgs as $row)
		{
			if(!empty($row))
			{
				echo "<tr>";
				
					echo "<td>".anchor($row,"نمایش")."</td>";
					
				
				echo "</tr>";
			}
		}
		echo "</table>";
	}
	echo "<Br>".anchor($row,"zip file")."<br>";
	
	
	echo anchor("buys","محصولات");