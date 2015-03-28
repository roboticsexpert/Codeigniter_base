<?php
	echo form_fieldset('خرید');
	foreach($product as $key=>$value)
	{
		//echo "<div style='float:left; clear:left'>".$key."</div>";
		echo "<div style='float:left; clear:both'>".$value."</div>";		
	}
	
	echo validation_errors();
	
	echo form_open();
	$item = array(
				  'type'	=> 'number',
				  'name'	=> 'number',
				  'max'	=> '100',
				  'min'	=> '0',
				  'step'=> $lpi,
				  'placeholder' => 'تعداد',
				  'value'	=>set_value('number'),
				);
	echo form_input($item);
	echo form_submit('submit', 'خرید');

echo form_close();
echo anchor("buys","محصولات");
echo form_fieldset_close();

?>