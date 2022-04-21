<?php
  require '../core/session.php';
  require '../core/config.php';
  require '../core/admin-key.php';
  $searchTerm = $_GET['term']; 
  echo "$searchTerm";
$sql = "SELECT complain FROM cmp_log WHERE complain LIKE '%".$searchTerm."%'  ORDER BY complain ASC";
$result = mysqli_query($conn, $sql) or die("Error " .
mysqli_error($connection));

$dname_list = array();
while($row = mysqli_fetch_array($result))
{
$fullname = $row['complain'];

$dname_list[] = $fullname;
}
echo json_encode($dname_list);
?>