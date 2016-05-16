<html>
<head><title>Membership Maintenance</title></head>
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
$membershipAccount = $_POST['Acct'];
$action = $_POST['Action'];
// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

if(strlen($membershipAccount) < 9)
{
    print 'Account Number must be 9 digits!';
    exit;

}

switch($action) {

    case "Delete":
	$query="select *
  		from nwc_membership m
		where m.account_no = '$membershipAccount'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Membership not found!';
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
  		from nwc_membership m
		where m.account_no = '$membershipAccount'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Membership not found!';
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
  		from nwc_membership m
		where m.account_no = '$membershipAccount'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if($row)
	    {
		print 'Account number already exist!';
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
  	from nwc_membership";
$results_id = mysql_query($query);

if($results_id)
{   	
   print '<table border=1>';
   print '<th>Account No.<th>Start Date<th>Expire Date<th>Password<th>';
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
	$membershipStart = $_POST['Start'];
	$membershipEnd = $_POST['End'];
	$membershipPass = $_POST['Pass'];
	$query="INSERT INTO nwc_membership VALUES ('$membershipAccount','$membershipStart','$membershipEnd','$membershipPass')";
	break;
	
    case "Delete":
	$query="DELETE FROM nwc_membership
		WHERE account_no = '$membershipAccount'";
	break;
	
    default:
	$membershipNewAccount = $_POST['newAcct'];
	$membershipNewStart = $_POST['newStart'];
	$membershipNewEnd = $_POST['newEnd'];
	$membershipNewPass = $_POST['newPass'];
	$query="UPDATE nwc_membership
		SET account_no = '$membershipNewAccount',start_date = '$membershipNewStart',expire_date = '$membershipNewEnd',password = '$membershipNewPass'
		WHERE account_no = '$membershipAccount'";
}
mysql_query($query);

$query="select *
        from nwc_membership";		  
$results_id = mysql_query($query);

if($results_id)
{ 	
    print '<table border=1>';
    print "<br>-------------------------------------<br>";
	print "AFTER";
	print "<br>-------------------------------------<br>";
	print '<th>Account No.<th>Start Date<th>Expire Date<th>Password<th>';
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
