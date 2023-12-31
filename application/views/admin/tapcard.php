<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attendance</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="container-fluid bg-dark d-flex justify-content-between align-items-center p-2 px-5">
    <a href="<?= base_url(); ?>assets/dashboard.html">
        <img src="<?= base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8; width: 26px;">
    </a>
    <h3>DTR SYSTEM</h3>
    <a href="<?= base_url(); ?>assets/login.html" class="btn btn-primary">Sign In</a>
</div>
<div class="container-fluid row p-3">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row p-3">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center" id="headcard">TAP YOUR CARD</h4>
                            <input type="text" class="form-control p-3 mb-3" id="focus">
                            <div class="card bg-secondary text-center d-flex align-items-center justify-content-center" style="width: 100%; height: 250px;">
                                <i class="fa fa-user" aria-hidden="true" class="h-100 w-100" style="font-size: 120px;"></i>
                            </div>
                            <div id="errorr" class="text-capitalize">
                                <h6><strong>Name: </strong><span id="name"></span></h6>
                                <h6><strong>RFID: </strong><span id="rfid"></span></h6>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                  <div class="card">               
                      <div class="card-body text-dark">
                          <div class="card text-center bg-info p-3">
                            <h1 id="time"></h1>
                            <h3 id="date"></h3>
                          </div>
                          <hr class="hr">
                      <table id="example" class="table table-bordered table-striped table-hover">
                          <thead>
                              <tr>
                                <th>No.</th>
                                  <th>Employee Name</th>
                                  <th>Morning In</th>
                                  <th> Morning Out</th>
                                  <th>Afternoon In</th>
                                  <th> Afternoon Out</th>
                                  <th>Log Date</th>
                              </tr>
                          </thead>
                          <tbody id="tbody">
                          <?php 
                        if(isset($attendance)):
                            $i=1;
                        foreach($attendance as $cnt): 
                    ?>
                    <tr class="text-capitalize">
                        <td><?= $i; ?></td>
                        <td><?= $cnt['fullname']; ?></td>
                        <td><?php if($cnt['morning_in'] != NULL){ 
                          echo date('h:i A', strtotime($cnt['morning_in']));
                        } ?></td>
                        <td><?php if($cnt['morning_out'] != NULL){ 
                          echo date('h:i A', strtotime($cnt['morning_out']));
                        } ?></td>
                        <td><?php if($cnt['afternoon_in'] != NULL){ 
                          echo date('h:i A', strtotime($cnt['afternoon_in']));
                        } ?></td>
                        <td><?php if($cnt['afternoon_out'] != NULL){ 
                          echo date('h:i A', strtotime($cnt['afternoon_out']));
                        } ?></td>
                        <td><?= $cnt['log_date']; ?></td>
                    </tr>
                    <?php 
                    $i++;
                      endforeach;
                      endif; 
                    ?> 
                          </tbody>
                      </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
    </div>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
   } );

   function successToast(){
    let notif = JSON.parse(localStorage.getItem('Notif'));
    if(notif != null){
      Command: toastr[notif.response](notif.message)
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        localStorage.clear();
    }
   }
   setInterval(successToast, 100);

  function errorToast(message){
    Command: toastr["error"](message)
      toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
      }
  }
function updateDateTime() {
    const now = new Date();
    const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = now.toLocaleDateString(undefined, optionsDate);
    document.getElementById('date').textContent = formattedDate;
    const optionsTime = { hour: '2-digit', minute: '2-digit', second: '2-digit'};
    const formattedTime = now.toLocaleTimeString(undefined, optionsTime);
    document.getElementById('time').textContent = formattedTime;
}
updateDateTime();
setInterval(updateDateTime, 1000);

const inputField = document.getElementById('focus');
const name = document.getElementById('name');
const rfid = document.getElementById('rfid');
inputField.focus();

inputField.addEventListener('input', () => {
    if (inputField.value.trim() !== '') {
        const id = inputField.value;
        inputField.disabled = true;
        $.ajax({
        url: "<?php echo base_url(); ?>insert-attendance",
        type: "post",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data) {
            if (data.response == "success") {
                document.getElementById('headcard').innerHTML = "WELCOME";
                inputField.disabled = true;
                name.innerHTML = data.fullname;
                rfid.innerHTML = data.rfid;
                inputField.value = data.rfid;
                setTimeout(() => {
                inputField.disabled = false;
                inputField.focus();
                window.location.reload();
            }, 1000); 
            } else {
                document.getElementById('headcard').innerHTML = "RFID NOT REGISTERED"; //data.errrorrrr lagyan mo 
                setTimeout(() => {
                inputField.value = '';
                inputField.disabled = false;
                inputField.focus();
                document.getElementById('headcard').innerHTML = "TAP YOUR CARD";
                }, 2000); 
              errorToast(data.message);
            }
        }
    });
    }
});

// function tapToast(){
//     let tapcard = JSON.parse(localStorage.getItem('Tapcard'));
//     localStorage.clear();
//     if(tapcard != null){
//                 inputField.disabled = true;
//                 name.innerHTML = tapcard.fullname;
//                 rfid.innerHTML = tapcard.rfid;
//                 inputField.value = tapcard.rfid;
//                 setTimeout(() => {
//                 name.innerHTML = '';
//                 rfid.innerHTML = '';
//                 inputField.disabled = false;
//                 inputField.value = '';
//                 inputField.focus();
//             }, 1000); 
//       Command: toastr[tapcard.response](tapcard.message)
//         toastr.options = {
//             "closeButton": false,
//             "debug": false,
//             "newestOnTop": false,
//             "progressBar": false,
//             "positionClass": "toast-top-right",
//             "preventDuplicates": false,
//             "onclick": null,
//             "showDuration": "300",
//             "hideDuration": "1000",
//             "timeOut": "5000",
//             "extendedTimeOut": "1000",
//             "showEasing": "swing",
//             "hideEasing": "linear",
//             "showMethod": "fadeIn",
//             "hideMethod": "fadeOut"
//         }
//         localStorage.clear();
//     }
//    }
//    setInterval(tapToast, 500);

// function fetch() {
//     $.ajax({
//         url: "<?php echo base_url(); ?>fetch",
//         type: "get",
//         dataType: "json",
//         success: function(data) {
//             var i = 1;
//             var tbody = "";
//             for (var key in data) {  
//                 alert(data[key]['morning_out'] != NULL ? data[key]['morning_out'] : "")             
//                 // var mornings = data[key]['morning_out'] != NULL ? data[key]['morning_out'] : "";
//                 // alert('dfgdfdgdf')
//                 tbody += "<tr>";
//                 tbody += "<td>" + i++ + "</td>";
//                 tbody += "<td>" + data[key]['fullname'] + "</td>";
//                 tbody += "<td>" + data[key]['morning_in'] + "</td>";
//                 tbody += "<td>" + data[key]['morning_out'] + "</td>";
//                 tbody += "<td>" + data[key]['log_date'] + "</td>";
//                 tbody += "<tr>";
//             }
//             $("#tbody").html(tbody);
//         }
//     });
// }
// fetch();
</script>
</body>
</html>