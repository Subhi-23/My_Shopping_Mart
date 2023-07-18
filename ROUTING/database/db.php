<?php
    include 'headers.php';
   
   include 'connection.php';
   $value = json_decode(file_get_contents('php://input'), true); 
 
   $user= $value['userid'];
   //Query to take from items table and specific table
    $query="SELECT *
        FROM items
        LEFT JOIN Specifictable ON items.Productid = Specifictable.Pid
        WHERE (items.User = 'All' OR Specifictable.Userid = '$user');
        ";
    
    $result = mysqli_query($conn ,$query);  
       
    while( $row = mysqli_fetch_array($result)){
        $Items[] = $row;    
        
    }
  
   echo json_encode($Items);




 
?>