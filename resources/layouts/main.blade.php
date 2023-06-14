<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <title>Health Mate</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
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
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>O</b>Dev</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Health</b>Mate</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
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
                    <li class="active">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-dashboard"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('visits') }}">
                            <i class="fa fa-heartbeat"></i>
                            <span>Visits</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patients') }}">
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
                            <li><a href="{{ route('reports/soo') }}"><i class="fa fa-circle"></i> Statement of Outptients</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="developer/" target="_blank">Olympian Developers</a>.</strong> All rights reserved.
        </footer>

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('dist/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery-3.2.1.min.js') }}"></script>
    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
     <!-- Select2 -->
     <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <script>
        $(function() {
            $(document).ready(function(e) {
            toastr.options.timeOut = 8000;

            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

            //Initialize Select2 Elements
            $(".select2 ").select2();

            //Date picker
            $('#date_of_birth').datepicker({
                autoclose: true
            });
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

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

    <script type="text/javascript">
        
    </script>

</body>

</html>