<?php
    require_once '../api/config/database.php';
    require_once '../api/objects/officer.php';

    if (!empty($_GET['opd_number'])) {
        $database = new Database();
        $db = $database->getConnection();
    
        // initialize object
        $officer = new Officer($db);

        $officer->patient_opd_number = $_GET['opd_number'];

        $patient = $officer->readPatient();

        if ($patient->rowCount() > 0) {
            while ($row = $patient->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $opd_number = $row['opd_number'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $sex = $row['sex'];
                $date_of_birth = $row['date_of_birth'];
                $phone = $row['phone'];
                $phone_emergency = $row['phone_emergency'];
                $address = $row['address'];
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
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
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
                    <li>
                        <a href="visits.php">
                            <i class="fa fa-heartbeat"></i>
                            <span>Visits</span>
                        </a>
                    </li>
                    <li class="active">
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
                    Patients
                    <small>edit patient</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="patients.php"><i class="fa fa-dashboard"></i> Patients</a></li>
                    <li class="active">Edit Patient</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- SELECT2 EXAMPLE -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Patient</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" id="patient_form" enctype="multipart/form-data">
                        <?php
                            echo '<input id="id" name="id" type="number" value="'.$id.'" hidden/>';
                        ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>OPD Number</label>
                                        <div class="pull-right">
                                            accept     <input id="opd_number_entry" name="" type="checkbox" onclick="javascript:yesnoCheck();">
                                        </div>
                                        <?php
                                            echo '<input id="opd_number" name="opd_number" type="number" value="'.$opd_number.'" class="form-control" style="width: 100%;" maxlength="6" disabled/>';
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <?php
                                            echo '<input id="firstname" name="firstname" type="name" value="'.$firstname.'" class="form-control" style="width: 100%;" required/>'
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <?php
                                            echo '<input id="lastname" name="lastname" type="name" value="'.$lastname.'" class="form-control" style="width: 100%;" required/>'
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Sex</label>
                                        <select id="sex" name="sex" class="form-control select2" style="width: 100%;" required>
                                            <option>Select sex</option>
                                            <?php
                                                if ($sex == 'male') {
                                                    echo '
                                                        <option value="male" selected="selected">Male</option>
                                                        <option value="female">Female</option>';
                                                } elseif ($sex == 'female') {
                                                    echo '
                                                        <option value="male">Male</option>
                                                        <option value="female" selected="selected">Female</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth(mm/dd/yyyy)</label>
                                        <div class="pull-right">
                                            <p4 id="age_p_tag" name="age_p_tag"></p4>
                                        </div>
                                        <div class="input-group date" style="width: 100%;">
                                            <?php
                                                $date_of_birth = date("m/d/Y", strtotime($date_of_birth));
                                                echo '<input id="date_of_birth" name="date_of_birth" type="text" value="'.$date_of_birth.'" placeholder="mm/dd/yyyy" class="form-control" onchange="javascript:getAge()">';
                                            ?>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group ">
                                        <label>Phone</label>
                                        <?php
                                            echo '<input id="phone" name="phone" type="number" value="'.$phone.'" class="form-control" style="width: 100%;" maxlength="10" required/>'
                                        ?>
                                    </div>
                                    <div class="form-group ">
                                        <label>Phone Emergency</label>
                                        <?php
                                            echo '<input id="phone_emergency" name="phone_emergency" type="phone" value="'.$phone_emergency.'" class="form-control" style="width: 100%;" maxlength="10" required/>'
                                        ?>
                                    </div>
                                    <div class="form-group ">
                                        <label>Address</label>
                                        <?php
                                            echo '<input id="address" name="address" type="text" value="'.$address.'" class="form-control " style="width: 100%;" required/>'
                                        ?>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer ">
                            <input id="submit" name="submit" type="submit" value="SUBMIT" class="btn btn-block btn-primary pull-right" style="width: 90px;"/>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer ">
            <div class="pull-right hidden-xs ">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="../developer/" target="_blank">Olympian Developers</a>.</strong> All rights reserved.
        </footer>

        <div class="control-sidebar-bg "></div>
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript" src="../dist/js/script.js"></script>
    <script src="../dist/js/jquery-3.4.1.min"></script>
    <script src="../dist/js/jquery-3.2.1.min"></script>
    <!-- jQuery 2.2.3 -->
    <script src="../plugins/jQuery/jquery-2.2.3.min.js "></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../bootstrap/js/bootstrap.min.js "></script>
    <!-- Select2 -->
    <script src="../plugins/select2/select2.full.min.js "></script>
    <!-- bootstrap datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js "></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js "></script>
    <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js "></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.js "></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js "></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js "></script>
    <!-- Page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2 ").select2();

            //Date picker
            $('#date_of_birth').datepicker({
                autoclose: true
            });
        });
    </script>

    <script type="text/javascript">
        window.onload = function() {
    	    document.getElementById('date_of_birth').value = document.getElementById('date_of_birth').value;
        }

  	    function yesnoCheck() {
            if (document.getElementById('opd_number_entry').checked) {
      	        document.getElementById('opd_number').disabled = false;
            } else {
                document.getElementById('opd_number').disabled = true;
            }
        }

        function getAge() {
            var now = new Date();
            var today = new Date(now.getYear(),now.getMonth(),now.getDate());

            var yearNow = now.getYear();
            var monthNow = now.getMonth();
            var dateNow = now.getDate();

            var dateString = document.getElementById('date_of_birth').value;

            var dob = new Date(dateString.substring(6,10),
                                dateString.substring(0,2)-1,
                                dateString.substring(3,5));

            var yearDob = dob.getYear();
            var monthDob = dob.getMonth();
            var dateDob = dob.getDate();
            var age = {};
            var ageString = "";
            var yearString = "";
            var monthString = "";
            var dayString = "";


            yearAge = yearNow - yearDob;

            if (monthNow >= monthDob) {
                var monthAge = monthNow - monthDob;
            } else {
                yearAge--;
                var monthAge = 12 + monthNow -monthDob;
            }

            if (dateNow >= dateDob) {
                var dateAge = dateNow - dateDob;
            } else {
                monthAge--;
                var dateAge = 31 + dateNow - dateDob;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }

            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if (age.years > 1) {
                yearString = " years";
            } else {
                yearString = " year";
            }
            if (age.months> 1) {
                monthString = " months";
            } else { 
                monthString = " month";
            }
            if (age.days > 1) {
                dayString = " days";
            } else {
                dayString = " day";
            }


            if ( (age.years > 0) && (age.months > 0) && (age.days > 0)) {
                ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
            } else if ( (age.years == 0) && (age.months == 0) && (age.days > 0)) {
                ageString = "Only " + age.days + dayString + " old!";
            } else if ((age.years > 0) && (age.months == 0) && (age.days == 0)) {
                ageString = age.years + yearString + " old. Happy Birthday!!";
            } else if ((age.years > 0) && (age.months > 0) && (age.days == 0)) {
                ageString = age.years + yearString + " and " + age.months + monthString + " old.";
            } else if ((age.years == 0) && (age.months > 0) && (age.days > 0)) {
                ageString = age.months + monthString + " and " + age.days + dayString + " old.";
            } else if ((age.years > 0) && (age.months == 0) && (age.days > 0)) {
                ageString = age.years + yearString + " and " + age.days + dayString + " old.";
            } else if ((age.years == 0) && (age.months > 0) && (age.days == 0)) {
                ageString = age.months + monthString + " old.";
            } else {
                ageString = "Oops! Could not calculate age!";
            }

            document.getElementById('age_p_tag').innerHTML = ageString;
        }
	</script>

    <script>
        $(document).ready(function(e){
            // Submit form data via Ajax
            $("#patient_form").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../api/officer/patient_edit.php',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        $('#patient_form').css("opacity",".5");

                        $('#firstname').attr("disabled","disabled");
                        $('#lastname').attr("disabled","disabled");
                        $('#sex').attr("disabled","disabled");
                        $('#date_of_birth').attr("disabled","disabled");
                        $('#phone').attr("disabled","disabled");
                        $('#phone_emergency').attr("disabled","disabled");
                        $('#address').attr("disabled","disabled");

                    },
                    success: function(response){ //console.log(response);
                        if (response.error == "alpha") {
                            // successful
                            alert(response.message);

                            $('#firstname').val('');
                            $('#lastname').val('');
                            $('#sex').val('');
                            $('#date_of_birth').val('');
                            $('#phone').val('');
                            $('#phone_emergency').val('');
                            $('#address').val('');
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

                        $('#firstname').removeAttr("disabled");
                        $('#lastname').removeAttr("disabled");
                        $('#sex').removeAttr("disabled");
                        $('#date_of_birth').removeAttr("disabled");
                        $('#phone').removeAttr("disabled");
                        $('#phone_emergency').removeAttr("disabled");
                        $('#address').removeAttr("disabled");

                        $('#reset').removeAttr("disabled");
                        $('#submit').removeAttr("disabled");

                        $('#patient_form').css("opacity","");
         
                    },
                    error: function(xhr, status, error){ //console.log(response);
                        //$('.statusMsg').html('');
                        alert(xhr.responseText);

                        $('#svisit_form').css("opacity","");

                        $('#firstname').removeAttr("disabled");
                        $('#lastname').removeAttr("disabled");
                        $('#sex').removeAttr("disabled");
                        $('#date_of_birth').removeAttr("disabled");
                        $('#phone').removeAttr("disabled");
                        $('#phone_emergency').removeAttr("disabled");
                        $('#address').removeAttr("disabled");

                        $('#reset').removeAttr("disabled");
                        $('#submit').removeAttr("disabled");
          
                    }
                });
            });

        });
    </script>
</body>

</html>