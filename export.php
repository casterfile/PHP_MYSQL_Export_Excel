<?php
include("connection.php");

$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM armtest";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th>  
                         <th>NAME</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
                     <tr>  
                         <td>'.$row["armtest_ID"].'</td>  
                         <td>'.$row["armtest_Name"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
