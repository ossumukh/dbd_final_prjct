<?php 
 $session=$_GET['email'];
// Load the database configuration file 
// include_once '../core/config.php'; 
// require '../core/config.php';
 
// Fetch records from database 
// $query = $db->query("SELECT * FROM members ORDER BY id ASC"); 
$connect = mysqli_connect("localhost", "ossum", "focus", "cpmsphp");
    $sql = "SELECT * FROM `view_cmp` WHERE email LIKE '%$session%' and statuses not like 'closed'";
    $result = mysqli_query($connect, $sql);
if($result->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "My Open Complaints" . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Ref No', 'Subject', 'Complaint','Status'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['ref_no'], $row['subject'],$row['complain'],$row['statuses']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>