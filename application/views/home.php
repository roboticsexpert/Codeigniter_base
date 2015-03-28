<?php
	echo "<table>";
	foreach($products as $row)
	{
		echo "<tr>";
		foreach($row as $columns)
		{
			echo "<td>";
			echo $columns;
			echo "</td>";
		}
		$id=$row['id'];
		echo "<td>".anchor("buy/".$id,"خرید")."</td>";
		echo "</tr>";
	}
	echo "</table>";
	
    echo anchor('account/logout', 'logout', 'title="logout"');
	echo "<Br>";
	echo anchor('buys', 'محصولات شما', 'title="products"');
	echo "<br>";
	echo anchor('account/', 'پروفایل', 'title="profile"'); ?>