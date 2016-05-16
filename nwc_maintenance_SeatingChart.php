<html>
<head><title>Seating Chart Maintenance</title></head>
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
$seatingchartID= $_POST['ID'];
$seatingchartComplex = $_POST['Complex'];
$seatingchartRow = $_POST['Row'];
$seatingchartCol = $_POST['Col'];
$action = $_POST['Action'];
// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

switch($action) {

    case "Delete":
	$query="select *
  		from nwc_seatingchart s
		where s.t_id = '$seatingchartID' and				  
		      s.complex_name = '$seatingchartComplex' and
		      s.rowID = '$seatingchartRow' and
		      s.columnID = '$seatingchartCol'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Seating Chart not found!';
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
  		from nwc_seatingchart s
		where s.t_id = '$seatingchartID' and				  
		      s.complex_name = '$seatingchartComplex' and
		      s.rowID = '$seatingchartRow' and
		      s.columnID = '$seatingchartCol'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Seating Chart not found!';
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
  		from nwc_seatingchart s
		where s.t_id = '$seatingchartID' and				  
		      s.complex_name = '$seatingchartComplex' and
		      s.rowID = '$seatingchartRow' and
		      s.columnID = '$seatingchartCol'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if($row)
	    {
		print 'Seating Chart already exist!';
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
	from nwc_seatingchart";
$results_id = mysql_query($query);

if($results_id)
{   	
   print '<table border=1>';
   print '<th>Theater<th>Complex<th>Row<th>Column<th>';
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
	$query="INSERT INTO nwc_seatingchart VALUES ('$seatingchartID','$seatingchartComplex','$seatingchartRow','$seatingchartCol')";
	break;
	
    case "Delete":
	$query="DELETE FROM nwc_seatingchart
			WHERE t_id = '$seatingchartID' and				  
			      complex_name = '$seatingchartComplex' and
			      rowID = '$seatingchartRow' and
			      columnID = '$seatingchartCol'";
	break;
	
    default:
	$seatingchartNewID = $_POST['newID'];
	$seatingchartNewComplex = $_POST['newComplex'];
	$seatingchartNewRow = $_POST['newRow'];
	$seatingchartNewCol = $_POST['newCol'];
	$query="UPDATE nwc_seatingchart
			SET t_id = '$seatingchartNewID', complex_name = '$seatingchartNewComplex', rowID = '$seatingchartNewRow', columnID = '$seatingchartNewCol'
			WHERE t_id = '$seatingchartID' and				  
			      complex_name = '$seatingchartComplex' and
			      rowID = '$seatingchartRow' and
			      columnID = '$seatingchartCol'";
}
mysql_query($query);

$query="select *
        from nwc_seatingchart";		  
$results_id = mysql_query($query);

if($results_id)
{ 	
    print '<table border=1>';
    print "<br>-------------------------------------<br>";
	print "AFTER";
	print "<br>-------------------------------------<br>";
	print '<th>Theater<th>Complex<th>Row<th>Column<th>';
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
