<?php

header('Content-Type: text/html; charset=utf-8');
//fetch.php
$conn = mysqli_connect("localhost", "operator", "opt2007", "activity_bike");


//Set the php page to display Thai language
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'"); 




$output = '';
if(isset($_POST["query"]))
{   
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "SELECT * FROM bike_register WHERE regis_name LIKE '%".$search."%'OR bib_id LIKE '%".$search."%'OR regis_surname LIKE '%".$search."%'";
     
}
else
{
 $query = "
  SELECT * FROM bike_register ORDER BY id
 ";
}
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name</th>
     <th>Surname</th>
     <th>BIB ID</th>
     <th>Shirt Size</th>
     <th>Receive Status</th>
     <th>Edit Information</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
   if($row["regis_donation"]=="1000000" && $row["regis_method"]=="Offline" )
      $bib_head = "SC00";
   if($row["regis_donation"]=="5000" && $row["regis_method"]=="Offline" )
      $bib_head = "VC00";
   if($row["regis_donation"]=="500" && $row["regis_method"]=="Offline" )
      $bib_head = "GC00";
   if($row["regis_donation"]=="1000000" && $row["regis_method"]=="Website" )
      $bib_head = "SW00";
   if($row["regis_donation"]=="5000" && $row["regis_method"]=="Website" )
      $bib_head = "VW00";
   if($row["regis_donation"]=="500" && $row["regis_method"]=="Website" )
      $bib_head = "GW00";
   if($row["cloth_recieve"] == true) $recloth = "YES";
   if($row["cloth_recieve"] == false) $recloth = "<a onclick = 'myFunction()'href = 'home/recieve/cloth/".$row["id"]."'> มอบเสื้อ</a>";
   $reedit = "<a onclick = 'myFunction()'href = 'home/edit/".$row["id"]."'> แก้ไขข้อมูล</a>";
  $output .= '
   <tr>
    <td>'.$row["regis_prefix"].$row["regis_name"].'</td>
    <td>'.$row["regis_surname"].'</td>
    <td>'.$bib_head.$row["bib_id"].'</td>
    <td>'.$row["regis_size"].'</td>
    <td>'.$recloth.'</td>
    <td>'.$reedit.'</td>
	
	
	
   
	
	
	
	
   </tr>
  ';
 }
     
 echo $output;
//   echo  count($output); 
}
else
{
 echo 'Data Not Found';
}






?>




