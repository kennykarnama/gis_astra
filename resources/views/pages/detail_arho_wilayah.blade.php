@push('meta')
<!-- Meta Tag -->
 <meta name="_token" content="{{ csrf_token() }}">
@endpush 

@extends('layouts.default')

@section('content')

 <style>
       #peta_kecamatan {
        height: 400px;
        width: 100%;
       }
    </style>


<div class="row" style="margin-top:15px;">
	<div class="center-align">
			<img class="responsive-img" src="{{url('/images/worker.png')}}">
			<p><b>{{$arho->nama_lengkap}}</b></p>
	</div>
</div>

<div class="row">

	<p class="center-align"><b>Daftar Wilayah Penugasan</b></p>

	<div class="container">

		<ul class="collection with-header">

			@for($i = 0; $i < count($data); $i++)
				@php
					$kecamatan = $data[$i];

					$list_kelurahan = $kecamatan['kelurahan'];

				@endphp

				<li class="collection-header"><p><b><a href="#!" data-idkecamatan="{{$kecamatan['id_kecamatan']}}"class="btn-detail-kecamatan">{{$kecamatan['nama_kecamatan']}}</a></b></p></li>

				@for($j = 0; $j < count($list_kelurahan); $j++)

					@php
						
						$kelurahan = $list_kelurahan[$j];

					@endphp
					<li class="collection-item">{{$kelurahan['nama_kelurahan']}}</li>
				@endfor

			@endfor

		</ul>

		
     

	</div>
 
</div>



<!-- Modal Structure -->
  <div id="modal-detail-kecamatan" class="modal">
    <div class="modal-content">
       <div class="row">
    <div class="input-field col s6">
      <input  id="nama_kecamatan" type="text" class="validate">
      <label class="active" for="nama_kecamatan">Nama Kecamatan</label>
    </div>

    <div class="input-field col s6">
      <input  id="luas_wilayah" type="number" class="validate">
      <label class="active" for="luas_wilayah">Luas Wilayah</label>
    </div>
  </div>

 
  <div class="row">
    <div class="input-field col s6">
      <input  id="lat" type="number" class="validate">
      <label class="active" for="lat">Latitude</label>
    </div>

    <div class="input-field col s6">
      <input  id="lot" type="number" class="validate">
      <label class="active" for="lot">Longitude</label>
    </div>
  </div>

  <div class="row">

  	<div class="container">
  		<div id="peta_kecamatan"></div>
  	</div>
  	
  </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

@push('scripts')
	<script type="text/javascript">



		$(document).ready(function  () {
			// body...
			$('.btn-detail-kecamatan').click(function  () {
			// body...
			var id_kecamatan = $(this).data('idkecamatan');

			// call ajax

			$.ajaxSetup({
			            headers: {
			                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			            }
        			});

				$.ajax({
		               type:'POST',
		               url:'{{route("admin.kecamatan.get")}}',
		               data:{

		               	'id_kecamatan':id_kecamatan

		               },
		               success:function(data){
		                  
		                 $('#nama_kecamatan').val(data.nama_kecamatan);

		                 $('#luas_wilayah').val(data.luas_wilayah_km2);

		                 $('#lat').val(data.lat);

		                 $('#lot').val(data.lng);

		                 var latVal = data.lat;

		                 var lngVal = data.lng;

		                var uluru = {lat: latVal, lng: lngVal};
					        var map = new google.maps.Map(document.getElementById('peta_kecamatan'), {
					          zoom: 20,
					          center: uluru
					        });
					        var marker = new google.maps.Marker({
					          position: uluru,
					          map: map
					        }); 

		                 Materialize.updateTextFields();

		                 $('#modal-detail-kecamatan').modal('open'); 

		               }
            		});

			});
		});
		
	</script>

	
    <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtYiajc1RrGCJtWnaBSwVlJGhND6delcQ">
    </script>
@endpush

@stop