<?php  
 if(isset($_POST["id"]))  
 {  
      $output1 = '';  
      $connect1 = mysqli_connect("localhost", "root", "", "mavoix");  
      $query1 = "SELECT * FROM patient WHERE pt_id = '".$_POST["id"]."'";

      //$query1 ="SELECT * FROM patient LEFT JOIN appointment ON patient.pt_id=appointment.pt_id WHERE apn_id = '".$_POST["id"]."'";


      $result1 = mysqli_query($connect1, $query1);  
      $output1 .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';
      while($row1 = mysqli_fetch_array($result1))  
      {  
           $output1 .= '
           <div class="modal-body" id="patdetail">
             <div class="table-responsive">  
           <table class="table table-striped">
                <tr>  
                     <td width="30%"><label>Patient id</label></td>  
                     <td width="70%">'.$row1["pt_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Patient Name</label></td>  
                     <td width="70%">'.$row1["pt_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Mobile no</label></td>  
                     <td width="70%">'.$row1["mob_no"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Registered Time</label></td>  
                     <td width="70%">'.$row1["reg_time"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Registered Date</label></td>  
                     <td width="70%">'.$row1["reg_date"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Gender</label></td>  
                     <td width="70%">'.$row1["gender"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Age</label></td>  
                     <td width="70%">'.$row1["age"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>location</label></td>  
                     <td width="70%">'.$row1["location"].'</td>  
                </tr>  
                ';  
      }  
      $output1 .= "</table></div>";  
      echo $output1;  
 }  
 ?>