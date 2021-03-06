<?php 

// It reads a json formatted text file and outputs it.
//$orig = $_GET['f'].".json";
//$string = file_get_contents("/var/www/html/f3/ui/data/".$orig);
//echo $string;

$servername = "localhost";
$username = "root";
$password = "j6d8i1a0";
$dbname = "tru";

//Get parameters
$q = $_GET['q'];
// Creating where clause for query
if (isset($q))  { $where = " WHERE type ='".$q."' ";}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT area,station,sum(qty) AS qty FROM interruption $where GROUP BY area, station ORDER BY qty DESC";
$result = $conn->query($sql);

$arr = '{ "cols": [ {"id":"","label":"Area","pattern":"","type":"string"}, {"id":"","label":"Qty","pattern":"","type":"number"} ], "rows":[';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $rows = '{"c":[{"v":"'.$row["area"].'","f":"'.$row["station"].'"},{"v":'.$row["qty"].'}]},';
        $arr .= $rows;
    }
    
} else {
   $rows = '{"c":[ {"v":"","f":""},{"v":"0"}]},';
   $arr .= $rows;
}
$arr = substr($arr,0,(strlen($arr)-1));
echo $arr."]}";
$conn->close();

?>
