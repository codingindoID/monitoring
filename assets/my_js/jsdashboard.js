$(document).ready(function() {
	var base 	= $('#baseurl').val();
	$('#bt_filter').click(function(event) {
		var start   = $('#datepicker').val();
		var end     = $('#dateend').val();
		var total   = $('#tx_total');
		var rutin   = $('#tx_rutin');
		var non     = $('#tx_non');

		$.ajax({
			url: base+'dashboard/aksi_filter/'+start+'/'+end,
			type: 'get',
			dataType: 'json',
		})
		.done(function(data) {
			total.text(data.total);
			rutin.text(data.rutin);
			non.text(data.non);
		})
		.fail(function() {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'error get data'
			})
		});
		
		
	});

	$('#grafik_tahun').change(function(event) {
		var tahun = $('#grafik_tahun').val();
		$.ajax({
			url:  base+'dashboard/chart/'+tahun,
			type: 'get',
			dataType: 'json',
		})
		.done(function(data) {
			Highcharts.chart('container', {
				chart: {
					type: 'column'
				},
				title: {
					text: 'Monitoring Keluar Masuk Kendaraan tahun : '+tahun
				},
				subtitle: {
					text: 'Data diambil dari rata-rata keluar masuk kendaraan setiap bulan'
				},
				xAxis: {
					categories: [
					'Jan',
					'Feb',
					'Mar',
					'Apr',
					'May',
					'Jun',
					'Jul',
					'Aug',
					'Sep',
					'Oct',
					'Nov',
					'Dec'
					],
					crosshair: true
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Total Pengunjung'
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y:.1f} pengunjung</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series: [
				{
					name: 'Rutin',
					data : data['chart_rutin']

				}, 
				{
					name: 'Non Rutin',
					data : data['chart_non_rutin']

				}
				]
			});
		});			
	})
	.fail(function() {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'error'
		})
	});
});