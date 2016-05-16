<html>
<head><title>Add New Employee</title></head>
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
$table_employees="nwc_employees";

// Access form variables
$employeeID = $_POST['ID'];
$employeeName = $_POST['Name'];
$employeePass = $_POST['Password'];

// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

$query="select *
        from $table_employees e
  	where e.emp_name = '$employeeName' and
        e.emp_id = '$employeeID' ";
$results_id = mysql_query($query);
$row = mysql_fetch_row($results_id);

if($results_id)
{
   
   if ($row != null)
   {
      print "Employee already in the database!";
   }
   else
   {
	print "<br>-------------------------------------<br>";
	print "BEFORE ADDING";
	print "<br>-------------------------------------<br>";

	$query="select *
  	        from $table_employees";
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

	$query="INSERT INTO $table_employees VALUES ('$employeeID','$employeeName','$employeePass')";
	mysql_query($query);


	$query="select *
        	from $table_employees";		  
	$results_id = mysql_query($query);
        if($results_id)
        { 	
            print '<table border=1>';
            print "<br>-------------------------------------<br>";
		print "AFTER ADDING";
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
