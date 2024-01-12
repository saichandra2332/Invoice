<?php
require_once "config.php";
session_start();
$main_id1 =$_SESSION["main_id"] ;
?>
<style>


</style>
<?php
$Getname=mysqli_query($conn, "SELECT * FROM user_details WHERE STATUS='1'AND u_id='$main_id1'") or die(mysqli_error($conn));
    $resdetails2=mysqli_fetch_object($Getname);
        $username=$resdetails2->u_name;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE</title>     
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
   body {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            padding: 0;
            
            font-family: 'Raleway', sans-serif;
            color: black;
            background-color:hsla(0, 2%, 92%);
        }
 
header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
        }
</style>
</head>
<body >
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php

  if(isset($_POST['save'])){
    $inclient=$_POST['cname'];
    $innum=$_POST['ino'];
    $inproject=$_POST['pname'];
    $intype1=$_POST['intype'];
    $inup=$_POST['up'];
    $inad=$_POST['ad'];
    $indd=$_POST['dd'];
    $inqty=$_POST['qty'];
    $inlb=$_POST['lb'];
    $innote=$_POST['note'];
    $inup = floatval($_POST['up']); // Convert the string to a float
$gst = 18 / 100 * $inup; // Calculate GST based on $inup
$grandtotal = $gst + $inup; // Calculate grand total based on $inup
$thirtyDaysAfterInvoice = date('Y-m-d', strtotime($inad . ' + 30 days'));
$thirteenDaysAfterInvoice = date('Y-m-d', strtotime($inad . ' + 13 days'));





    $holidays =[

      '2024-01-07', '2024-01-14', '2024-01-21', '2024-01-28',
      '2024-02-04', '2024-02-11', '2024-02-18', '2024-02-25',
      '2024-03-03', '2024-03-10', '2024-03-17', '2024-03-24',
      '2024-03-31', '2024-04-07', '2024-04-14', '2024-04-21',
      '2024-04-28', '2024-05-05', '2024-05-12', '2024-05-19',
      '2024-05-26', '2024-06-02', '2024-06-09', '2024-06-16',
      '2024-06-23', '2024-06-30', '2024-07-07', '2024-07-14',
      '2024-07-21', '2024-07-28', '2024-08-04', '2024-08-11',
      '2024-08-18', '2024-08-25', '2024-09-01', '2024-09-08',
      '2024-09-15', '2024-09-22', '2024-09-29', '2024-10-06',
      '2024-10-13', '2024-10-20', '2024-10-27', '2024-11-03',
      '2024-11-10', '2024-11-17', '2024-11-24', '2024-12-01',
      '2024-12-08', '2024-12-15', '2024-12-22', '2024-12-29'
  ];
  // Add your actual holiday dates
  
  // Function to check if a date is a holiday
  function isHoliday($date, $holidays) {
      return in_array($date, $holidays);
  }
  function isWeekend($date) {
      $dayOfWeek = date('N', strtotime($date));
      return $dayOfWeek >= 6; // Saturday (6) or Sunday (7)
  }
  // Function to check if a date is today
  function isToday($date) {
      return date('Y-m-d') === $date;
  }
  function isAmountValid($amount){
    return $amount < 100000;
}
  
  
  if (isHoliday($inad, $holidays) || isWeekend($inad)) {
    echo '<script>';
    echo   "Swal.fire({
           icon: 'error',
           title: 'Check',
           text: 'Invoice date cannot be holiday'
       })";
    echo '</script>'; 
  }
  
  elseif (isHoliday($indd, $holidays) || isWeekend($indd) || $indd < $inad) {
    echo '<script>';
    echo   "Swal.fire({
           icon: 'error',
           title: 'Check',
           text: 'Due date cannot be a holiday and It must be equal to or after the invoice date.'

       })";
   echo '</script>';      
  }
  
  
  elseif ($indd > $thirtyDaysAfterInvoice) {
    echo '<script>';
    echo   "Swal.fire({
           icon: 'error',
           title: 'Check',
           text: 'Due date must be within thirty days after the invoice date.'
       })";
    echo '</script>';   
  }
  
  
  elseif (!isToday($inad)) {
    echo '<script>';
    echo   "Swal.fire({
           icon: 'error',
           title: 'Check',
           text: 'Invoice date must be today\'s date.'
       })";
    echo '</script>';     
  }

  
elseif (!isAmountValid($inup)) {
    echo '<script>';
    echo   "Swal.fire({
           icon: 'error',
           title: 'Check',
           text: 'Amount must be less than 100,000.'
       })";
    echo '</script>';  
}


elseif ($indd < $thirteenDaysAfterInvoice) {
  echo '<script>';
    echo   "Swal.fire({
           icon: 'error',
           title: 'Check',
           text: 'Due date must be at least 13 days after the invoice date.'
       })";
    echo '</script>';  
}else{



  $qry = mysqli_query($conn, "INSERT INTO invoicetable(client_name,in_no,project_name,ac_date,due_date,in_type,qty,unitprice,in_lb,note,in_gst,g_total,price_words)VALUES('$inclient','$innum','$inproject','$inad','$indd','$intype1','$inqty','$inup','$inlb','$innote','$gst','$grandtotal','$numw')") or die(mysqli_error($conn));
}
    if($qry){
      // echo "insert successful";
  
    }else{
      // echo "insert failed";
    }
  
  } else{
    echo '<script>';
    echo   "Swal.fire({
           icon: 'error',
           title: 'Check',
           text: 'Input Fields Cant Be Empty'
       })";
   echo '</script>';
  }
    

  ?>
  <form method="POST">
  <header>
        <img style="height: 62px;" src="VULCANTECHS-logo.png">
        <h1>INVOICE SYSTEM</h1>
    </header>
    <a href="login.php"><i style="position: relative;
    left: 1470px;
    top: 12px;
    font-size: 23px;" class="bi bi-box-arrow-left"></i></a>
<div class="row ">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"></div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ms-5">
        <table border="0px"class="m-3"style="font-weight:bold;font-size:20px;">
        <td>Client Name</td>
    <td>:</td>
    <td>
        <select class="form-select" name="cname" id="cname">
            <option value="">--Select--</option>
            <option value="Ford Motors PVT">FORD</option>
            <option value="BENZ">BENZ</option>
            <option value="Arrow">Arrow</option>
        </select>
    </td>
</tr>

                    

                    <tr>
                        <td>Invoice Number</td>
                        <td>:</td>
                        <td><input class="form-control" type="text" name="ino" id="ino" value=""></td>
                    </tr>

                    <tr>
                        <td>Project Name</td>
                        <td>:</td>
                        <td><input class="form-control" type="text" name="pname" id="pname" value=""></td>
                    </tr>
                    

                    <tr>
    <td>Invoice type</td>
    <td>:</td>
    <td>
        <select class="form-select" name="intype" id="intype">
            <option value="">--Select--</option>
            <option value="CGST">CGST</option>
            <option value="GST">GST</option>
            <option value="IGST">IGST</option>
        </select>
    </td>
</tr>
                    
                    <tr>
                        <td>Unit Price</td>
                        <td>:</td>
                        <td><input class="form-control"  type="number" name="up" id="up" value=""></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>:</td>
                        <td><input class="form-control" type="tel" name="qty" id="qty"      value=""></td>
                    </tr>
                </table> 
            </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ms-5">

  <table border="0px"class="m-3"style="font-weight:bold;font-size:20px;">
  
  <tr>
                        <td>Actual date</td>
                        <td>:</td>
                        <td><input class="form-control" type="date" name="ad" id="ad" value=""></td>
                    </tr>
                    
                    <tr>
                        <td>Due date</td>
                        <td>:</td>
                        <td><input class="form-control" type="date" name="dd" id="dd" value=""></td>
                    </tr>
                    <tr>
                        <td>To Adress</td>
                        <td>:</td>
                        <td><div class="form-floating">
                            <textarea class="form-control"type="text" name="lb" id="lb" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            </div></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td><div class="form-floating">
                        <textarea class="form-control" type="text" name="note"id="note" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        </div></td>
                    </tr>
                    
                </table>                   
       </div>
       </div>
    <div class="row ">
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5"></div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ms-5">
          <table border="0px"style="font-weight:bold;font-size:20px;">           
            <tr>
                <td colspan="3"><center><input  class="btn btn-success rounded-pill my-4" style="width:150px;font-weight:bold;font-size:20px;"type="submit" name="save" id="save" value="Save"></center></td>
            </tr>
            <button onclick="capture()" class=" ms-5 btn btn-danger rounded-pill" type="button">Download<i style="font-size : 16px" class='bx bxs-downvote'></i></button>

          </table>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ms-5"></div>
      </div>

<div class="text-capitalize " id="billcontent">
          <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
            <div class="ms-4 mt-4 mb-0" style="background-color:#32cd3291;color:black;"><b>FROM</b><br><b>VulcanTechs</b> </br>s-3 sarada residency dairy quarters</br> Visakhapatnam </br> Andhra Pradesh 530012</br> India </br>Contact: 7386606346 <br> E-mail: saichandra2332@gmail.com<br> </div></div>
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"></div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            </div>
          </div>
          <div><img style="height: 66px;position: relative;left: 428px; top: 30px " src="VULCANTECHS-litelogo.png"></div>
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="container-fluid">
          <div class="mt-5 mb-0" style="text-align:center;background-color:white;font-size:25px;color:black;">INVOICE</div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <table class="table table-bordered p-0 m-0 border-dark border border-2">
              <tr>
                <th>Client name</th>
                <th>Invoice Number</th>
                <th >Project name</th>
                <th >Actual date</th>
                <th >Due date</th>
                <th>Action</th>
              </tr>
              <tr>
              <?php
      $qry=mysqli_query($conn,"select * from invoicetable where in_status='1'order by in_id DESC limit 10;")or die(mysqli-error($conn));
$res=mysqli_fetch_object($qry)
?>
                <td id="dataProject"><?php echo $res->client_name;?></td>
                <td><?php echo $res->in_no;?></td>
                <td id="dataQuantity"><?php echo $res->project_name;?></td>
                <td><?php echo $res->ac_date;?></td>
                <td><?php echo $res->due_date;?></td>
                <td>  <button type="button" class="btn" data-bs-dismiss="modal" onclick="updateFunction()"><i class="bi bi-list"></i></button></td>

               
              </tr>
            </table>
            <table class="table table-bordered p-0 m-0 border-dark border border-2">            
              <tr>
                <th>S.no</th>
                <th >Invoice Type</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>GST(18%)</th>
                <th>Grand Total</th>
              </tr>
              <tr>
                <td ><?php echo $res->in_id;?></td>
                <td><?php echo $res-> in_type;?></td>
                <td id="dataAmount"><?php echo $res->qty?></td>
                <td id="dataAmount2"><?php echo $res->unitprice;?></td>
                <td id="gst"><?php echo $res-> in_gst;?></td>
                <td id="gtotal" style="font-size: 19px;font-weight: 700;"><?php echo $res-> g_total;?></td>
              </tr>
            </table>
            <table class="table table-bordered p-0 m-0 border-dark border border-2"> 
              <tr>
                <th>To Adress</th>
                
              </tr>
              <tr>
                <td><b><?php echo $res-> in_lb;?></b></td>
                
              </tr>
              
            </table>
            </div>
        </div>
    </div>
  <div class="row">
    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
    <div class="ms-4 mt-4 mb-0 d-flex" style="background-color:white;color:black;"><b>Description:</b><?php echo $res->note;?></div>
    <div class="ms-4 mt-4 mb-0  " style="background-color:white;color:black;"><b>SIgnature :</b></div></div>
    
    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"></div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
  </div>
</div>    
</div> 
</div>         
<div id="pdfContent">
<div class="container-fluid mt-5">
    <table class="table table-bordered">
      <tr>
      <th>S.no</th>
        <th >Client name</th>
        <th >Invoice Number</th>
        <th >Project name</th>
        <th >Actual date</th>
        <th >Due date</th>
        <th >Invoice Type</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>GST<br>(18%)</th>
        <th>Grand Total</th>
        <th>To Adress</th>
        <th>Description</th>
        <th>Action</th>


        
          </tr>

          <?php
      $qry=mysqli_query($conn,"SELECT * FROM invoicetable WHERE in_status='1'order by in_id DESC limit 10;")or die(mysqli-error($conn));
while($res=mysqli_fetch_object($qry)){?>
     
      <tr>
      <td><?php echo $res->in_id;?></td>
        <td><?php echo $res-> client_name;?></td>
        <td><?php echo $res-> in_no;?></td>
        <td><?php echo $res-> project_name;?></td>
        <td><?php echo $res-> ac_date;?></td>
        <td><?php echo $res-> due_date;?></td>
        <td><?php echo $res-> in_type;?></td>
      <td><?php echo $res-> qty?></td>
      <td><?php echo $res-> unitprice;?></td>
      <td><?php echo $res-> in_gst;?></td>
      <td><?php echo $res-> g_total;?></td>
      <td><?php echo $res-> in_lb;?></td>
      <td><?php echo $res->note;?></td>
      <td><button type="submit" name="edit" id="edit" >
  Edit
</button></td>
  
</tr>
<?php }?>
<?php

  if(isset($_POST['save'])){
    $inclient=$_POST['cname'];
    $innum=$_POST['ino'];
    $inproject=$_POST['pname'];
    $intype1=$_POST['intype'];
    $inup=$_POST['up'];
    $inad=$_POST['ad'];
    $indd=$_POST['dd'];
    $inqty=$_POST['qty'];
    $inlb=$_POST['lb'];
    $innote=$_POST['note'];


  }
    ?>















          





   

    
    

    </table>

</div>
</div>
  </div>
  <!-- Modal EDIT ROLE -->
                        <div class="modal fade" id="updateModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content p-5">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel">EDIT BILL</h5>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="projectNameModal" class="form-label">Client Name</label>
                                                    <input type="text" class="form-control py-2" id="projectNameModal" name="projectNameModal">
                                                </div>
                                                <div class="col-6">
                                                    <label for="itemNameModal" class="form-label">Project Name</label>
                                                    <input type="text" class="form-control py-2" id="itemNameModal" name="itemNameModal">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="quantityModal" class="form-label">Quantity</label>
                                                    <input type="text" class="form-control py-2" id="quantityModal"  oninput="validateQuantity(this)"  name="quantityModal">
                                                </div>
                                                <div class="col-6">
                                                    <label for="amountModal" class="form-label">Unit Price</label>
                                                    <input type="text" class="form-control py-2" id="amountModal" name="amountModal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-bs-dismiss="modal">CANCEL</button>
                                            <button type="button" class="btn px-5" style="background-color: #243A85CC; color: white;" data-bs-dismiss="modal" id="updateBill" onclick="updateBill1()">UPDATE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!--MODALEND-->

  
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>

$(document).ready(function(){
      $('#cname').change(function(){
          var c_name = $(this).val();
          console.log(c_name);

              $.ajax({
                  url: 'invoice_id.php', 
                  type: 'POST',
                  data: { c_name: c_name },
                  dataType: 'json',
                  success: function(response) {
                        $('#ino').val(response.invoiceId);
                  },
                  error: function(error) {
                        console.error('Error:', error);
                  }
              });
      });
});
  function capture() {
      var table = document.getElementById("billcontent");

      html2pdf(table);
    }

  function invoiceupdate(a,b,c,d,e,f,g,h,i){  
           
           document.getElementById('cname1').value=a;
           document.getElementById('pname1').value=b;
           document.getElementById('ad1').value=c;
           document.getElementById('dd1').value=d;
           document.getElementById('intype1').value=e;
           document.getElementById('qty1').value=f;
           document.getElementById('up1').value=g;
           document.getElementById('lb1').value=h;
           document.getElementById('note1').value=i;
  }

  function updateFunction(){
    var clientName = $('#dataProject').text();
    $('#projectNameModal').val(clientName);

    var projectName = $('#dataQuantity').text();
    $('#itemNameModal').val(projectName);

    var quantity = $('#dataAmount').text();
    $('#quantityModal').val(quantity);

    var unitprice = $('#dataAmount2').text();
    $('#amountModal').val(unitprice);

    $('#updateModal').modal('show');
  }

  function updateBill1() {
      var client = $('#projectNameModal').val();
      var project = $('#itemNameModal').val();
      var quantity = $('#quantityModal').val();
      var unitPrice = $('#amountModal').val();

      var unit = parseFloat(quantity);
      var unit1 = parseFloat(unitPrice);
      var totalAmount = unit*unit1;
      var gat = (18/100)*totalAmount;
      var grandTotal = gat+totalAmount;

      $('#dataProject').text(client);
      $('#dataQuantity').text(project);
      $('#dataAmount').text(quantity);
      $('#dataAmount2').text(unitPrice);
      $('#gst').text(gat);
      $('#gtotal').text(grandTotal);



      
            
       }


       function validateQuantity(input) {
        var value = input.value.trim();
        var intValue = parseInt(value, 10);

        if (isNaN(intValue) || intValue < 1 || intValue > 10) {
            input.value = '';
        }
      }


       
</script>
  


</body>
</html>