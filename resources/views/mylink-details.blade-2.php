@extends('layouts.graph')
		@section('content')
		<!--End Header Section-->
		<div id="h-header">
			<section class="ptb-60 shortner-form-section">
                <div class="container">
					<div class="row">
						<div class="col-lg-6">
                            
                            <h5>{{$clicklog->short_url}}</h5>
                            <p>{{ $clicklog->long_url }}</p>
                           
                            <h6>Visits: {{ $clicklog->hit }}</h6>
                        </div>
                        <div class="col-lg-6">
                            <div class="current-qr">
                                <div id="qrcode"></div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<h4> Country</h4>
							@foreach($country_data as $country)
							<div class="card-header">{{ $country['name'] }}</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: {{ number_format($country['percentage'],2) }}%" aria-valuenow="{{ number_format($country['percentage'],2) }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($country['percentage'],2) }}%</div>
							</div>
							@endforeach
						</div>
						<div class="col-lg-6">
							<h4>City</h4>
							@foreach($city_data as $city)
							<div class="card-header">{{ $city['name'] }}</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: {{ number_format($city['percentage'],2) }}%" aria-valuenow="{{ number_format($city['percentage'],2) }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($country['percentage'],2) }}%</div>
							</div>
							@endforeach
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-6">
							<h4>Device</h4>
							@foreach($device_data as $device)
							<div class="card-header">{{ $device['name'] }}</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: {{ number_format($device['percentage'],2) }}%" aria-valuenow="{{ number_format($device['percentage'],2) }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($device['percentage'],2) }}%</div>
							</div>
							@endforeach
						</div>
						<div class="col-lg-6">
							<h4>Language</h4>
							@foreach($language_data as $language)
							<div class="card-header">{{ $language['name'] }}</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: {{ number_format($language['percentage'],2) }}%" aria-valuenow="{{ number_format($language['percentage'],2) }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($country['percentage'],2) }}%</div>
							</div>
							@endforeach
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-6">
							<h4>OS</h4>
							@foreach($platform_data as $platform)
							<div class="card-header">{{ $platform['name'] }}</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: {{ number_format($platform['percentage'],2) }}%" aria-valuenow="{{ number_format($platform['percentage'],2) }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($platform['percentage'],2) }}%</div>
							</div>
							@endforeach
						</div>
						<div class="col-lg-6">
							<h4>Browser</h4>
							@foreach($browser_data as $browser)
							<div class="card-header">{{ $browser['name'] }}</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: {{ number_format($browser['percentage'],2) }}%" aria-valuenow="{{ number_format($browser['percentage'],2) }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($browser['percentage'],2) }}%</div>
							</div>
							@endforeach
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-6">
							<h4>Referer</h4>
							@foreach($referer_data as $referer)
							<div class="card-header">{{ $referer['name'] }}</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: {{ number_format($referer['percentage'],2) }}%" aria-valuenow="{{ number_format($referer['percentage'],2) }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($referer['percentage'],2) }}%</div>
							</div>
							@endforeach
						</div>
						<div class="col-lg-6">
							<h4>Day</h4>
							@foreach($day_data as $day)
							<div class="card-header">{{ $day['name'] }}</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: {{ number_format($day['percentage'],2) }}%" aria-valuenow="{{ number_format($day['percentage'],2) }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($day['percentage'],2) }}%</div>
							</div>
							@endforeach
						</div>
					</div>
					
				</div>
			</section>
		</div>
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
            if("{{session('status')}}" == "success"){
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
		
		function downloadQr(id, short_id){
			var img =document.getElementById('qr_'+id).lastChild.src
			var a = document.createElement("a"); //Create <a>
			a.href =  img; //Image Base64 Goes here
			a.download = short_id + ".png"; //File name Here
			a.click()
		}
		
			new QRCode(document.getElementById("qrcode"), {
				text: '{{$clicklog->short_url}}',
				width: 250,
				height: 250
			});
	</script>
@endsection
