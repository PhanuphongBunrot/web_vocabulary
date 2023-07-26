<?php 
include "db.php";
 
 $query = "SELECT * FROM vocabulary_en where status_w is null ";
 $result = mysqli_query($conn, $query);
 $output ='';
 
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>คำศัพท์อังกฤษ</th>  
                         <th>คำแปล</th>  
                         
       
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["vla"].'</td>  
                         
                         <td>'.$row["meaning"].'</td>  
                            
                            
        </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=vocabularyEnglish.xls');
  echo $output;
 }


?>