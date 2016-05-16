<html>
<head><title>Theater Maintenance</title></head>
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
$theaterComplex = $_POST['Complex'];
$theaterID = $_POST['ID'];
$action = $_POST['Action'];
// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

switch($action) {

    case "Delete":
	$query="select *
  		from nwc_theatre t
		where t_id = '$theaterID' and				  
		      complex_name = '$theaterComplex'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Theater not found!';
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
  		from nwc_theatre t
		where t_id = '$theaterID' and				  
		      complex_name = '$theaterComplex'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Theater not found!';
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
  		from nwc_theatre t
		where t_id = '$theaterID' and				  
		      complex_name = '$theaterComplex'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if($row)
	    {
		print 'Theater already exist!';
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
	from nwc_theatre";
$results_id = mysql_query($query);

if($results_id)
{   	
   print '<table border=1>';
   print '<th>Theater ID<th>Complex<th>Capacity<th>';
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
	$theaterCapacity = $_POST['Capacity'];
	$query="INSERT INTO nwc_theatre VALUES ('$theaterID','$theaterComplex','$theaterCapacity')";
	break;
	
    case "Delete":
	$query="DELETE FROM nwc_theatre
		WHERE t_id = '$theaterID' and				  
		      complex_name = '$theaterComplex'";
	break;
	
    default:	
	$theaterNewComplex = $_POST['newComplex'];
	$theaterNewID = $_POST['newID'];
	$theaterNewCapacity = $_POST['newCapacity'];
	$query="UPDATE nwc_theatre
		SET t_id = '$theaterNewID', complex_name = '$theaterNewComplex', capacity = '$theaterNewCapacity'
		WHERE t_id = '$theaterID' and				  
		      complex_name = '$theaterComplex'";
}
mysql_query($query);

$query="select *
        from nwc_theatre";		  
$results_id = mysql_query($query);

if($results_id)
{ 	
    print '<table border=1>';
    print "<br>-------------------------------------<br>";
	print "AFTER";
	print "<br>-------------------------------------<br>";
	print '<th>Theater ID<th>Complex<th>Capacity<th>';
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
