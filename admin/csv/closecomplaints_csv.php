<?php 

// Load the database configuration file 
// include_once '../core/config.php'; 
// require '../core/config.php';
 
// Fetch records from database 
// $query = $db->query("SELECT * FROM members ORDER BY id ASC"); 
$connect = mysqli_connect("localhost", "ossum", "focus", "cpmsphp");
    $sql ="SELECT * FROM `view_cmp` where statuses  like 'closed' ";
    $result = mysqli_query($connect, $sql);
   if($result->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "Closed Complaints" . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'NAME', 'Email', 'Phone no', 'Subject','Complaint','Technician'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['name'], $row['email'], $row['phone no'], $row['subject'],$row['complain'],$row['dummy']); 
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