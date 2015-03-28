<?php 
echo validation_errors();
echo form_fieldset('ثبت نام');
echo form_open('account/register');
$item = array(
              'type'        => 'text',
              'name'        => 'firstname',
              'maxlength'   => '20',
			  'placeholder' => 'نام',
			  'value'	=>set_value('firstname'),
            );
echo form_input($item);
$item = array(
              'type'        => 'text',
              'name'        => 'lastname',
              'maxlength'   => '20',
			  'placeholder' => 'نام خانودادگی',
			  'value'	=>set_value('lastname'),
            );
echo form_input($item);
$item = array(
              'type'        => 'text',
              'name'        => 'mobile',
              'maxlength'   => '11',
			  'placeholder' => 'موبایل(برای دریافت خبرها)',
			  'value'	=>set_value('mobile'),
            );
echo form_input($item);
$item = array(
              'type'        => 'email',
              'name'        => 'email',
              'maxlength'   => '30',
			  'placeholder' => 'ایمیل (برای ورود و تایید اطلاعات)',
			  'value'	=>set_value('email'),
            );
echo form_input($item);

$item = array(
              'type'        => 'password',
              'name'        => 'password',
              'maxlength'   => '30',
			  'placeholder' => 'پسورد',
			  'value'	=>set_value('password'),
            );
echo form_password($item);
$item = array(
              'type'        => 'password',
              'name'        => 'repeat-password',
              'maxlength'   => '30',
			  'placeholder' => 'تکرار پسورد',
			  'value'	=>set_value('repeat-password'),
            );
echo form_password($item);

echo form_submit('submit', 'ثبت نام');

echo form_close();
echo form_fieldset_close();

?>