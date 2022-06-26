@extends('layouts.graph')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@endsection
@section('content')
<div id="h-header">
	<section class="ptb-60 shortner-form-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="link_details_header">
						<div class="row align-items-center">
							<div class="col-lg-12">
								<div class="link_header_lft">
									<h5>{{ $clicklog->long_url }}</h5>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="link_header_shrt">
									<div class="d-flex align-items-center">
										<a href="{{ $clicklog->long_url }}">
											<p id="my_link">{{$clicklog->short_url}}</p>
										</a>
										<span id="copy_my_link" data-toggle="tooltip" data-placement="top" title="Copy"><i class="fas fa-copy"></i></span>
									</div>
									<p id="linkCopied"></p>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="qr_code_wrap">
									<div id="qrcode" class="qr_code"></div>
								</div>
							</div>
							<div class="col-lg-5">
 
								<div class="social_share"> 
									<ul>
										<li><a title="share on facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$clicklog->short_url}}"><i class="fab fa-facebook-square"></i></a></li>
										<li><a href="https://twitter.com/intent/tweet?url={{$clicklog->short_url}}"><i class="fab fa-twitter-square"></i></a></li>
										<li><a href="https://www.linkedin.com/sharing/share-offsite/?url={{$clicklog->short_url}}"><i class="fab fa-linkedin"></i></a></li>
										<li><a href="?{{$clicklog->short_url}}" data-image="http%3A%2F%2Fcdn.sstatic.net%2Fstackexchange%2Fimg%2Flogos%2Fso%2Fso-logo.png" data-desc="Custom Pinterest button for custom URL (Text-Link, Image, or Both)" class="btnPinIt" target= "pinIt"><i class="fab fa-pinterest-square"></i></a></li>
										<li><a href="https://web.whatsapp.com/send?text={{$clicklog->short_url}}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp-square"></i></a></li>
									</ul>
								</div>
	
								<div class="link_details_visit">
									<h6><i class="fas fa-hand-pointer"></i> {{ $clicklog->hit }}</h6>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="location_sec_wrap">
						<h3>Visit</h3>
						<h2>Total Count: {{ $total_count }}</h2>
						<h2>Unique Count: {{ $unique_count }}</h2>

					</div>
					<div class="location_chart_wrap p-4">
					   <div class="card-body p-0">
							 <div>
							     <canvas id="unique_and_total_visit"></canvas>
							</div>
                        </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="location_sec_wrap">
						<h3>Location</h3>
					</div>
					<div class="location_chart_wrap">
						<div class="location_chart_head">
							<ul class="nav nav-pills" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Country</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">City</a>
								</li>
							</ul>
						</div>
						<div class="location_chart_body">
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									<div class="world_map_wrap">
										<div id="vmap" style="width: 100%; height: 300px;"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									<div class="wrapper">
										@foreach($city_data as $city)
										<div class="skill">
											<div class="d-flex justify-content-between">
												<p>{{ $city['name'] }}</p>
												<span class="skill-count1">{{ number_format($city['percentage'],2) }}%</span>
											</div>
											<div class="skill-bar skill1 wow slideInLeft animated" style="width: {{ number_format($city['percentage'],2) }}%">
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="location_sec_wrap">
						<h3>Platform</h3>
					</div>
					<div class="location_chart_wrap">
						<div class="location_chart_head">
							<ul class="nav nav-pills" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-homea-tab" data-toggle="pill" href="#pills-homea" role="tab" aria-controls="pills-homea" aria-selected="true">Device</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profilea-tab" data-toggle="pill" href="#pills-profilea" role="tab" aria-controls="pills-profilea" aria-selected="false">OS</a>
								</li>
							</ul>
						</div>
						<div class="location_chart_body">
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-homea" role="tabpanel" aria-labelledby="pills-homea-tab">

									<div class="donut_chart_wrap">
										<canvas id="myChartd"></canvas>
									</div>

								</div>
								<div class="tab-pane" id="pills-profilea" role="tabpanel" aria-labelledby="pills-profilea-tab">
									<div class="donut_chart_wrap">
										<canvas id="myChart"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="location_sec_wrap">
						<h3>Day--</h3>
					</div>
					<div class="location_chart_wrap">
						<!-- <div class="location_chart_head">
								<ul class="nav nav-pills" id="pills-tab" role="tablist">
									
									<li class="nav-item">
										<a class="nav-link" id="pills-profileabc-tab" data-toggle="pill" href="#pills-profileabc" role="tab" aria-controls="pills-profileabc" aria-selected="false">Day</a>
									</li>
									</ul>
								</div> -->
						<div class="location_chart_body">
							<div class="tab-content" id="pills-tabContent">

								<div class="tab-pane fade  show active" id="pills-profileabc" role="tabpanel" aria-labelledby="pills-profileabc-tab">
									<div class="wrapper">
										<canvas id="chartByDay"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="location_sec_wrap">
						<h3>Browsing</h3>
					</div>
					<div class="location_chart_wrap">
						<div class="location_chart_head">
							<ul class="nav nav-pills" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-homeab-tab" data-toggle="pill" href="#pills-homeab" role="tab" aria-controls="pills-homeab" aria-selected="true">Language</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profileab-tab" data-toggle="pill" href="#pills-profileab" role="tab" aria-controls="pills-profileab" aria-selected="false">Browser</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-homeabc-tab" data-toggle="pill" href="#pills-homeabc" role="tab" aria-controls="pills-homeabc" aria-selected="true">Referer</a>
								</li>
							</ul>
						</div>
						<div class="location_chart_body">
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-homeab" role="tabpanel" aria-labelledby="pills-homeab-tab">
									<div class="wrapper">
										@foreach($language_data as $language)
										<div class="skill">
											<div class="d-flex justify-content-between">
												<p>{{ $language['name'] }}</p>
												<span class="skill-count1">{{ number_format($language['percentage'],2) }}</span>
											</div>

											<div class="skill-bar skill1 wow slideInLeft animated" style="width: {{ number_format($language['percentage'],2) }}%">

											</div>
										</div>
										@endforeach
									</div>

								</div>
								<div class="tab-pane fade" id="pills-profileab" role="tabpanel" aria-labelledby="pills-profileab-tab">
									<div class="wrapper">
										@foreach($browser_data as $browser)
										<div class="skill">
											<div class="d-flex justify-content-between">
												<p>{{ $browser['name'] }}</p>
												<span class="skill-count1">{{ number_format($browser['percentage'],2) }}%</span>
											</div>

											<div class="skill-bar skill1 wow slideInLeft animated" style="width: {{ number_format($browser['percentage'],2) }}%">

											</div>
										</div>
										@endforeach
									</div>
								</div>

								<div class="tab-pane fade" id="pills-homeabc" role="tabpanel" aria-labelledby="pills-homeabc-tab">
									<div class="wrapper">
										@foreach($referer_data as $referer)
										<div class="skill">
											<div class="d-flex justify-content-between">
												<p>{{ $referer['name'] }}</p>
												<span class="skill-count1">{{ number_format($referer['percentage'],2) }}</span>
											</div>
											<div class="skill-bar skill1 wow slideInLeft animated" style="width: {{ number_format($referer['percentage'],2) }}%">

											</div>
										</div>
										@endforeach
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>
<div id="fb-root"></div>
@endsection

@section('script')
@if(session()->has('status'))
<div class="toaster alert alert-{{session('status')}} alert-dismissible fade show" role="alert">
	<div class="toast-icon {{session('status')}}-icon"><i class="fas fa-exclamation"></i></div>
	<div class="toster-text">
		<strong>{{session('status')}}</strong> {{session('message')}}
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<script>
	if ("{{session('status')}}" == "success") {
		document.getElementById('long_url').value = "{{session('short_url')}}"
		var shortnarBtn = document.getElementById("shortnarBtn");
		shortnarBtn.classList.add("copy");
		shortnarBtn.innerHTML = "Copy"
		$("#long_url").select()
		new QRCode(document.getElementById("qrcode"), {
			text: $('#long_url').val(),
			width: 100,
			height: 100
		});
	}
</script>
@endif
<script>
	function downloadQr(id, short_id) {
		var img = document.getElementById('qr_' + id).lastChild.src
		var a = document.createElement("a"); //Create <a>
		a.href = img; //Image Base64 Goes here
		a.download = short_id + ".png"; //File name Here
		a.click()
	}

	new QRCode(document.getElementById("qrcode"), {
		text: '{{$clicklog->short_url}}',
		width: 250,
		height: 250
	});
</script>


<script src="{{url('assets/js/map/jquery.vmap.js')}}"></script>
<script src="{{url('assets/js/map/jquery.vmap.world.js')}}"></script>
<script src="{{url('assets/js/map/jquery.vmap.sampledata.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	const ctx = document.getElementById('myChart');
	const myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: <?php echo json_encode($platform_data["labels"]) ?>,
			datasets: [{
				label: '#of Votes',
				data: <?php echo json_encode($platform_data["data"]) ?>,
				backgroundColor: [
					'#a2aaad',
					'#00008b',
					'#8CB826',
					'#00BCF2',
					'#DD4814'
				],
				borderColor: [
					'#a2aaad',
					'#00008b',
					'#8CB826',
					'#00BCF2',
					'#DD4814'
				],
				borderWidth: 0.2
			}]
		}
	});
	const ctxs = document.getElementById('myChartd');
	const myChartd = new Chart(ctxs, {
		type: 'doughnut',
		data: {
			labels: <?php echo json_encode($device_data["labels"]) ?>,
			datasets: [{
				label: '#of Votes',
				data: <?php echo json_encode($device_data["data"]) ?>,
				backgroundColor: [
					'#a2aaad',
					'#00BCF2',
					'#D93A00'
				],
				borderColor: [
					'#a2aaad',
					'#00BCF2',
					'#D93A00'
				],
				borderWidth: 0.2
			}]
		}
	});

	const ctxv = document.getElementById('chartByDay');
	const chartByDay = new Chart(ctxv, {
		type: 'bar',
		data: {
			labels: <?php echo json_encode($day_data["label"]) ?>,
			datasets: [{
				label: 'click per day',
				data: <?php echo json_encode($day_data["data"]) ?>,
				backgroundColor: [
					'#E08B44',
					'#3EB4F0',
					'#80589E',
					'#D14A43',
					'#FFF243',
					'#D6569B',
					'#52AB62'
				],
				borderColor: [
					'#E08B44',
					'#3EB4F0',
					'#80589E',
					'#D14A43',
					'#FFF243',
					'#D6569B',
					'#52AB62'

				],
				borderWidth: 0.2
			}]
		}
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
	jQuery('#vmap').vectorMap({
		map: 'world_en',
		backgroundColor: '#fff',
		color: '#ffffff',
		hoverOpacity: 0.7,
		selectedColor: '#666666',
		enableZoom: false,
		showTooltip: true,
		values: <?php echo json_encode($country_data) ?>,
		scaleColors: ['#C8EEFF', '#006491'],
		normalizeFunction: 'polynomial'
	});


	let copy_my_link = document.getElementById('copy_my_link')
	copy_my_link.addEventListener('click',copyToClipboard)


	function copyToClipboard() {
		text = document.getElementById('my_link').innerText
		const elem = document.createElement('textarea');
		elem.value = text;
		document.body.appendChild(elem);
		elem.select();
		document.execCommand('copy');
		document.body.removeChild(elem);
		toastr.success('link copied')
		toastr.options.timeOut = 30;
	}
</script>

<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Total Visit',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10],
    },{
      label: 'Unique Visit',
      backgroundColor: 'palegreen',
      borderColor: 'palegreen',
      data: [0, 5, 20],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>
 

<script>
  const unique_and_total_visit = new Chart(
    document.getElementById('unique_and_total_visit'),
    config
  );
</script>

<script>
$('.btnPinIt').click(function() {
    var url = $(this).attr('href');
    var media = $(this).attr('data-image');
    var desc = $(this).attr('data-desc');
    window.open("//www.pinterest.com/pin/create/button/"+
    "?url="+url+
    "&media="+media+
    "&description="+desc,"pinIt","toolbar=no, scrollbars=no, resizable=no, top=0, right=0, width=750, height=320");
    return false;
});
</script>



@endsection