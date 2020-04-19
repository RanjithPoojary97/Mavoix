<?php  
 $connect = mysqli_connect("localhost", "root", "", "mavoix");  
 $query = "SELECT * FROM appointment INNER JOIN patient ON patient.pt_id=appointment.pt_id";
 $result = mysqli_query($connect, $query);

 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Mavoix Assignment</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Patient Details</h3>  
                <br />  
                <div class="table-responsive">  
                     <table class="table" align="center" style="width: 400px;">  
                      <thead class="thead-light">
                          <tr>  
                               <th width="80px">Patient Mobile</th>  
                               <th width="20px">Appointment</th> 
                               <th width="20px">Patient</th> 
                          </tr> 
                          </thead> 
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <!-- <td><?php //echo $row["pt_id"]; ?></td>-->
                               <td><?php echo $row["mob_no"]; ?></td>  
                               <td><input type="button" name="view" value="Appointment Details" id="<?php echo $row["apn_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                              <td><input type="button" data-toggle="modal" data-target="#patModal" name="view" value="Patient Details" id="<?php echo $row["pt_id"]; ?>" class="btn btn-info btn-xs view_data1" /> </td> 
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Appointment Details</h4> 
                     <span class="comSpan"id="comSpan" style=""></span> 
                </div>

                

                
                <div class="modal-body" id="app_detail"> 
                  



                
             
           
               
                </div>    
             </div>
      </div>  
 </div>  

<div id="patModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Patient Details</h4> 
                     <span class="patientid"id="patientid" style=""></span> 
                </div>  
                <div class="modal-body" id="pat_detail"> 
                  



                
             
           
               
                </div>    
             </div>
      </div>  
 </div>  

 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){

        var comValues = $(this).attr("id");
        

 
 document.getElementById("comSpan").innerHTML=comValues;
 console.log(comValues);


           var id = $(this).attr("id"); 
            console.log(id);
           $.ajax({  
                url:"connect.php",  
                method:"post",  
                data:{id:id},
                   
                success:function(data){  
                  console.log(data);
                     $('#app_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 }); 


 $(document).ready(function(){  
      $('.view_data1').click(function(){

        

         var comValues1 = $(this).attr("id");
        
        
 
 document.getElementById("patientid").innerHTML=comValues1;
 console.log(comValues1);


          

           var id = $(this).attr("id"); 
           //var ptid=$('#pt_id').val();
            console.log(id);
           $.ajax({  
                url:"patientDet.php",  
                method:"post",  
                data:{id:id},
               
                success:function(data){  
                  console.log(data);
                     $('#pat_detail').html(data);  
                     $('#patModal').modal("show");  
                   
                }  
           });  
      });  
 });
 
 </script>
