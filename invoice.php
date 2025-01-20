<?php
    require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400;6..12,500;6..12,600;6..12,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <title>Invoice</title>
</head>
<style>
    h4{
        font-family: 'Nunito Sans', sans-serif;
        font-weight: 700;
        font-size:19px;
    }
    .card-body .card-body,.card-body table thead tr,.card-body table tbody tr,.form-control,.btn{
        font-family: 'Nunito Sans', sans-serif;
        font-weight: 400;
        font-size: 14px;
    }
    label{
        padding-top:20px;
        padding-bottom:10px;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar">
                <div>
                    <a class="navbar-brand" href="invoice.html">
                    <img src="./images/WhatsApp_Image_2024-01-02_at_1.06.38_PM-removebg-preview.png" width="200" class="d-inline-block align-top" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="me-1" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <iconify-icon icon="mingcute:user-4-fill" style="color:#000000" width="30"></iconify-icon>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li>
                    <a class="dropdown-item" href="index.php">Logout</a>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="card shadow bg-white rounded">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header pt-3" style="border:none;">
                                <h4>Invoice</h4>
                            </div>
                            <div class="card-body">
                                <form id="invoiceForm" method='POST'>
                                    <div class="form-group d-none">
                                        <label for="invoiceId">Invoice Id</label>
                                        <input type="number" class="form-control" name="invoiceId" id="invoiceId">
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="form-group col-md-3">
                                            <label for="clientName">Client Name<span class="text-danger">*</span></label>
                                            <select class="form-control form-select" name="clientName" id="clientName">
                                                <option value="">Select Client</option>
                                                <?php
                                                    $c_names = mysqli_query($conn,"SELECT * from cilents WHERE status = '1'") or die(mysqli_error($conn));
                                                    while ($client_name = mysqli_fetch_object($c_names)){
                                                ?>
                                                <option value="<?php echo $client_name->cilent_name ?>" > <?php echo $client_name->cilent_name ?></option>
                                                <?php } ?>                                                
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="invoiceNumber">Invoice Number<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" readOnly name="invoiceNumber" id="invoiceNumber">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="invoiceDate">Invoice Date<span class="text-danger">*</span></label>
                                            <?php
                                            $currentDate = date("Y-m-d");
                                            ?>
                                            <input type="date" class="form-control" name="invoiceDate" id="invoiceDate" value="<?php echo $currentDate; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="dueDate">Due Date<span class="text-danger">*</span></label>
                                            <?php
                                            $currentDate = date("Y-m-d");
                                            ?>
                                            <input type="date" class="form-control" name="dueDate" id="dueDate" value="<?php echo $currentDate; ?>">
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="form-group col-md-3">
                                            <label for="invoiceType">Invoice Type<span class="text-danger">*</span></label>
                                            <select class="form-control" name="invoiceType" id="invoiceType">
                                                <option value="">Select Invoice Type</option>
                                                <option value="Standard">Standard</option>
                                                <option value="Proforma">Proforma</option>
                                                <option value="Recurring">Recurring</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="projectName">Project Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="projectName" id="projectName">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="itemName">Item Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="itemName" id="itemName">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="totalAmount">Total Amount<span class="text-danger">*</span></label>
                                            <input type="text" pattern="[0-9]+" title="Please Enter Numeric Values" class="form-control" name="totalAmount" id="totalAmount">
                                        </div>
                                    </div>
                                    <div class="row align-items-center ">
                                        <div class="form-group col-md-6">
                                            <label for="billingAddress">Billing Address<span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="4" name="billingAddress" id="billingAddress"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cilentAddress">Cilent Address<span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="4" name="cilentAddress" id="cilentAddress"></textarea>
                                        </div>    
                                    </div>
                                    <div class="form-group">
                                        <label for="note" class="pb-0">Additional Note</label>
                                        <input type="text" class="form-control" name="note" id="note">
                                    </div> 
                                    <div class="form-group text-center mt-4">
                                        <input class="btn" style="background-color:#243A85CC; color:white;" type="submit" value="SUBMIT" name="formSubmit" id="formSubmit">
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow bg-white rounded">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header pt-3" style="border:none;">
                                <h4>Invoice List</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped text-center" id="invoiceTable">
                                        <thead  class="card-body table-responsive">
                                            <tr>
                                                <th>Id</th>
                                                <th>Cilent Name</th>
                                                <th>Invoice No.</th>
                                                <th>Invoice Type</th>
                                                <th>Project Name</th>
                                                <th>Item Name</th>
                                                <th>Amount</th>
                                                <th>Invoice Date</th>
                                                <th>Due Date</th>
                                                <th>Billing Address</th>
                                                <th>Cilent Address</th> 
                                                <th>Action</th>                                                
                                            </tr>                                 
                                        </thead>
                                        <tbody class="card-body table-responsive"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


    <script>
        function updateFunction(invoiceId) {
            $.ajax({
                url: 'fetch_data.php',
                type: 'GET',
                data: { 'invoiceId': invoiceId, 'work': 1 },
                dataType: 'json',
                success: function (data) {
                    fetchData();

                    $('body, html').animate({
                        scrollTop: 0
                    }, 100);

                    $('#invoiceId').val(data.bill_id);
                    $('#clientName').val(data.client_name);
                    $('#invoiceNumber').val(data.invoice_no);
                    $('#invoiceDate').val(data.date);
                    $('#dueDate').val(data.due_date);
                    $('#invoiceType').val(data.invoice_type);
                    $('#projectName').val(data.project_name);
                    $('#itemName').val(data.item);
                    $('#totalAmount').val(data.amount);
                    $('#billingAddress').val(data.from_address);
                    $('#cilentAddress').val(data.to_address);
                    $('#note').val(data.add_note);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }
        function deleteFunction(invoiceId) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: 'delete_data.php', 
                        type: 'GET',
                        data: { 'invoiceId': invoiceId},
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            fetchData();
                        },
                        error: function (error) {
                            console.error('Error:', error);
                        }
                    });
                    swal("Poof! Your Record has been deleted!", {
                    icon: "success",
                    });
                } else {
                    swal("Your Record is safe!");
                }
            });            
        }

        function fetchData(){
                $.ajax({
                    url: 'fetch_data.php',
                    type: 'GET',
                    data: {'work': 1 },
                    dataType: 'json',
                    success: function (data) {    
                        console.log(data);
                        var defaultBillingAddress = "Vulcan Techs \n9-39-3/1,Pithapuram Colony,\nMaddilapalem, Visakhapatnam,\nAndhra Pradesh 530003";
                        $('#billingAddress').val(defaultBillingAddress); 

                        var dataTable = $('#invoiceTable').DataTable();
                        dataTable.clear().destroy();

                        var count = 1;
                    $.each(data, function (index, bill) {

                        var dropdown = '<div class="btn-group"><button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button><ul class="dropdown-menu"><li><a class="dropdown-item" onclick="updateFunction('+bill.bill_id+')"><i class="far fa-edit" ></i> Update</a></li><li><a class="dropdown-item delete-item has-icon" onclick="deleteFunction('+bill.bill_id+')"><i class="far fa-trash-alt"></i> Delete</a></li></ul></div>';


                        

                        $('#invoiceTable tbody').append(
                        '<tr data-billid="' + bill.bill_id + '">' +
                        '<td>' + count + '</td>' +  
                        '<td>' + bill.client_name + '</td>' +
                        '<td>' + bill.invoice_no + '</td>' +
                        '<td>' + bill.invoice_type + '</td>' +
                        '<td>' + bill.project_name + '</td>' +
                        '<td>' + bill.item + '</td>' +
                        '<td>' + bill.amount + '</td>' +
                        '<td>' + bill.date + '</td>' +
                        '<td>' + bill.due_date + '</td>' +
                        '<td>' + bill.from_address + '</td>' +
                        '<td>' + bill.to_address + '</td>' +
                        '<td class="dropdown-container">' + dropdown + '</td>' +
                        '</tr>'
                        );
                        count+=1;
                    });
                    dataTable = $('#invoiceTable').DataTable();

                    $('#invoiceTable tbody').on('click', 'tr', function () {
                        var clickedBillId = $(this).data('billid');
                        window.location.href = 'A4rececipt.php?bill_id=' + clickedBillId;
                    });
                    $('#invoiceTable tbody').on('click', 'tr .dropdown-container', function (event) {
                        event.stopPropagation();
                    });
                    },
                    error: function (error) {
                    console.error('Error:', error);
                    }

                });
            };
        $(document).ready(function(){
            var defaultBillingAddress = "Vulcan Techs \n9-39-3/1,Pithapuram Colony,\nMaddilapalem, Visakhapatnam,\nAndhra Pradesh 530003";
            $('#billingAddress').val(defaultBillingAddress);

            $('#clientName').change(function() {
                var clientId = $(this).val();

                $.ajax({
                    url: 'invoice_id.php', 
                    type: 'POST',
                    data: { clientId: clientId },
                    dataType: 'json',
                    success: function(response) {
                        $('#invoiceNumber').val(response.invoiceId);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });

            $('#invoiceForm').submit(function (event) {
            
                var formData = new FormData($('#invoiceForm')[0]);
                formData.append('work', 1);
                console.log(formData);

                $.ajax({
                    url: 'insert_data.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if(response == 1){
                            swal("Good job!", "Upated Successfully!", "success");
                            $("#invoiceForm")[0].reset();                        
                        }else if (response == 2){
                            swal("Error!", "Enter All Details!", "info");
                        }else if (response == 3){
                            swal("Good job!", "Inserted Successfully!", "success");
                            $("#invoiceForm")[0].reset();
                        }
                        else if (response == 4){
                            swal("Error!", "Enter All Details!!", "info");
                        }else if (response == 5){
                            swal("Error!", "Invoice Date Must be Today's Date!", "error");
                        }else if (response == 6){
                            swal("Error!", "Invoice Date Error. Today is Hoilday!", "error");
                        }else if (response == 7){
                            swal("Error!", "Due Date Must Be After Invoice Date!", "error");
                        }else if (response == 8){
                            swal("Error!", "Due Date Must Be within next 30 Days of Invoice Date!", "error");
                        }else if (response == 9){
                            swal("Error!", "Due Date Error!", "error");
                        }else if (response == 10){
                            swal("Error!", "Amount Must Be Less Then 2Lakhs!", "error");
                        }
                        
                        fetchData();
                        
                        
                    },
                    error: function (error) {
                    console.error('Error:', error);
                    }
                });
                event.preventDefault();
                        
            });

            function fetchData(){
                $.ajax({
                    url: 'fetch_data.php',
                    type: 'GET',
                    data: {'work': 1 },
                    dataType: 'json',
                    success: function (data) {    
                        console.log(data); 
                        var defaultBillingAddress = "Vulcan Techs \n9-39-3/1,Pithapuram Colony,\nMaddilapalem, Visakhapatnam,\nAndhra Pradesh 530003";
                        $('#billingAddress').val(defaultBillingAddress);

                        var dataTable = $('#invoiceTable').DataTable();
                        dataTable.clear().destroy();

                        var count = 1;
                    $.each(data, function (index, bill) {

                        var dropdown = '<div class="btn-group"><button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button><ul class="dropdown-menu"><li><a class="dropdown-item" onclick="updateFunction('+bill.bill_id+')"><i class="far fa-edit" ></i> Update</a></li><li><a class="dropdown-item delete-item has-icon" onclick="deleteFunction('+bill.bill_id+')"><i class="far fa-trash-alt"></i> Delete</a></li></ul></div>';


                        

                        $('#invoiceTable tbody').append(
                        '<tr data-billid="' + bill.bill_id + '">' +
                        '<td>' + count + '</td>' +  
                        '<td>' + bill.client_name + '</td>' +
                        '<td>' + bill.invoice_no + '</td>' +
                        '<td>' + bill.invoice_type + '</td>' +
                        '<td>' + bill.project_name + '</td>' +
                        '<td>' + bill.item + '</td>' +
                        '<td>' + bill.amount + '</td>' +
                        '<td>' + bill.date + '</td>' +
                        '<td>' + bill.due_date + '</td>' +
                        '<td>' + bill.from_address + '</td>' +
                        '<td>' + bill.to_address + '</td>' +
                        '<td class="dropdown-container">' + dropdown + '</td>' +
                        '</tr>'
                        );
                        count+=1;
                    });
                    dataTable = $('#invoiceTable').DataTable();

                    $('#invoiceTable tbody').on('click', 'tr', function () {
                        var clickedBillId = $(this).data('billid');
                        window.location.href = 'A4rececipt.php?bill_id=' + clickedBillId;
                    });
                    $('#invoiceTable tbody').on('click', 'tr .dropdown-container', function (event) {
                        event.stopPropagation();
                    });
                    },
                    error: function (error) {
                    console.error('Error:', error);
                    }

                });
            };
        fetchData();

            
            
        });
    </script>

</body>
</html>