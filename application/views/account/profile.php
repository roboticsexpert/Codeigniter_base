<h3>
	<?php echo "سلام " .$data['firstname']." " . $data["lastname"]."<br>"; ?>
	PROFILE PAGE !!! you are login<br>
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
		echo "<td>".anchor("seller/buy/".$id,"خرید")."</td>";
		echo "</tr>";
	}
	echo "</table>";
	
    echo anchor('account/logout', 'logout', 'title="logout"');
	
	echo "<Br>";
echo anchor('', 'صفحه ی اصلی', 'title="خانه"');
echo "<Br>";
echo anchor('account/register', 'عضویت', 'title="register"');
	
	 ?>
</h3>