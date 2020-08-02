 $(function (){
var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
var pieChart       = new Chart(pieChartCanvas)
var PieData        = '<?php echo json_encode($chart) ?>'
var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data :
      '<?php echo json_encode($rekap) ?>',
      /*data: [{y: 'Januari', a: 100, b: 90, c:30}],*/
      barColors: ['#00c0ef', '#00a65a','#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b', 'c'],
      labels: ['Surat', 'Terkirim','batal'],
      hideHover: 'auto'
    });

    var bar = new Morris.Bar({
      element: 'bar-kec',
      resize: true,
      data: [
      {y: 'bangsri', a: 100},
      {y: '2007', a: 75},
      {y: '2008', a: 50},
      {y: '2009', a: 75},
      {y: '2009', a: 75},
      {y: '2009', a: 75},
      {y: '2009', a: 75},
      {y: '2009', a: 75},
      {y: '2009', a: 75},
      {y: '2010', a: 50},
      {y: '2010', a: 50},
      {y: '2010', a: 50},
      {y: '2010', a: 50},
      {y: '2010', a: 50},
      {y: '2011', a: 75},
      {y: '2012', a: 100}
      ],
      barColors: ['#00a65a'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Presentase'],
      hideHover: 'auto'
    });

  })
    function status(id){
     $.ajax({
      url : "<?php echo base_url()."c_master/detail/" ?>"+ id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      { 
        var a = data.id_status;
        var b = document.getElementById("row_ket");
        var c = document.getElementById("status_kirim");
        document.getElementById('id_surat').value=id;
        if(a=="1"){
          c.selectedIndex = 0;
        }else if(a=="2"){
          c.selectedIndex = 1;
        }else{
          c.selectedIndex = 2;
          b.hidden=false;
        }
      }
    });
   }



   function edit(id){
    $.ajax({
      url : "<?php echo base_url()."c_master/detail/" ?>"+ id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      { 
       document.getElementById('pengirim').textContent=data.nama_user;
       document.getElementById('alamat_pengirim').textContent=data.alamat_user;
       document.getElementById('email_pengirim').textContent=data.email_user;
       document.getElementById('alamat_penerima').textContent=data.alamat_penerima;
       document.getElementById('hp_penerima').textContent=data.hp_penerima;
       document.getElementById('penerima').textContent=data.penerima;
       document.getElementById('kurir').textContent=data.nama;
       document.getElementById('nomer').textContent=id;
       document.getElementById('petugas').textContent=data.petugas;
       document.getElementById('jenis').textContent=data.jenis_surat;
       document.getElementById('status_pengiriman').textContent=data.status;
       document.getElementById('image_bukti').src=data.image_bukti;

       var sts = data.id_status;
       if (sts==='1') {
        document.getElementById('sts_tgl').hidden = true;
        document.getElementById('status_pengiriman').setAttribute("class", "text-warning");
      } else if (sts==='2'){
        document.getElementById('sts_tgl').hidden = false;
        document.getElementById('tgl_kirim').textContent=data.tgl_kirim;
        document.getElementById('status_pengiriman').setAttribute("class", "text-success");
      } else{
       document.getElementById('sts_tgl').hidden = true;
       document.getElementById('status_pengiriman').setAttribute("class", "text-danger");
     }
     //console.log(data.jenis_surat);
   },
   error: function (jqXHR, textStatus, errorThrown)
   {
    alert('Error get data from ajax');
  }
});
  }

  function getitem(){
   var a = document.getElementById("status_kirim").value;
   var b = document.getElementById("row_ket");
   if(a=="3"){
    b.hidden=false;
  }else{
   b.hidden=true;
 }
}