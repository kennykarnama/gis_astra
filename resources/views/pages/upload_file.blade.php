@push('meta')
<!-- Meta Tag -->
 <meta name="_token" content="{{ csrf_token() }}">
@endpush 

@extends('layouts.default')

@section('content')

<div class="row" style="margin-top:15px;">

	<div class="col s6">

		@if(session()->has('pesan_import'))

		<div class="card-panel">

			<blockquote>
      			<h5><b>{{session('pesan_import')}}</h5></b>
    		</blockquote>

		</div>
			
		@endif

		<form action="{{route('admin.upload_file.import')}}" method="post" enctype="multipart/form-data">
    	{{ csrf_field() }}

    	<div class="col s12">

    		<div class="file-field input-field">
		      <div class="btn">
		        <span>Pilih file</span>
		        <input type="file" name="import_file">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" type="text">
		      </div>

   			 </div>




    	</div>
    	<div class="center-align">
    			<button class="btn" type="submit">Submit</button>    
    	</div>
   	
   
  </form>

	</div>

	

</div>

@push('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function  () {
			
		});
	</script>
@endpush

@stop