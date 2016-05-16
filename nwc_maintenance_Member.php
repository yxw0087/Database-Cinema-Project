<html>
<head><title>Member Maintenance</title></head>
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
$memberName = $_POST['Name'];
$memberAccount = $_POST['Acct'];
$action = $_POST['Action'];
// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

if(strlen($memberAccount) < 9)
{
    print 'Account Number must be 9 digits!';
    exit;

}

switch($action) {

    case "Delete":
	$query="select *
  		from nwc_member m
		where m.mb_name = '$memberName' and
		      m.account_no = '$memberAccount'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Member not found!';
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
  		from nwc_member m
		where m.mb_name = '$memberName' and
		      m.account_no = '$memberAccount'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Member not found!';
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
  		from nwc_member m
		where m.mb_name = '$memberName' and
		      m.account_no = '$memberAccount'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if($row)
	    {
		print 'Member name with this account number already exist!';
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
  	from nwc_member";
$results_id = mysql_query($query);

if($results_id)
{   	
   print '<table border=1>';
   print '<th>Name<th>Account No.<th>Phone No.<th>Email<th>Age<th>Address<th>Is Primary?<th>';
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
	$memberPhone = $_POST['Phone'];
	$memberEmail = $_POST['Email'];
	$memberAge = $_POST['Age'];
	$memberAddr = $_POST['Addr'];
	$memberPrimary = $_POST['Primary'];
	$query="INSERT INTO nwc_member VALUES ('$memberName','$memberAccount','$memberPhone','$memberEmail','$memberAge','$memberAddr','$memberPrimary')";
	break;
	
    case "Delete":
	$query="DELETE FROM nwc_member
		WHERE mb_name = '$memberName' and
		      account_no = '$memberAccount'";
	break;
	
    default:
	$memberNewName = $_POST['newName'];
	$memberNewAccount = $_POST['newAcct'];	
	$memberNewPhone = $_POST['newPhone'];	
	$memberNewEmail = $_POST['newEmail'];	
	$memberNewAge = $_POST['newAge'];	
	$memberNewAddr = $_POST['newAddr'];
	$memberNewPrimary = $_POST['newPrimary'];
	$query="UPDATE nwc_member
		SET mb_name = '$memberNewName', account_no = '$memberNewAccount', phone_no = '$memberNewPhone', email = '$memberNewEmail', age = '$memberNewAge',addr = '$memberNewAddr', main_mb = '$memberNewPrimary'
		WHERE mb_name = '$memberName' and
		      account_no = '$memberAccount'";
}
mysql_query($query);

$query="select *
        from nwc_member";		  
$results_id = mysql_query($query);

if($results_id)
{ 	
    print '<table border=1>';
    print "<br>-------------------------------------<br>";
	print "AFTER";
	print "<br>-------------------------------------<br>";
	print '<th>Name<th>Account No.<th>Phone No.<th>Email<th>Age<th>Address<th>Is Primary?<th>';
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
