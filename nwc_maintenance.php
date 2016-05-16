<html>
<?php
$action = $_POST['Action'];
$table = $_POST['Table'];

switch ($table) {

    case "Complex":
	echo "Adding/Deleting/Changing Table Complex";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_Complex.php' method='POST'>";
	    echo 'Old Complex Name: <input type="text" name="Name" required>';
	    echo 'New Complex Name: <input type="text" name="newName" required>';
	    echo "<br><br>";
	    echo 'New Complex Address: <input type="text" name="newAddr" required>';
	    echo "<br><br>";
	    echo 'New Complex Phone Number: <input type="text" name="newPhone" required>';
	    echo "<br><br>";
	}
	else if($action == "Add")
	{
	    echo "<form action='nwc_maintenance_Complex.php' method='POST'>";
	    echo 'Complex Name: <input type="text" name="Name" required>';
	    echo "<br><br>";
	    echo 'Complex Address: <input type="text" name="Addr" required>';
	    echo "<br><br>";
	    echo 'Complex Phone Number: <input type="text" name="Phone" required>';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_Complex.php' method='POST'>";
	    echo 'Complex Name: <input type="text" name="Name" required>';
	    echo "<br><br>";
	}
	break;
	
    case "Employees":
	echo "Adding/Deleting/Changing Table Employees";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_Employees.php' method='POST'>";
	    echo 'Old Employee ID: <input type="text" maxlength="5" name="ID" required>';
	    echo 'New Employee ID: <input type="text" maxlength="5" name="newID" required>';
	    echo "<br><br>";
	    echo 'New Employee Name: <input type="text" name="newName" required>';
	    echo "<br><br>";
	    echo 'New Employee Password: <input type="text" name="newPassword" required>';
	    echo "<br><br>";
	}
	else if($action == "Add")
	{
	    echo "<form action='nwc_maintenance_Employees.php' method='POST'>";
	    echo 'Employee ID: <input type="text" maxlength="5" name="ID" required>';
	    echo "<br><br>";
	    echo 'Employee Name: <input type="text" name="Name" required>';
	    echo "<br><br>";
	    echo 'Employee Password: <input type="text" name="Password" required>';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_Employees.php' method='POST'>";
	    echo 'Employee ID: <input type="text" maxlength="5" name="ID" required>';
	    echo "<br><br>";
	}
	break;
	
    case "Member":
	echo "Adding/Deleting/Changing Table Member";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_Member.php' method='POST'>";
	    echo 'Old Member Name: <input type="text" name="Name" required>';
	    echo 'New Member Name: <input type="text" name="newName" required>';
	    echo "<br><br>";
	    echo 'Old Member Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo 'New Member Account Number: <input type="text" maxlength="9" name="newAcct" required>';
	    echo "<br><br>";
	    echo 'New Member Phone Number: <input type="text" maxlength="10" name="newPhone" required>';
	    echo "<br><br>";
	    echo 'New Member Email: <input type="text" name="newEmail" required>';
	    echo "<br><br>";
	    echo 'New Member Age: <input type="text" name="newAge" required>';
	    echo "<br><br>";
	    echo 'New Member Address: <input type="text" name="newAddr" required>';
	    echo "<br><br>";
	    echo 'Is This Member the Primary Member? ';
	    echo '<select name="newPrimary">';
	    echo '<option value="0" selected>0</option>';
	    echo '<option value="1">1</option>';
	    echo '</select>';
	    echo "<br><br>";
	}
	else if($action == "Add")
	{
	    echo "<form action='nwc_maintenance_Member.php' method='POST'>";
	    echo 'Member Name: <input type="text" name="Name" required>';
	    echo "<br><br>";
	    echo 'Member Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo "<br><br>";
	    echo 'Member Phone Number: <input type="text" maxlength="10" name="Phone" required>';
	    echo "<br><br>";
	    echo 'Member Email: <input type="text" name="Email" required>';
	    echo "<br><br>";
	    echo 'Member Age: <input type="text" name="Age" required>';
	    echo "<br><br>";
	    echo 'Member Address: <input type="text" name="Addr" required>';
	    echo "<br><br>";
	    echo 'Is This Member the Primary Member? ';
	    echo '<select name="Primary">';
	    echo '<option value="0" selected>0</option>';
	    echo '<option value="1">1</option>';
	    echo '</select>';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_Member.php' method='POST'>";
	    echo 'Member Name: <input type="text" name="Name" required>';
	    echo "<br><br>";
	    echo 'Member Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo "<br><br>";
	}
	break;
	
    case "Membership":
	echo "Adding/Deleting/Changing Table Memebership";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_Membership.php' method='POST'>";
	    echo 'Old Membership Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo 'New Membership Account Number: <input type="text" maxlength="9" name="newAcct" required>';
	    echo "<br><br>";
	    echo 'New Membership Start Date: <input type="text" name="newStart" required>';
	    echo ' (yyyy-mm-dd)';
	    echo "<br><br>";
	    echo 'New Membership Expire Date: <input type="text" name="newEnd" required>';
	    echo ' (yyyy-mm-dd)';
	    echo "<br><br>";
	    echo 'New Membership Password: <input type="text" name="newPass" required>';
	    echo "<br><br>";
	}
	else if($action == "Add")
	{
	    echo "<form action='nwc_maintenance_Membership.php' method='POST'>";
	    echo 'Membership Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo "<br><br>";
	    echo 'Membership Start Date: <input type="text" name="Start" required>';
	    echo ' (yyyy-mm-dd)';
	    echo "<br><br>";
	    echo 'Membership Expire Date: <input type="text" name="End" required>';
	    echo ' (yyyy-mm-dd)';
	    echo "<br><br>";
	    echo 'Membership Password: <input type="text" name="Pass" required>';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_Membership.php' method='POST'>";
	    echo 'Membership Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo "<br><br>";
	}
	break;
	
    case "Movie":
	echo "Adding/Deleting/Changing Table Movie";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_Movie.php' method='POST'>";
	    echo 'Old Movie Title: <input type="text" name="Title" required>';
	    echo 'New Movie Title: <input type="text" name="newTitle" required>';
	    echo "<br><br>";
	    echo 'New Movie Stars: <input type="text" name="newStars" required>';
	    echo "<br><br>";
	    echo 'New Movie Rating: ';	    
	    echo '<select name="newRating">';
	    echo '<option value="PG-13" selected>PG-13</option>';
	    echo '<option value="PG">PG</option>';
	    echo '<option value="G">G</option>';
	    echo '<option value="R">R</option>';
	    echo '</select>';
	    echo "<br><br>";
	    echo 'New Movie Description: <input type="text" name="newDescript" required>';
	    echo "<br><br>";
	    echo 'New Movie Run Time: <input type="text" name="newRun" required>';
	    echo ' (hh.mm)';
	    echo "<br><br>";
	}
	else if($action == "Add")
	{
	    echo "<form action='nwc_maintenance_Movie.php' method='POST'>";
	    echo 'Movie Title: <input type="text" name="Title" required>';
	    echo "<br><br>";
	    echo 'Movie Stars: <input type="text" name="Stars" required>';
	    echo "<br><br>";
	    echo 'Movie Rating: ';	    
	    echo '<select name="Rating">';
	    echo '<option value="PG-13" selected>PG-13</option>';
	    echo '<option value="PG">PG</option>';
	    echo '<option value="G">G</option>';
	    echo '<option value="R">R</option>';
	    echo '</select>';
	    echo "<br><br>";
	    echo 'Movie Description: <input type="text" name="Descript" required>';
	    echo "<br><br>";
	    echo 'Movie Run Time: <input type="text" name="Run" required>';
	    echo ' (hh.mm)';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_Movie.php' method='POST'>";
	    echo 'Movie Title: <input type="text" name="Title" required>';
	    echo "<br><br>";
	}
	break;
	
    case "Reservation":
	echo "Adding/Deleting/Changing Table Reservation";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_Reservation.php' method='POST'>";
	    echo 'Old Reserved Name: <input type="text" name="Name" required>';
	    echo 'New Reserved Name: <input type="text" name="newName" required>';
	    echo "<br><br>";
	    echo 'Old Reserved Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo 'New Reserved Account Number: <input type="text" maxlength="9" name="newAcct" required>';
	    echo "<br><br>";
	    echo 'Old Reserved Theater: <input type="text" maxlength="5" name="ID" required>';
	    echo 'New Reserved Theater: <input type="text" maxlength="5" name="newID" required>';
	    echo "<br><br>";
	    echo 'Old Reserved Complex: <input type="text" name="Complex" required>';
	    echo 'New Reserved Complex: <input type="text" name="newComplex" required>';
	    echo "<br><br>";
	    echo 'New Reserved Row Number: <input type="text" maxlength="1" name="newRow" required>';
	    echo "<br><br>";
	    echo 'New Reserved Column Number: <input type="text" maxlength="1" name="newCol" required>';
	    echo "<br><br>";
	    echo 'Old Reserved Time: <input type="text" name="Time" required>';
	    echo ' (hh.mm)';
	    echo 'New Reserved Time: <input type="text" name="newTime" required>';
	    echo ' (hh.mm)';
	    echo "<br><br>";
	    echo 'Old Reserved Date: <input type="text" name="Date" required>';
	    echo ' (yyyy-mm-dd)';
	    echo 'New Reserved Date: <input type="text" name="newDate" required>';
	    echo ' (yyyy-mm-dd)';
	    echo "<br><br>";
	}
	else if($action == "Add")
	{
	    echo "<form action='nwc_maintenance_Reservation.php' method='POST'>";
	    echo 'Reserved Name: <input type="text" name="Name" required>';
	    echo "<br><br>";
	    echo 'Reserved Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo "<br><br>";
	    echo 'Reserved Theater: <input type="text" maxlength="5" name="ID" required>';
	    echo "<br><br>";
	    echo 'Reserved Complex: <input type="text" name="Complex" required>';
	    echo "<br><br>";
	    echo 'Reserved Row Number: <input type="text" maxlength="1" name="Row" required>';
	    echo "<br><br>";
	    echo 'Reserved Column Number: <input type="text" maxlength="1" name="Col" required>';
	    echo "<br><br>";
	    echo 'Reserved Time: <input type="text" name="Time" required>';
	    echo ' (hh.mm)';
	    echo "<br><br>";
	    echo 'Reserved Date: <input type="text" name="Date" required>';
	    echo ' (yyyy-mm-dd)';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_Reservation.php' method='POST'>";
	    echo 'Reserved Name: <input type="text" name="Name" required>';
	    echo "<br><br>";
	    echo 'Reserved Account Number: <input type="text" maxlength="9" name="Acct" required>';
	    echo "<br><br>";
	    echo 'Reserved Theater: <input type="text" maxlength="5" name="ID" required>';
	    echo "<br><br>";
	    echo 'Reserved Complex: <input type="text" name="Complex" required>';
	    echo "<br><br>";
	    echo 'Reserved Time: <input type="text" name="Time" required>';
	    echo ' (hh.mm)';
	    echo "<br><br>";
	    echo 'Reserved Date: <input type="text" name="Date" required>';
	    echo ' (yyyy-mm-dd)';
	    echo "<br><br>";
	}
	break;
	
    case "Seating Chart":
	echo "Adding/Deleting/Changing Table Seating Chart";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_SeatingChart.php' method='POST'>";
	    echo 'Old Seating Chart Theater ID: <input type="text" maxlength="5" name="ID" required>';
	    echo 'New Seating Chart Theater ID: <input type="text" maxlength="5" name="newID" required>';
	    echo "<br><br>";
	    echo 'Old Seating Chart Complex Name: <input type="text" name="Complex" required>';
	    echo 'New Seating Chart Complex Name: <input type="text" name="newComplex" required>';
	    echo "<br><br>";
	    echo 'Old Seating Chart Row Number: <input type="text" maxlength="1" name="Row" required>';
	    echo 'New Seating Chart Row Number: <input type="text" maxlength="1" name="newRow" required>';
	    echo "<br><br>";
	    echo 'Old Seating Chart Column Number: <input type="text" maxlength="1" name="Col" required>';
	    echo 'New Seating Chart Column Number: <input type="text" maxlength="1" name="newCol" required>';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_SeatingChart.php' method='POST'>";
	    echo 'Seating Chart Theater ID: <input type="text" maxlength="5" name="ID" required>';
	    echo "<br><br>";
	    echo 'Seating Chart Complex Name: <input type="text" name="Complex" required>';
	    echo "<br><br>";
	    echo 'Seating Chart Row Number: <input type="text" maxlength="1" name="Row" required>';
	    echo "<br><br>";
	    echo 'Seating Chart Column Number: <input type="text" maxlength="1" name="Col" required>';
	    echo "<br><br>";
	}
	break;
	
    case "Showing":
	echo "Adding/Deleting/Changing Table Showing";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_Showing.php' method='POST'>";
	    echo 'Old Showing Movie Name: <input type="text" name="Title" required>';
	    echo 'New Showing Movie Name: <input type="text" name="newTitle" required>';
	    echo "<br><br>";
	    echo 'Old Showing Theater: <input type="text" maxlength="5" name="ID" required>';
	    echo 'New Showing Theater: <input type="text" maxlength="5" name="newID" required>';
	    echo "<br><br>";
	    echo 'Old Showing Complex: <input type="text" name="Complex" required>';
	    echo 'New Showing Complex: <input type="text" name="newComplex" required>';
	    echo "<br><br>";
	    echo 'Old Showing Movie Start Time: <input type="text" name="Time" required>';
	    echo ' (hh:mm)';
	    echo 'New Showing Movie Start Time: <input type="text" name="newTime" required>';
	    echo ' (hh.mm)';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_Showing.php' method='POST'>";
	    echo 'Showing Movie Name: <input type="text" name="Title" required>';
	    echo "<br><br>";
	    echo 'Showing Theater: <input type="text" maxlength="5" name="ID" required>';
	    echo "<br><br>";
	    echo 'Showing Complex: <input type="text" name="Complex" required>';
	    echo "<br><br>";
	    echo 'Showing Movie Start Time: <input type="text" name="Time" required>';
	    echo ' (hh.mm)';
	    echo "<br><br>";
	}
	break;
	
    default:
	echo "Adding/Deleting/Changing Table Theater";
	echo "<br><br>";
	echo "<br><br>";
	if($action == "Update")
	{
	    echo "<form action='nwc_maintenance_Theater.php' method='POST'>";
	    echo 'Old Theater ID: <input type="text" maxlength="5" name="ID" required>';
	    echo 'New Theater ID: <input type="text" maxlength="5" name="newID" required>';
	    echo "<br><br>";
	    echo 'Old Theater Complex: <input type="text" name="Complex" required>';
	    echo 'New Theater Complex: <input type="text" name="newComplex" required>';
	    echo "<br><br>";
	    echo 'New Theater Capacity: <input type="text" maxlength="3" name="newCapacity" required>';
	    echo "<br><br>";
	}
	else if($action == "Add")
	{
	    echo "<form action='nwc_maintenance_Theater.php' method='POST'>";
	    echo 'Theater ID: <input type="text" maxlength="5" name="ID" required>';
	    echo "<br><br>";
	    echo 'Theater Complex: <input type="text" name="Complex" required>';
	    echo "<br><br>";
	    echo 'Theater Capacity: <input type="text" maxlength="3" name="Capacity" required>';
	    echo "<br><br>";
	}
	else
	{
	    echo "<form action='nwc_maintenance_Theater.php' method='POST'>";
	    echo 'Theater ID: <input type="text" maxlength="5" name="ID" required>';
	    echo "<br><br>";
	    echo 'Theater Complex: <input type="text" name="Complex" required>';
	    echo "<br><br>";
	}
}
echo "<br><br>";
switch ($action){
    case "Add":
	echo "<input type='submit' name='Action' value='Add'>";
	echo "<br><br>";
	break;
    case "Delete":
	echo "<input type='submit' name='Action' value='Delete'>";
	echo "<br><br>";
	break;
    default:
	echo "<input type='submit' name='Action' value='Update'>";
	echo "<br><br>";
}
echo "</form>";
?>
</html>
