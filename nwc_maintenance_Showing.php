<html>
<head><title>Showing Maintenance</title></head>
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
$showingTitle= $_POST['Title'];
$showingComplex = $_POST['Complex'];
$showingID = $_POST['ID'];
$showingTime = $_POST['Time'];
$action = $_POST['Action'];
// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

switch($action) {

    case "Delete":
	$query="select *
  		from nwc_showing s
		where s.title = '$showingTitle' and
		      s.t_id = '$showingID' and				  
		      s.complex_name = '$showingComplex' and
		      s.start_time = '$showingTime'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Showing not found!';
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
  		from nwc_showing s
		where s.title = '$showingTitle' and
		      s.t_id = '$showingID' and				  
		      s.complex_name = '$showingComplex' and
		      s.start_time = '$showingTime'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Showing not found!';
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
  		from nwc_showing s
		where s.title = '$showingTitle' and
		      s.t_id = '$showingID' and				  
		      s.complex_name = '$showingComplex' and
		      s.start_time = '$showingTime'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if($row)
	    {
		print 'Showing already exist!';
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
	from nwc_showing";
$results_id = mysql_query($query);

if($results_id)
{   	
   print '<table border=1>';
   print '<th>Movie Title<th>Theater<th>Complex<th>Start Time<th>';
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
	$query="INSERT INTO nwc_showing VALUES ('$showingTitle','$showingID','$showingComplex','$showingTime')";
	break;
	
    case "Delete":
	$query="DELETE FROM nwc_showing
			WHERE title = '$showingTitle' and
			      t_id = '$showingID' and				  
			      complex_name = '$showingComplex' and
			      start_time = '$showingTime'";
	break;
	
    default:
	$showingNewTitle = $_POST['newTitle'];
	$showingNewComplex = $_POST['newComplex'];
	$showingNewID = $_POST['newID'];
	$showingNewTime = $_POST['newTime'];
	$query="UPDATE nwc_showing
			SET title = '$showingNewTitle', t_id = '$showingNewID', complex_name = '$showingNewComplex', start_time = '$showingNewTime'
			WHERE title = '$showingTitle' and
			      t_id = '$showingID' and				  
			      complex_name = '$showingComplex' and
			      start_time = '$showingTime'";
}
mysql_query($query);

$query="select *
        from nwc_showing";		  
$results_id = mysql_query($query);

if($results_id)
{ 	
    print '<table border=1>';
    print "<br>-------------------------------------<br>";
	print "AFTER";
	print "<br>-------------------------------------<br>";
	print '<th>Movie Title<th>Theater<th>Complex<th>Start Time<th>';
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
