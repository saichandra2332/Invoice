<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400;6..12,500;6..12,600;6..12,700&display=swap" rel="stylesheet">
    <title>A4 Size Sheet</title>
    <style>
         #invoiceBill {
            width: 21cm;
            height: 28.7cm;
            margin: 0px auto; 
            font-family: Arial, sans-serif;
            border: black 1px solid;
            font-family: 'Nunito Sans', sans-serif;
            font-weight: 600;
        }
        li{
            list-style-type: none;
        }
        ul{
            padding: 0px;
            margin: 0px;
        }
        table tr td, tr th{
            border:2px solid black;
        }
        tr td{
            padding-bottom:80px;
        }
        tr th{
            padding:10px 0px;
        }
        .font{
            font-size:14px;
        }
    </style>
</head>
<body>
    <div class="mt-5 mx-auto d-flex align-items-center justify-content-between w-50 mb-2">
        <div>
            <input class="btn" style="background-color:#243A85CC; color:white;" type="submit" value="BACK" name="back" id="back">            
        </div>
        <div>
            <input class="btn" style="background-color:#68AE4A;color:white;" type="submit" value="DOWLOAD" name="print" id="print">
        </div>
    </div>
    <div id="invoiceBill">
        <div class="container-fluid pt-5 px-5">
            <div class="row mb-3">
                <div class="text-center"><h1 style="font-weight:bold; color:;">INVOICE</h1></div>
            </div>
            <div class="row mb-4">
                <div col="12" class="d-flex justify-content-end">
                    <img src="./images/WhatsApp_Image_2024-01-02_at_1.06.38_PM-removebg-preview.png" width="200px" alt="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <ul>
                        <li style="font-weight:bold;" class="pb-1">From:</li>
                        <?php
                        $bill_id = isset($_GET['bill_id']) ? $_GET['bill_id'] : '';
                        $query = mysqli_query($conn, "SELECT * FROM invoice_bills WHERE bill_id = '$bill_id'");
                        $data = mysqli_fetch_assoc($query);?>
                        <li style="width: 60%;"><?php echo $data['from_address'];?></li>
                    </ul>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <ul>
                        <li style="font-weight:bold;" class="pb-1">Bill To:</li>
                        <li style="width: 60%;"><?php echo $data['to_address'];?></li>
                        
                    </ul>
                </div>
                <div class="col-6 text-end">
                    <ul>
                        <li class="pb-2"><span style="font-weight:bold;">Invoice No :</span> <?php echo $data['invoice_no'];?></li>
                    </ul>
                    <ul>
                        <li class="pb-2"><span style="font-weight:bold;">Invoice Type :</span> <?php echo $data['invoice_type'];?></li>
                    </ul>
                    <ul >
                        <li class="pb-2"><span style="font-weight:bold;">Date :</span> <?php echo $data['date'];?></li>
                    </ul>
                    <ul >
                        <li class="pb-2"><span style="font-weight:bold;">Due Date :</span> <?php echo $data['due_date'];?></li>
                    </ul>         
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 d-flex align-items-center">
                    <table class="text-center" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Project Name</th>
                                <th>Item</th>
                                <th>Unit</th>
                                <th>Unit Price</th>
                                <th>Total Amount</th>
                                <th class="printNone">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td id="projectName"><?php echo $data['project_name'];?></td>
                                <td id="itemName"><?php echo $data['item'];?></td>
                                <td id="quantity"><?php echo $data['quantity'];?></td>
                                <td id="amount"><?php echo $data['amount'];?></td>
                                <td id="totalAmount"><?php echo $data['amount'];?></td>
                               
                                <td class="printNone">
                                    <div class="btn-group">
                                        <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                            <a class="dropdown-item" onclick="updateFunction(<?php echo $data['bill_id']; ?>)">
                                                <i class="far fa-edit"></i> Edit
                                            </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-5 pb-5 d-flex justify-content-end">
                <div class="col-3 text-end">
                    <div class="font">Total Amount</div>
                    <div class="font">GST 18%</div>
                    <div style="font-weight:bold; font-size:18px">Grand Total</div>
                </div>
                <div class="col-1 text-center">
                    <div class="font">:</div>
                    <div class="font">:</div>
                    <div style="font-weight:bold; font-size:18px">:</div>
                </div>
                <div class="col-2 text-start">
                    <div class="font" id="totalAmount2"><?php echo $data['amount'];?></div>
                    <div class="font" id="gst"><?php echo $data['gst'];?></div>
                    <div style="font-weight:bold; font-size:18px" id="grandTotal"><?php echo $data['grand_total'];?></div>
                </div>
            </div>
            <div class="row pb-5 mb-5">
                <div>
                    <?php if ($data['add_note'] != '') { ?>
                        <span style="font-weight:bold;" class="pe-2">Note :</span>
                        <span><?php echo $data['add_note']; ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-end">
                    <span style="font-weight:bold;">SIGNATURE</span>
                </div>
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
                                                <input type="number" class="form-control py-2" id="projectIdModal" name="projectIdModal">
                                                <div class="col-6">
                                                    <label for="projectNameModal" class="form-label">Project Name</label>
                                                    <input type="text" class="form-control py-2" id="projectNameModal" name="projectNameModal">
                                                </div>
                                                <div class="col-6">
                                                    <label for="itemNameModal" class="form-label">Project Name</label>
                                                    <input type="text" class="form-control py-2" id="itemNameModal" name="itemNameModal">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="quantityModal" class="form-label">Unit</label>
                                                    <input type="text" oninput="validateQuantity(this)" class="form-control py-2" id="quantityModal" name="quantityModal">
                                                </div>
                                                <div class="col-6">
                                                    <label for="amountModal" class="form-label">Unit Price</label>
                                                    <input type="number" class="form-control py-2" id="amountModal" name="amountModal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-bs-dismiss="modal">CANCEL</button>
                                            <button type="button" class="btn px-5" style="background-color: #243A85CC; color: white;" data-bs-dismiss="modal" id="updateBill">UPDATE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- MODAL END  -->
        <!--  -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html2pdf.js@0.10.0/dist/html2pdf.bundle.js"></script>
    

    <script>
        function updateFunction(bill_id) {
            var itemName = $('#itemName').text();
            var quantity = $('#quantity').text();
            var amount = $('#amount').text();
            var projectName = $('#projectName').text();

            $('#projectIdModal').val(bill_id);
            $('#projectNameModal').val(projectName);
            $('#itemNameModal').val(itemName);
            $('#quantityModal').val(quantity);
            $('#amountModal').val(amount);
            $('#updateModal').modal('show');
        }
        $(document).ready(function(){
            $('#updateBill').click(function () {
                var updatedProjectName = $('#projectNameModal').val();
                var updatedItemName = $('#itemNameModal').val();
                var updatedQuantity = $('#quantityModal').val();
                var updatedAmount = $('#amountModal').val();
                var bill_id = $('#projectIdModal').val();

                var unit = parseFloat(updatedQuantity);
                var unitPrice = parseFloat(updatedAmount);

                var totalAmount = unit*unitPrice;

                var gst = (18/100) * totalAmount;
                var grandTotal = gst + totalAmount;

                $('#itemName').text(updatedItemName);
                $('#projectName').text(updatedProjectName);
                $('#quantity').text(updatedQuantity);
                $('#amount').text(updatedAmount);
                $('#totalAmount').text(totalAmount);
                $('#totalAmount2').text(totalAmount);
                $('#gst').text(gst);
                $('#grandTotal').text(grandTotal);
                
                var formData = {
                    bill_id : bill_id,
                    unit : unit,
                    unitPrice : unitPrice,
                    gst : gst,
                    grandTotal : grandTotal,
                };

                $.ajax({
                    url: 'data_update.php', 
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                })
            });

            $('#print').click(function () {
                var clonedContent = $('#invoiceBill').clone();

                clonedContent.css({
                    'border' : 'none',
                    'padding': '0px',
                    'margin': '0px',
                });
                clonedContent.find('table th.printNone, table td.printNone').css('display', 'none');
                clonedContent.find('.container').removeClass('px-5');

                clonedContent.find('.col-6 li[style="width: 60%;"]').css('width', '78%');

                var options = {
                    margin: 0,
                    filename: 'downloaded-pdf.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                };

                html2pdf(clonedContent[0], options);

            });

            $('#back').click(function(){
                window.location.href = 'invoice.php';
            })
        })

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