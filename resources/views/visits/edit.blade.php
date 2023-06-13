<?php
    require_once '../api/config/database.php';
    require_once '../api/objects/officer.php';

    if (!empty($_GET['visit_unique_id'])) {
        $database = new Database();
        $db = $database->getConnection();
    
        // initialize object
        $officer = new Officer($db);

        $officer->visit_unique_id = $_GET['visit_unique_id'];

        $visit = $officer->readvisit();

        if ($visit->rowCount() > 0) {
            while ($row = $visit->fetch(PDO::FETCH_ASSOC)) {
                $unique_id = $row['unique_id'];
                $entry_type = $row['entry_type'];
                $opd_number_ = $row['opd_number'];
                $nhis_status = $row['nhis_status'];
                $nhis_number = $row['nhis_number'];
            }
        }
    
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Health Records | Olympian Developers</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <script src="../dist/js/jquery-3.4.1.min"></script>
    <script src="../dist/js/jquery-3.2.1.min"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>O</b>Dev</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Health</b>Records</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li>
                        <a href="../index.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="visits.php">
                            <i class="fa fa-heartbeat"></i>
                            <span>Visits</span>
                        </a>
                    </li>
                    <li>
                        <a href="patients.php">
                            <i class="fa fa-users"></i>
                            <span>Patients</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i>
                            <span>Reports</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="reports_soo.php"><i class="fa fa-circle"></i> Statement of Outptients</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Visits
                    <small>edit visit</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="visits.php"><i class="fa fa-heartbeat"></i> Visits</a></li>
                    <li class="active">Edit Visit</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- SELECT2 EXAMPLE -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Visit</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" id="visit_form" enctype="multipart/form-data">
                        <?php
                            echo '<input id="unique_id" name="unique_id" type="number" value="'.$unique_id.'" hidden/>';
                        ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Entry type</label>
                                        <select id="entry_type" name="entry_type" class="form-control select2" style="width: 100%;">
                                            <option value="">Select an entry type</option>
                                            <?php
                                                if ($entry_type == 'new') {
                                                    echo '
                                                        <option value="new" selected="selected">New</option>
                                                        <option value="old">Old</option>';
                                                } elseif ($entry_type == 'old') {
                                                    echo '
                                                        <option value="new">New</option>
                                                        <option value="old" selected="selected">Old</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>OPD Number</label>
                                        <select id="opd_number" name="opd_number" class="form-control select2" style="width: 100%;">
                                            <?php
                                                $patients = $officer->readPatients();

                                                if ($patients->rowCount() > 0) {
                                                    echo '<option value="">Select an OPD Number</option>';

                                                    while ($row = $patients->fetch(PDO::FETCH_ASSOC)) {
                                                        extract($row);

                                                        if ($opd_number == $opd_number_) {
                                                            echo '<option value="'.$opd_number.'" selected="selected">'.$opd_number.'</option>';
                                                        } else{
                                                            echo '<option value="'.$opd_number.'">'.$opd_number.'</option>';
                                                        }

                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NHIS Status</label>
                                        <select id="nhis_status" name="nhis_status" class="form-control select2" style="width: 100%;" onclick="javascript:yesnoCheck();">
                                            <option value="" selected="selected">Select an NHIS status</option>
                                            <?php
                                                if ($nhis_status == 'yes') {
                                                    echo '
                                                        <option value="yes" selected="selected">Insured</option>
                                                        <option value="no">Not Insured</option>';
                                                } elseif ($nhis_status == 'no') {
                                                    echo '
                                                        <option value="yes">Insured</option>
                                                        <option value="no" selected="selected">Not Insured</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div id="nhis_number_div" class="form-group">
                                        <label>NHIS Number</label>
                                        <?php
                                            echo '<input id="nhis_number" name="nhis_number" type="number" value="'.$nhis_number.'" maxlength="8" class="form-control" style="width: 100%;"/>';
                                        ?>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->        
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input id="submit" name="submit" type="submit" value="SUBMIT" class="btn btn-block btn-primary pull-right" style="width: 90px;"/>
                        </div>
                    </form>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="../developer/" target="_blank">Olympian Developers</a>.</strong> All rights reserved.
        </footer>


        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript" src="../dist/js/script.js"></script>
    <script src="../dist/js/jquery-3.4.1.min"></script>
    <script src="../dist/js/jquery-3.2.1.min"></script>
    <!-- jQuery 2.2.3 -->
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../plugins/select2/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2();

        });
    </script>

    <script type="text/javascript">
        window.onload = function() {
            if (document.getElementById('nhis_number').value == 'yes') {
                document.getElementById('nhis_number_div').style.display = 'block';
            }
        }

        function toggleNhisNumberDiv() {
            var form = this.form, status = form.elements.nhis_status;
            
            document.getElementById('nhis_number_div').style.display = 'none';

            if (status.value == 'yes') {
                document.getElementById('nhis_number_div').style.display = 'block';
            } else {
                document.getElementById('nhis_number').value = " ";
            }
        }

        var form = document.getElementById('visit_form');
        form.elements.nhis_status.onchange = toggleNhisNumberDiv;
        form.elements.nhis_status.onchange();
    </script>

    <script>
        $(document).ready(function(e){
            // Submit form data via Ajax
            $("#visit_form").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../api/officer/visit_edit.php',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        $('#visit_form').css("opacity",".5");

                        $('#entry_type').attr("disabled","disabled");
                        $('#opd_number').attr("disabled","disabled");
                        $('#nhis_status').attr("disabled","disabled");
                        $('#nhis_number').attr("disabled","disabled");

                    },
                    success: function(response){ //console.log(response);
                        if (response.error == "alpha") {
                            // successful
                            alert(response.message);

                            $('#entry_type').val('');
                            $('#opd_number').val('');
                            $('#nhis_status').val('');
                            $('#nhis_number').val('');
                        } else if (response.error == "beta") {
                            // unsuccessful;
                            alert(response.code + ": " + response.message);
                        } else if (response.error == "gamma") {
                            // db error
                            alert(response.code + ": " + response.message);
                        } else if (response.error == "delta") {
                            // db error
                            alert(response.code + ": " + response.message);
                        }

                        $('#entry_type').removeAttr("disabled");
                        $('#opd_number').removeAttr("disabled");
                        $('#nhis_status').removeAttr("disabled");
                        $('#nhis_number').removeAttr("disabled");

                        $('#reset').removeAttr("disabled");
                        $('#submit').removeAttr("disabled");

                        $('#visit_form').css("opacity","");
         
                    },
                    error: function(xhr, status, error){ //console.log(response);
                        //$('.statusMsg').html('');
                        alert(xhr.responseText);

                        $('#entry_type').removeAttr("disabled");
                        $('#opd_number').removeAttr("disabled");
                        $('#nhis_status').removeAttr("disabled");
                        $('#nhis_number').removeAttr("disabled");

                        $('#reset').removeAttr("disabled");
                        $('#submit').removeAttr("disabled");

                        $('#visit_form').css("opacity","");
          
                    }
                });
            });
        });
    </script>
</body>

</html>