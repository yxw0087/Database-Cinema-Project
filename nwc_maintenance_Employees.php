<html>
<head><title>Employees Maintenance</title></head>
<?php
// --------------------------
// Display errors to browser
error_reporting(E_ALL);
ini_set("display_errors", 1);
// --------------------------
$host="";
$user="groupE";
$password="cmps460";
$database="cs4601_groupE";

// Access form variables
$employeeID = $_POST['ID'];
$action = $_POST['Action'];
// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

if(strlen($employeeID) < 5)
{
    print 'Employee ID must be 5 digits!';
    exit;

}

switch($action) {

    case "Delete":
	$query="select *
  		from nwc_employees e
		where e.emp_ID = '$employeeID'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'ID not found!';
		exit;
	    }

	}
	else
	{
   	    // Display the query and the MySQL error message
   	    print "<br><br>QUERY FAILED !!! <br><br>QUERY = $query <br><br>ERROR = ";
   	    die (mysql_error());
	}
	break;
	
    case "Update":
	$query="select *
  		from nwc_employees e
		where e.emp_ID = '$employeeID'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'ID not found!';
		exit;
	    }
	}
	else
	{
   	    // Display the query and the MySQL error message
   	    print "<br><br>QUERY FAILED !!! <br><br>QUERY = $query <br><br>ERROR = ";
   	    die (mysql_error());
	}
	break;

    default:
	$query="select *
  		from nwc_employees e
		where e.emp_ID = '$employeeID'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if($row)
	    {
		print 'ID already in use!';
		exit;
	    }
	}
	else
	{
   	    // Display the query and the MySQL error message
   	    print "<br><br>QUERY FAILED !!! <br><br>QUERY = $query <br><br>ERROR = ";
   	    die (mysql_error());
	}
}

print "<br>-------------------------------------<br>";
print "BEFORE";
print "<br>-------------------------------------<br>";

$query="select *
  	from nwc_employees";
$results_id = mysql_query($query);

if($results_id)
{
   	
   print '<table border=1>';
   print '<th>ID<th>Name<th>Password<th>';
   // Get each row of the result
   while ($row = mysql_fetch_row($results_id))
   {
      print '<tr>';
      // Get each attribute in the row
      foreach($row as $attribute)
      {
         print "<td>$attribute</td> ";
      }
      print '</tr>';
   }  
}
else
{
   // Display the query and the MySQL error message
   print "<br><br>QUERY FAILED !!! <br><br>QUERY = $query <br><br>ERROR = ";
   die (mysql_error());
}

switch ($action) {

    case "Add":
	$employeeName = $_POST['Name'];
	$employeePass = $_POST['Password'];
	$query="INSERT INTO nwc_employees VALUES ('$employeeID','$employeeName','$employeePass')";
	break;
	
    case "Delete":
	$query="DELETE FROM nwc_employees
		WHERE  emp_id = '$employeeID'";
	break;
	
    default:
	$employeeNewID = $_POST['newID'];
	$employeeNewName = $_POST['newName'];
	$employeeNewPass = $_POST['newPassword'];
	$query="UPDATE nwc_employees
		SET emp_id = '$employeeNewID', emp_name = '$employeeNewName', emp_pass = '$employeeNewPass'
		WHERE emp_id = '$employeeID'";
}
mysql_query($query);

$query="select *
        from nwc_employees";		  
$results_id = mysql_query($query);

if($results_id)
{ 	
    print '<table border=1>';
    print "<br>-------------------------------------<br>";
	print "AFTER";
	print "<br>-------------------------------------<br>";
	print '<th>ID<th>Name<th>Password<th>';
    // Get each row of the result
    while ($row = mysql_fetch_row($results_id))
    {
        print '<tr>';
        // Get each attribute in the row
        foreach($row as $attribute)
        {
            print "<td>$attribute</td> ";
        }
        print '</tr>';
    }
          
}
else
{
    // Display the query and the MySQL error message
    print "<br><br>QUERY FAILED !!! <br><br>QUERY = $query <br><br>ERROR = ";
    die (mysql_error());
}

mysql_close($connect);
?>
</body></html>
