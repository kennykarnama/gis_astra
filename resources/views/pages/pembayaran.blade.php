@push('meta')
<!-- Meta Tag -->
 <meta name="_token" content="{{ csrf_token() }}">
@endpush 

@extends('layouts.default')

@section('content')

<div class="row">

 <div class="row">
  <div class="input-field col s6">
   	<select>
      <!-- <option value="" disabled selected>Pilih pencarian berdasarkan</option> -->
      <option value="1" disabled selected>No Agreement</option>
      <option value="2" disabled selected>Nama Customer</option>
    </select>
  </div>
 </div>
  

<div class="row">
	
  <div class="input-field col s6">
      <input id="" type="text" class="validate">
      <label for="last_name">No agreement/nama customer</label>
  </div>
  <a class="waves-effect waves-light btn" style="margin-top: 25px;" id="btn-cari-tagihan">Cari</a>


</div>

<div class="row" id="info_tagihan_customer" style="display:none;">
	 <div class="col s12 m7">
    <div class="card horizontal">
    
      <div class="card-stacked">
        <div class="card-content">

        <p class="center-align"><b>Data Customer</b></p>
              <div class="row">



    <div class="input-field col s12">
          <input disabled id="no_agreement" type="text" class="validate">
          <label for="no_agreement">No Agreement</label>
      </div>
      <div class="input-field col s12">
          <input disabled id="nama_peminjam" type="text" class="validate">
          <label for="nama_peminjam">Nama Peminjam</label>
      </div>
     
      <div class="input-field col s12">
          <input disabled id="jumlah_angsuran" type="number" class="validate">
          <label for="jumlah_angsuran">Jumlah Angsuran</label>
      </div>
       <div class="input-field col s12">
          <input disabled id="nilai_angsuran" type="number" class="validate">
          <label for="nilai_angsuran">Nilai Angsuran</label>
      </div>

      <div class="center-align">
          
           <a class="waves-effect waves-light btn" id="btn-bayar">Bayar</a>

      </div>

      <div class="collection-item">
       <ul class="collection with-header">
        <li class="collection-header"><p><b>Kurang</b></p></li>
        <div>Januari<a href="#!" id="link-bayar" class="secondary-content">Bayar</a>
        </div>
       </ul>
      </div>

        <!-- Modal bayar Structure -->
  <div id="modal-bayar" class="modal">
    <div class="modal-content">

    <div class="row">
    
      <div class="input-field col s12">
          <input id="tgl_jatuh_tempo" type="text" class="datepicker">
          <label for="tgl_jatuh_tempo">Tanggal Pembayaran</label>
      </div>
      <div class="input-field col s12">
          <input id="nilai_angsuran_bayar" type="number" class="validate">
          <label for="nominal_bayar">Nominal Pembayaran</label>
      </div>

    </div>

    </div>

    
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Simpan</a>
    </div>
  </div>
          

    </div>
        </div>
        <div class="card-action">

        <!-- <div class="center-align">
        	
        	 <a class="waves-effect waves-light btn">Simpan</a>

        </div> -->
        
        </div>
      </div>
    </div>
  </div>
</div>




</div>





@push('scripts')
	<script type="text/javascript">
		
		$(document).ready(function () {
			// body...

      $('#link-bayar').click(function () {
        $('#modal-bayar').modal('open');
      });

      $('#btn-bayar').click(function () {
        $('#modal-bayar').modal('open');
      });

      $('#btn-cari-tagihan').click(function  () {
        // body...
          $('#info_tagihan_customer').show();
      });
		});
	</script>
@endpush
@stop
