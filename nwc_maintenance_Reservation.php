<html>
<head><title>Reservation Maintenance</title></head>
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
$reservationName= $_POST['Name'];
$reservationAccount = $_POST['Acct'];
$reservationID = $_POST['ID'];
$reservationComplex = $_POST['Complex'];
$reservationTime = $_POST['Time'];
$reservationDate = $_POST['Date'];
$action = $_POST['Action'];
// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

if(strlen($reservationAccount) < 9)
{
    print 'Account Number must be 9 digits!';
    exit;

}

switch($action) {

    case "Delete":
	$query="select *
  		from nwc_reserved r
		where r.mb_name = '$reservationName' and
		      r.account_no = '$reservationAccount' and
		      r.t_id = '$reservationID' and
		      r.complex_name = '$reservationComplex' and
		      r.time = '$reservationTime' and
		      r.day = '$reservationDate'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Reservation not found!';
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
  		from nwc_reserved r
		where r.mb_name = '$reservationName' and
		      r.account_no = '$reservationAccount' and
		      r.t_id = '$reservationID' and
		      r.complex_name = '$reservationComplex' and
		      r.time = '$reservationTime' and
		      r.day = '$reservationDate'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Reservation not found!';
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
  		from nwc_reserved r
		where r.mb_name = '$reservationName' and
		      r.account_no = '$reservationAccount' and
		      r.t_id = '$reservationID' and
		      r.complex_name = '$reservationComplex' and
		      r.time = '$reservationTime' and
		      r.day = '$reservationDate'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if($row)
	    {
		print 'Reservation already exist!';
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
		from nwc_reserved";
$results_id = mysql_query($query);

if($results_id)
{   	
   print '<table border=1>';
   print '<th>Name<th>Account No.<th>Theater<th>Complex<th>Row<th>Column<th>Time<th>Date<th>';
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
	$reservationRow = $_POST['Row'];
	$reservationCol = $_POST['Col'];
	$query="INSERT INTO nwc_reserved VALUES ('$reservationName','$reservationAccount','$reservationID','$reservationComplex','$reservationRow','$reservationCol','$reservationTime','$reservationDate')";
	break;
	
    case "Delete":
	$query="DELETE FROM nwc_reserved
		       WHERE mb_name = '$reservationName' and
			     account_no = '$reservationAccount' and
			     t_id = '$reservationID' and
			     complex_name = '$reservationComplex' and
			     time = '$reservationTime' and
			     day = '$reservationDate'";
	break;
	
    default:
	$reservationNewName = $_POST['newName'];
	$reservationNewAccount = $_POST['newAcct'];
	$reservationNewID = $_POST['newID'];
	$reservationNewComplex = $_POST['newComplex'];
	$reservationNewRow = $_POST['newRow'];	
	$reservationNewCol = $_POST['newCol'];	
	$reservationNewTime = $_POST['newTime'];	
	$reservationNewDate = $_POST['newDate'];
	$query="UPDATE nwc_reserved
			SET mb_name = '$reservationNewName', account_no = '$reservationNewAccount', t_id = '$reservationNewID', complex_name = '$reservationNewComplex', rowID = '$reservationNewRow', columnID = '$reservationNewCol', time = '$reservationNewTime', day = '$reservationNewDate'
			WHERE mb_name = '$reservationName' and
				  account_no = '$reservationAccount' and
				  t_id = '$reservationID' and
				  complex_name = '$reservationComplex' and
			     	  time = '$reservationTime' and
			     	  day = '$reservationDate'";
}
mysql_query($query);

$query="select *
        from nwc_reserved";		  
$results_id = mysql_query($query);

if($results_id)
{ 	
    print '<table border=1>';
    print "<br>-------------------------------------<br>";
	print "AFTER";
	print "<br>-------------------------------------<br>";
	print '<th>Name<th>Account No.<th>Theater<th>Complex<th>Row<th>Column<th>Time<th>Date<th>';
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
