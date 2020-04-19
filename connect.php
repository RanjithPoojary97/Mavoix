<?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "mavoix");  
      //$query = "SELECT * FROM appointment WHERE apn_id = '".$_POST["id"]."'";

      $query="SELECT * FROM appointment LEFT JOIN patient ON patient.pt_id=appointment.pt_id WHERE apn_id = '".$_POST["id"]."'";


      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
           <div class="modal-body" id="app_detail">
             <div class="table-responsive">  
           <table class="table table-striped">
                <tr>  
                     <td width="30%"><label>Appointment id</label></td>  
                     <td width="70%">'.$row["apn_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Patient</label></td>  
                     <td width="70%">'.$row["pt_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Doctor</label></td>  
                     <td width="70%">'.$row["dr_nm"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Appointment Time</label></td>  
                     <td width="70%">'.$row["apn_time"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Appointment Date</label></td>  
                     <td width="70%">'.$row["apn_date"].'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;

      




 }  
 ?>