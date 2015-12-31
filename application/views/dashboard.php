<?php 
$this->load->view('includes/header');
echo '<p><b>Hello, '.$this->session->userdata('name').'.</b></p>';
if ($message) {
	echo '<p><b>'.$message.'</b></p>';
}
?>
<p><b>Shifts</b></p>
<p>
	<ul>
		<li>MY Shifts - (CSV)</li>
		<li>MY Shifts - (JSON)</li>
		<li>MY Shifts - (HTML)</li>
		<li>MY Shifts - (XML)</li>
	</ul>	
</p>
<?php if ($this->session->userdata('role') == 'manager'):?>
<p>	
	<ul>
		<li><a href="/shift/shifts/format/csv">ALL Shifts - (CSV)</a></li>
		<li><a href="/shift/shifts">ALL Shifts - (JSON)</a></li>
		<li><a href="/shift/shifts/format/html">ALL Shifts - (HTML)</a></li>
		<li><a href="/shift/shifts/format/xml">ALL Shifts - (XML)</a></li>
	</ul>
	<ul>
		<li>MY Employee Shifts - (CSV)</li>
		<li>MY Employee Shifts - (JSON)</li>
		<li>MY Employee Shifts - (HTML)</li>
		<li>MY Employee Shifts - (XML)</li>
	</ul>		
</p>
<p><b>Users</b></p>
	<ul>
		<li><a href="/employee/employees/format/csv">ALL Users - (CSV)</a></li>
		<li><a href="/employee/employees">ALL Users - (JSON)</a></li>
		<li><a href="/employee/employees/format/html">ALL Users - (HTML)</a></li>
		<li><a href="/employee/employees/format/xml">ALL Users - (XML)</a></li>
	</ul>
<?php endif;?>	
<?php
$this->load->view('includes/footer');
?>