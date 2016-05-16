<html>
<head><title>Movie Maintenance</title></head>
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
$movieTitle = $_POST['Title'];
$action = $_POST['Action'];
// Connect to the database
$connect = mysql_connect($host,$user,$password)
	 or die("Unable to connect to database");
	 
// Select the database - the @ supresses MySQL error output
@mysql_select_db($database) or die("Unable to select database");

switch($action) {

    case "Delete":
	$query="select *
  		from nwc_movie m
		where m.title = '$movieTitle'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Movie not found!';
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
  		from nwc_movie m
		where m.title = '$movieTitle'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if(!$row)
	    {
		print 'Movie not found!';
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
  		from nwc_movie m
		where m.title = '$movieTitle'";
	$check = mysql_query($query);
	if($check)
	{
	    $row = mysql_fetch_row($check);
	    if($row)
	    {
		print 'Movie already exist!';
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
  	from nwc_movie";
$results_id = mysql_query($query);

if($results_id)
{   	
   print '<table border=1>';
   print '<th>Title<th>Stars<th>Rating<th>Description<th>Run time<th>';
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
	$movieStars = $_POST['Stars'];
	$movieRating = $_POST['Rating'];
	$movieDescript = $_POST['Descript'];
	$movieRun = $_POST['Run'];
	$query="INSERT INTO nwc_movie VALUES ('$movieTitle','$movieStars','$movieRating','$movieDescript','$movieRun')";
	break;
	
    case "Delete":
	$query="DELETE FROM nwc_movie
		WHERE title = '$movieTitle'";
	break;
	
    default:	
	$movieNewTitle = $_POST['newTitle'];
	$movieNewStars = $_POST['newStars'];	
	$movieNewRating = $_POST['newRating'];	
	$movieNewDescript = $_POST['newDescript'];	
	$movieNewRun = $_POST['newRun'];
	$query="UPDATE nwc_movie
		SET title = '$movieNewTitle', stars = '$movieNewStars', rating = '$movieNewRating', description = '$movieNewDescript', runtime = '$movieNewRun'
		WHERE title = '$movieTitle'";
}
mysql_query($query);

$query="select *
        from nwc_movie";		  
$results_id = mysql_query($query);

if($results_id)
{ 	
    print '<table border=1>';
    print "<br>-------------------------------------<br>";
	print "AFTER";
	print "<br>-------------------------------------<br>";
	print '<th>Title<th>Stars<th>Rating<th>Description<th>Run time<th>';
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
