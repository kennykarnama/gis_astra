@push('meta')
	<meta name="_token" content="{{ csrf_token() }}">
@endpush

@extends('layouts.default')

@section('content')

	<div class="row" style="margin-top:15px;">


      <div class="col s8">

      	 <a class="waves-effect waves-light btn modal-trigger" href="#modal-tambah-customer">Tambah Customer</a>

      		 <div class="row">
          <form class="col s12">

             <div class="input-field col s6">
      
        </div>

         <div class="input-field col s6">
          <input  id="search_field" type="text" class="validate search">
          <label for="search_field">Search</label>
        </div>

          </form>
      </div>

      	<table class="responsive-table" id="tabel-data-customer">
		 	<thead>
		 		<th>
		 			No.
		 		</th>

		 		<th>
		 			Agreement
		 		</th>

		 		<th>
		 			Arho
		 		</th>

		 		<th>
		 			Kota
		 		</th>

		 		<th>
		 			Kecamatan
		 		</th>

		 		<th>
		 			Kelurahan	 		
		 		</th>

		 		<th>
		 			Alamat
		 		</th>

		 		<th>
		 			Kode Pos
		 		</th>

		 		<th>
		 			Telpon
		 		</th>

		 		<th>
		 			Saldo
		 		</th>
		 	</thead>

		 	<tbody>

		 	</tbody>
		 </table>

      </div>
		 


	</div>

<!-- Modal Structure -->
  <div id="modal-tambah-customer" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

@push('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function  () {
			// body...

		});
	</script>
@endpush
@stop