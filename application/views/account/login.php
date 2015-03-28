<?php 
echo validation_errors();
echo form_fieldset('ورود');
echo form_open('account/login');
$item = array(
              'type'	=> 'email',
              'name'	=> 'email',
              'maxlength'	=> '30',
			  'minlenght'	=> '5',
			  'placeholder' => 'ایمیل',
			  'value'	=>set_value('email'),
            );
echo form_input($item);

$item = array(
              'type'        => 'password',
              'name'        => 'password',
              'maxlength'   => '30',
			  'minlenght'	=> '5',
			  'placeholder' => 'پسورد',
			  
            );
echo form_password($item);

echo form_submit('submit', 'ورود');

echo form_close();
echo "<Br>";
echo anchor('', 'صفحه ی اصلی', 'title="خانه"');
echo "<Br>";
echo anchor('account/register', 'عضویت', 'title="register"');
echo form_fieldset_close();

?>
