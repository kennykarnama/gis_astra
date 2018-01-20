@push('meta')
	<meta name="_token" content="{{ csrf_token() }}">
@endpush

@extends('layouts.default')

@section('content')

	<div class="row" style="margin-top:15px;">


      <div class="col s8">

      	 <a class="waves-effect waves-light btn modal-trigger" href="#modal-tambah-customer">Tambah Customer</a>
      	 <a class="waves-effect waves-light btn modal-trigger" href="#modal-edit-customer">Edit Customer</a>

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

    <div class="row">

    <div class="input-field col s12">
          <input id="no_agreement" type="text" class="validate">
          <label for="no_agreement">No Agreement</label>
      </div>
      <div class="input-field col s12">
          <input id="nama_peminjam" type="text" class="validate">
          <label for="nama_peminjam">Nama Peminjam</label>
      </div>
      <div class="input-field col s12">
	    <select id="id_arho">
	      <option value="" disabled selected>Pilih Arho</option>
	    </select>
	   <!--  <label>Materialize Select</label> -->
	  </div>
	  <div class="input-field col s12">
	    <select id="id_kota">
	      <option value="" disabled selected>Pilih Kota</option>
	    </select>
	<!--     <label>Materialize Select</label> -->
	  </div>
	    <div class="input-field col s12">
	    <select id="id_kecamatan">
	      <option value="" disabled selected>Pilih Kecamatan</option>
	    </select>
	<!--     <label>Materialize Select</label> -->
	  </div>
	  <div class="input-field col s12">
	    <select id="id_kelurahan">
	      <option value="" disabled selected>Pilih Kelurahan</option>
	    </select>
	<!--     <label>Materialize Select</label> -->
	  </div>
	  <div class="input-field col s12">
        <textarea id="alamat" class="materialize-textarea"></textarea>
        <label for="textarea1">Alamat</label>
      </div>
      <div class="input-field col s12">
          <input id="kode_pos" type="text" class="validate">
          <label for="kode_pos">Kode Pos</label>
      </div>
      <div class="input-field col s12">
          <input placeholder="tgl input" id="tgl_jatuh_tempo" type="text" class="datepicker">
          <label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
      </div>
      <div class="input-field col s12">
          <input id="jumlah_angsuran" type="number" class="validate">
          <label for="jumlah_angsuran">Jumlah Angsuran</label>
      </div>
       <div class="input-field col s12">
          <input id="nilai_angsuran" type="number" class="validate">
          <label for="nilai_angsuran">Nilai Angsuran</label>
      </div>
      <div class="input-field col s12">
          <input id="saldo" type="number" class="validate">
          <label for="saldo">Saldo</label>
      </div>

    </div>

       

    </div>
    
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>




<!-- Modal edit Customer -->
<div id="modal-edit-customer" class="modal">
    <div class="modal-content">

    <div class="row">

    <div class="input-field col s12">
          <input id="edit_no_agreement" type="text" class="validate">
          <label for="edit_no_agreement">No Agreement</label>
      </div>
      <div class="input-field col s12">
          <input id="edit_nama_peminjam" type="text" class="validate">
          <label for="edit_nama_peminjam">Nama Peminjam</label>
      </div>
      <div class="input-field col s12">
	    <select id="edit_id_arho">
	      <option value="" disabled selected>Pilih Arho</option>
	    </select>
	   <!--  <label>Materialize Select</label> -->
	  </div>
	  <div class="input-field col s12">
	    <select id="edit_id_kota">
	      <option value="" disabled selected>Pilih Kota</option>
	    </select>
	<!--     <label>Materialize Select</label> -->
	  </div>
	    <div class="input-field col s12">
	    <select id="edit_id_kecamatan">
	      <option value="" disabled selected>Pilih Kecamatan</option>
	    </select>
	<!--     <label>Materialize Select</label> -->
	  </div>
	  <div class="input-field col s12">
	    <select id="edit_id_kelurahan">
	      <option value="" disabled selected>Pilih Kelurahan</option>
	    </select>
	<!--     <label>Materialize Select</label> -->
	  </div>
	  <div class="input-field col s12">
        <textarea id="edit_alamat" class="materialize-textarea"></textarea>
        <label for="edit_alamat">Alamat</label>
      </div>
      <div class="input-field col s12">
          <input id="edit_kode_pos" type="text" class="validate">
          <label for="edit_kode_pos">Kode Pos</label>
      </div>
      <div class="input-field col s12">
          <input placeholder="tgl input" id="edit_tgl_jatuh_tempo" type="text" class="datepicker">
          <label for="edit_tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
      </div>
      <div class="input-field col s12">
          <input id="edit_jumlah_angsuran" type="number" class="validate">
          <label for="edit_jumlah_angsuran">Jumlah Angsuran</label>
      </div>
       <div class="input-field col s12">
          <input id="edit_nilai_angsuran" type="number" class="validate">
          <label for="edit_nilai_angsuran">Nilai Angsuran</label>
      </div>
      <div class="input-field col s12">
          <input id="edit_saldo" type="number" class="validate">
          <label for="edit_saldo">Saldo</label>
      </div>

    </div>
      
       
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