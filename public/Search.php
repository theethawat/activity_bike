<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Bike for EGAT</title>
  <script src="js/jquery-3.4.1.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center"><a href = '/activity_bike/public'>EGAT Live Search Data</a></h2><br />
   <div class="form-group">
    <div class="input-group">
   
     <input type="text" name="search_text" id="search_text" placeholder="ชื่อ, สกุล, BIBID โดยไม่มีตัวอักษรนำหน้า  เช่น 001,101" class="form-control" />
    </div>
   </div>
    
      
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    
    $('#total_records').text(data.length); 
    var html = '';
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {
      html += '<tr>';
      html += '<td>'+data[count].regis_prefix + data[count].regis_name+'</td>';
      html += '<td>'+data[count].regis_surname+'</td>';
      html += '<td>'+data[count].bib_id+'</td>';
     }
    }
    else
    {
     html = '<tr><td colspan="5">No Data Found</td></tr>';
    }   
       
       
    $('#result').html(data);
       
       
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>