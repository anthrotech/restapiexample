<?php 
$this->load->view('includes/header');
if ($message) {
	echo '<b>'.$message.'</b>';
}
echo validation_errors();
?>

<?php echo form_open('/user/login'); ?>
	Email Address: <input type="text" value="<?php echo set_value('email'); ?>" name="email"><br/>
	Password: <input type="password" value="<?php echo set_value('password'); ?>" name="password"><br/>
<?php echo form_submit('submit', 'Login'); ?>
<?php echo form_close();?>

<?php
$this->load->view('includes/footer');
?>