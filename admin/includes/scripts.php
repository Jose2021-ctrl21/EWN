<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script> -->
<!-- ChartJS -->
<!-- <script src="../bower_components/chart.js/Chart.js"></script> -->
<script src='https://cdn.plot.ly/plotly-2.32.0.min.js'></script>

<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- LOCATION -->
<script src="location.js"></script>
<script src="location_edit.js"></script>

<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true,
      'ordering': false,
      buttons: ['copy', 'excel', 'pdf'] // Add buttons here
    });
    
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      buttons: ['copy', 'excel', 'pdf'] // Add buttons here
    });
  });
</script>

<script>
  $(function () {
    $('#example3').DataTable({
      responsive: true,
      'ordering': false
    })
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
  new DataTable('#examplez', {
    layout: {
        topStart: {
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        }
    }
});
</script>

<script>
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  
});
</script>
<script>
$(function(){
	//Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
	//Date2 picker
  $('#datepicker_add2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#month').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'mm' // or 'mm' for zero-padded month
  });
  $('#year').datepicker({
      autoclose: true,
      minViewMode: 2,
      format: 'yyyy' // or 'yy' for two-digit year
  });

  // $('#dateFrom, #dateTo').datepicker({
  //   autoclose: true,
  //   format: 'yyyy-mm-dd'
  // })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )

    // DATE RANGE FILTERING 
    $(document).ready(function(){
    // Initialize Datepicker
    $('#dateFrom, #dateTo').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    // Initialize DataTable with Buttons extension
    var table = $('#examplex').DataTable({
        responsive: true,
        ordering: false,
        buttons: ['excel', 'pdf', 'print']
    });

    // Filter table data on date range change
    $('#dateFrom, #dateTo').change(function(){
        var fromDate = $('#dateFrom').val();
        var toDate = $('#dateTo').val();
        $.fn.dataTable.ext.search.pop();
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var date = data[1];
                var startDate = moment(fromDate, 'YYYY-MM-DD');
                var endDate = moment(toDate, 'YYYY-MM-DD');
                var currentDate = moment(date, 'YYYY-MM-DD');
                return currentDate.isBetween(startDate, endDate, null, '[]');
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.pop();
    });
});
  // END DATE RANGE FILTERING
  
});
</script>

