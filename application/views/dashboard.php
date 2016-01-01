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
		<li><a href="/shift/shifts/format/csv" target="newwin">ALL Shifts - (CSV)</a></li>
		<li><a href="/shift/shifts" target="newwin">ALL Shifts - (JSON)</a></li>
		<li><a href="/shift/shifts/format/html" target="newwin">ALL Shifts - (HTML)</a></li>
		<li><a href="/shift/shifts/format/xml" target="newwin">ALL Shifts - (XML)</a></li>
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
		<li><a href="/employee/employees/format/csv" target="newwin">ALL Users - (CSV)</a></li>
		<li><a href="/employee/employees" target="newwin">ALL Users - (JSON)</a></li>
		<li><a href="/employee/employees/format/html" target="newwin">ALL Users - (HTML)</a></li>
		<li><a href="/employee/employees/format/xml" target="newwin">ALL Users - (XML)</a></li>
	</ul>
<?php endif;?>	
<?php
$this->load->view('includes/footer');
?>