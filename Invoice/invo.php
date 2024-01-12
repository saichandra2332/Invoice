<?php
require_once "config.php";

if (isset($_POST['save'])) {
    $fcolor1 = $_POST['cname'];
    $fcolor2 = $_POST['pname'];
    $fcolor3 = $_POST['up'];
    $fcolor4 = $_POST['qty'];
    $fcolor5 = $_POST['ad'];
    $fcolor6 = $_POST['dd'];
    $fcolor7 = $_POST['lb'];
    $fcolor8 = $_POST['note'];

    // Check if the update button is clicked
    if (isset($_POST['update'])) {
        $update_id = $_POST['update_id'];
        $update_query = "UPDATE invoicetable SET 
                         client_name = '$fcolor1',
                         project_name = '$fcolor2',
                         ac_date = '$fcolor5',
                         due_date = '$fcolor6',
                         qty = '$fcolor4',
                         unitprice = '$fcolor3',
                         in_lb = '$fcolor7',
                         note = '$fcolor8'
                         WHERE in_id = '$update_id'";

        $update_result = mysqli_query($conn, $update_query);
        
        if ($update_result) {
            echo "Updated successfully";
        } else {
            echo "Update failed";
            die(mysqli_error($conn));
        }
    } else {
        // Insert new record if the "save" button is clicked
        $insert_query = "INSERT INTO invoicetable(client_name, project_name, ac_date, due_date, qty, unitprice, in_lb, note) 
                         VALUES('$fcolor1', '$fcolor2', '$fcolor3', '$fcolor4', '$fcolor5', '$fcolor6', '$fcolor7', '$fcolor8')";
        
        $insert_result = mysqli_query($conn, $insert_query);
        
        if ($insert_result) {
            echo "Inserted successfully";
        } else {
            echo "Insert failed";
            die(mysqli_error($conn));
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&family=Roboto&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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

    <style>
        body {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            padding: 0;
            background-size: cover;
            background-position: center;
            font-family: 'Raleway', sans-serif;
            color: black;
            background-color: hsla(0, 2%, 92%);
        }

        @media print {
            header, footer, aside, form, … {
                display: none;
            }
            article {
                width:100%!important;
                padding:0!important;
                margin:0!important;
            }
        }
        @page {
            margin: 2cm;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
        }

        input.form-control,
        textarea.form-control {
            margin-bottom: 10px;
        }

        .rounded-btn {
            border-radius: 50%;
            padding: 10px 20px; /* Adjust padding as needed */
            background-color: #3498db; /* Change the background color */
            color: #fff; /* Change the text color */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .rounded-btn:hover {
            background-color: #2980b9; /* Change the background color on hover */
        }
    </style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<form method="POST">


    <header>
        <img style="height: 62px;" src="VULCANTECHS-logo.png">
        <h1>INVOICE SYSTEM</h1>
    </header>
    <div class="row ">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"></div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ms-5">
            <table border="0px" class="m-3" style="font-weight:bold;font-size:20px;">
                <tr>
                    <td>Client Name</td>
                    <td>:</td>
                    <td><input class="form-control" type="text" name="cname" id="cname" value=""></td>
                </tr><br><br>
                <tr>
                    <td>Project Name</td>
                    <td>:</td>
                    <td><input class="form-control" type="text" name="pname" id="pname" value=""></td>
                </tr>
                <tr>
                    <td>Unit Price</td>
                    <td>:</td>
                    <td><input class="form-control" type="number" name="up" id="up" value=""></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>:</td>
                    <td><input class="form-control" type="tel" name="qty" id="qty" value=""></td>
                </tr>
            </table> 
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ms-5"><br><br>
            <table border="0px" class="m-3" style="font-weight:bold;font-size:20px;">
                <tr>
                    <td>Invoice date</td>
                    <td>:</td>
                    <td><input class="form-control" type="date" name="ad" id="ad" value=""></td>
                </tr>
                <tr>
                    <td>Due date</td>
                    <td>:</td>
                    <td><input class="form-control" type="date" name="dd" id="dd" value=""></td>
                </tr>
                <tr>
                    <td>Adress</td>
                    <td>:</td>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" type="text" name="lb" id="lb" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" type="text" name="note" id="note" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        </div>
                    </td>
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
          </table>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ms-5"></div>
      </div>
<div class="row">
  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"></div>
  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
    <nav class="navbar navbar-light" >
        <div class="d-flex" role="search">
          <!-- <input class="form-control ms-5 me-2" type="search" name="s1" id="s1" placeholder="Search" aria-label="Search">  -->
          <!-- <button class="btn btn-outline-success" type="submit" name="search" id="search">Search</button> -->
          <button style="top: -76px; position: relative; left: 640px;" onclick="capture()" class="ms-5 rounded-btn" type="button">Download</button>
        </div>
    </nav>
  </div>
  <!-- <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
    <button class="btn btn-secondary rounded-circle mt-2 ms-4" name="next" id="next" type="submit">>></button>
  </div> -->
</div>

<div id="mini">
    <table border="5px" width="100%"class="table table-hover" style="position: relative;top: 140px">
<tr>    
    <th>S.no</th>
    <th>Name</th>
    <th>Project Name</th>
    <th>Unit Price</th>
    <th>Quantity</th>
    <th>Invoice Date</th>
    <th> Due Date</th>
    <th>Adress</th>
    <th>Description</th>
    
     </tr>


     <?php
        $qry=mysqli_query($conn, "SELECT * from invoicetable where in_status='1'")or die(mysqli_error($conn));
        while($res=mysqli_fetch_object($qry)){
    ?>

<tr>
<td><?php echo $in_id;?></td>   
<td><?php echo $res->client_name; ?></td>
    <td><?php echo $res->project_name; ?></td>
    <td><?php echo $res->ac_date; ?></td>
    <td><?php echo $res->due_date; ?></td>
    <td><?php echo $res->qty; ?></td>
    <td><?php echo $res->unitprice; ?></td>
    <td><?php echo $res->in_lb; ?></td>
    <td><?php echo $res->note; ?></td>
    <td><button onclick="invoiceupdate('<?php echo $res->client_name;?>','<?php echo $res-> project_name;?>','<?php echo $res->ac_date;?>','<?php echo $res-> due_date;?>','<?php echo $res-> in_type;?>','<?php echo $res->qty;?>','<?php echo $res-> unitprice;?>','<?php echo $res->in_lb;?>','<?php echo $res-> note;?>')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
  UPDATE
</button></td>
</tr>

<?php
    }
?>

</table>  
<!-- Add this script at the end of your HTML body -->
<!-- ... (your existing HTML code) ... -->

<!-- Add this script at the end of your HTML body -->
<script>
    function invoiceupdate(client_name, project_name, ac_date, due_date, in_type, qty, unitprice, in_lb, note) {
        // Set values to the input fields
        document.getElementById('cname').value = client_name;
        document.getElementById('pname').value = project_name;
        document.getElementById('up').value = unitprice;
        document.getElementById('qty').value = qty;
        document.getElementById('ad').value = ac_date;
        document.getElementById('dd').value = due_date;
        document.getElementById('lb').value = in_lb;
        document.getElementById('note').value = note;

        // Open the modal (assuming you are using Bootstrap modal)
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show();
    }
</script>

<!-- ... (your existing HTML code) ... -->








    </div>



</body>
</html>
