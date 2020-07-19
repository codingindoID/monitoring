<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets/'?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url().'assets/'?>bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url().'assets/'?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url().'assets/'?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets/'?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url().'assets/'?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url().'assets/'?>bower_components/morris.js/morris.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url().'assets/'?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url().'assets/'?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/'?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/'?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/'?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/'?>dist/js/demo.js"></script>

<!-- FLOT CHARTS -->
<script src="<?php echo base_url().'assets/'?>bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url().'assets/'?>bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url().'assets/'?>bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url().'assets/'?>bower_components/Flot/jquery.flot.categories.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url().'assets/'?>bower_components/chart.js/Chart.js"></script>

</body>
</html>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example3').DataTable({
      dom: 'Bfrtip',
      columnDefs: [
      {
        targets: 2,
        className: 'dt-body-center'
      },
      {
        targets: 3,
        className: 'dt-body-center'
      },
      {
        targets: 4,
        className: 'dt-body-center'
      }
      ],
      buttons: [
      {
        extend: 'excel',
        title: '<?php echo "Rekap ".$title." ".$sub ?>',
      },
      {
        extend: 'print',

        title: function() {
          return "<div style='font-size: 20px;'><Strong><center><?php echo "Rekap ".$title." ".$sub ?></center></strong></div>";
        } ,
        customize: function ( win ) {
          $(win.document.body)
          .css( 'font-size', '10pt' );
          $(win.document.body).find( 'table' )
          .addClass( 'compact' )
          .css( 'font-size', 'inherit' );
        }
      },
      {
        extend: 'pdf',
        download : 'open',
        title: "<?php echo "Rekap ".$title." ".$sub ?>" ,
        pageSize : 'legal',
        orientation : 'landscape',
        customize: function (doc) {
          doc.content[1].table.widths = 
          Array(doc.content[1].table.body[0].length + 1).join('*').split('');
        }
      }
      ]
    })
    
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    })

     //Date picker
     $('#dateend').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    })


   })
 </script>

 <script type="text/javascript">
    //chart donut
    var donutData =  <?php echo json_encode($chart) ?>;
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })

    function labelFormatter(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
    }
  </script>

  <script type="text/javascript">
    function getitem(){
     var a = document.getElementById("status_kirim").value;
     var b = document.getElementById("row_ket");
     if(a=="3"){
      b.hidden=false;
    }else{
     b.hidden=true;
   }
 }
</script>