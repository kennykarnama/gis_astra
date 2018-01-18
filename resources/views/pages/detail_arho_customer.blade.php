@push('meta')
<!-- Meta Tag -->
 <meta name="_token" content="{{ csrf_token() }}">
@endpush 

@extends('layouts.default')

@section('content')
	<div class="row" style="margin-top:15px;">
		<div class="col s8">
		 <div class="col s12 m7">
		    <h2 class="header">Horizontal Card</h2>
		    <div class="card horizontal">
		      <div class="card-image">
		        <img src="https://lorempixel.com/100/190/nature/6">
		      </div>
		      <div class="card-stacked">
		        <div class="card-content">
		          <p>I am a very simple card. I am good at containing small bits of information.</p>
		        </div>
		        <div class="card-action">
		          <a href="#">This is a link</a>
		        </div>
		      </div>
		    </div>
  		</div>

  		  <ul class="collection with-header">
		        <li class="collection-header"><p><b>First Names</b></p></li>
		        <li class="collection-item">Alvin</li>
		        <li class="collection-item">Alvin</li>
		        <li class="collection-item">Alvin</li>
		        <li class="collection-item">Alvin</li>
      	</ul>
	</div>
</div>
@stop