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
		<li><a href="/shift/shifts/format/csv?role=employee" target="newwin">MY Shifts - (CSV)</a></li>
		<li><a href="/shift/shifts?role=employee" target="newwin">MY Shifts - (JSON)</li>
		<li><a href="/shift/shifts/format/html?role=employee" target="newwin">MY Shifts - (HTML)</a></li>
		<li><a href="/shift/shifts/format/xml?role=employee" target="newwin">MY Shifts - (XML)</a></li>
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
		<li><a href="/shift/shifts/format/csv?role=manager" target="newwin">MY Employee Shifts - (CSV)</a></li>
		<li><a href="/shift/shifts?role=manager" target="newwin">MY Employee Shifts - (JSON)</li>
		<li><a href="/shift/shifts/format/html?role=manager" target="newwin">MY Employee Shifts - (HTML)</a></li>
		<li><a href="/shift/shifts/format/xml?role=manager" target="newwin">MY Employee Shifts - (XML)</a></li>
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