<div class="formPanel mdi">
<?php 
	echo validation_errors('<li>', '</li>');
	$user = [
		'name' => 'username',
		'size' => '35',
	];
	$pass = [
		'name' => 'password',
		'size' => '35'
	];
	$pass2 = [
		'name' => 'password2',
		'size' => '35'
	];
	$level = [
		'1' => 'Member',
		'2' => 'Administrator'
	];
	$email = [
		'name' => 'email',
		'size' => '35'
	];
	$submit = [
		'name' => 'ok',
		'value' => 'Submit',
		'class' => 'button'
	];

	echo form_fieldset('Member Register');
	echo form_open(base_url().'admin/user/add');
	echo form_label('Level').form_dropdown('level', $level, 1).'<br>';
	echo form_label('Username').form_input($user).'<br>';
	echo form_label('Password').form_password($pass).'<br>';
	echo form_label('Re-Password').form_password($pass2).'<br>';
	echo form_label('Email').form_input($email).'<br>';
	echo form_label('&nbsp;').form_submit($submit);
	echo form_close();
	echo form_fieldset_close();
?>
</div>