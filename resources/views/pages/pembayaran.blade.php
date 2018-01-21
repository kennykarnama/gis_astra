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
          <input id="no_agreement" type="text" class="validate">
          <label for="no_agreement">No Agreement</label>
      </div>
      <div class="input-field col s12">
          <input id="nama_peminjam" type="text" class="validate">
          <label for="nama_peminjam">Nama Peminjam</label>
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

      
      <ul id="dropdown2" class="dropdown-content">
    <li><a href="#!">Terbayar</a></li>
    <li><a href="#!" id="link-kurang">Kurang</a></li>
  </ul>
  <a class="btn dropdown-button" href="#!" data-activates="dropdown2">EOD<i class="material-icons right">arrow_drop_down</i></a>
            

    </div>
        </div>
        <div class="card-action">

        <div class="center-align">
        	
        	 <a class="waves-effect waves-light btn">Simpan</a>

        </div>
        
        </div>
      </div>
    </div>
  </div>
</div>




</div>

 <!-- Modal EOD Kurang -->
  <div id="modal_eod_kurang" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Pembayaran yang perlu dilakukan sejumlah</h4>
      <br>
      <br>
      <br>
      <h2 class="center-align"><b>Rp. 14.500.000,-</b></h2>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>
          
@push('scripts')
	<script type="text/javascript">
		
		$(document).ready(function () {
			// body...
			$('#link-kurang').click(function () {
			// body...
			$('#modal_eod_kurang').modal('open');
		});

      $('#btn-cari-tagihan').click(function  () {
        // body...
          $('#info_tagihan_customer').show();
      });
		});
	</script>
@endpush
@stop
