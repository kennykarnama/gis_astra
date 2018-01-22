@push('meta')
	<meta name="_token" content="{{ csrf_token() }}">
@endpush

@extends('layouts.default')

@section('content')

	<div class="row" style="margin-top:15px;">


      <div class="col s8">

      	 <a class="waves-effect waves-light btn modal-trigger" href="#modal-tambah-customer">Tambah Info Peminjaman</a>
      	
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

        <th>Nama Peminjam</th>

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
		 			Saldo
		 		</th>

        <th>Action</th>
		 	</thead>

		 	<tbody>

        @foreach($customers as $customer)
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$customer->no_agreement}}</td>
            <td>{{$customer->nama_peminjam}}</td>
            <td>{{$customer->nama_lengkap}}</td>
            <td>{{$customer->nama_kota}}</td>
            <td>{{$customer->nama_kecamatan}}</td>
            <td>{{$customer->nama_kelurahan}}</td>
            <td>{{$customer->alamat}}</td>
            <td>{{$customer->kode_pos}}</td>
            <td>{{$customer->saldo}}</td>
            <td>
              <a class="waves-effect waves-light btn btn-edit-peminjaman"
              data-noagreement={{$customer->no_agreement}}
              >Edit</a>
            </td>
          </tr>
        @endforeach

		 	</tbody>
		 </table>

      </div>
		 


	</div>

 <!--  <ul class="collection with-header">
        <li class="collection-header"><h4>First Names</h4></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content">Hapus</a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
      </ul> -->

<!-- Modal Structure -->
  <div id="modal-tambah-customer" class="modal">
    <div class="modal-content">

    <div class="row">

    <div class="input-field col s12">
          <input id="no_agreement" type="text" class="validate">
          <label for="no_agreement">No Agreement</label>
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
      <div class="input-field col s12">
          <input id="nama_peminjam" type="text" class="validate">
          <label for="nama_peminjam">Nama Peminjam</label>
      </div>
      <div class="input-field col s12">
	    <select id="id_arho">
	      <option value="" disabled selected>Pilih Arho</option>

        @foreach($list_arho as $arho)
          <option value="{{$arho->id_arho}}">{{$arho->nama_lengkap}}</option>
        @endforeach
	    </select>
	   <!--  <label>Materialize Select</label> -->
	  </div>
	  <div class="input-field col s12">
	    <select id="id_kota">
	      <option value="" disabled selected>Pilih Kota</option>
        @foreach($cities as $city)
          <option value="{{$city->id_kota}}">{{$city->nama_kota}}</option>
        @endforeach
	    </select>
	<!--     <label>Materialize Select</label> -->
	  </div>
	    <div class="input-field col s12">
	    <select id="id_kecamatan">
	      <option value="" disabled selected>Pilih Kecamatan</option>
        @foreach($list_kecamatan as $kecamatan)
          <option value="{{$kecamatan->id_kecamatan}}">{{$kecamatan->nama_kecamatan}}</option>
        @endforeach
	    </select>

	  </div>
	  <div class="input-field col s12">
	    <select id="id_kelurahan">
	      <option value="" disabled selected>Pilih Kelurahan</option>
        
       
	    </select>
	
	  </div>
	  <div class="input-field col s12">
        <textarea id="alamat" class="materialize-textarea"></textarea>
        <label for="textarea1">Alamat</label>
      </div>
      <div class="input-field col s12">
          <input id="kode_pos" type="text" class="validate">
          <label for="kode_pos">Kode Pos</label>
      </div>
      

    </div>

       

    </div>
    
    <div class="modal-footer">
      <a href="#!" id="btn-simpan-peminjaman" class="modal-action modal-close waves-effect waves-green btn-flat">Simpan</a>
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
      $('.btn-edit-peminjaman').click(function  () {
        // body...
          var no_agreement = $(this).data('noagreement');

          alert(no_agreement);
      });
      $('#btn-simpan-peminjaman').click(function  () {
        // body...
            var no_agreement = $('#no_agreement').val();

            var nama_peminjam = $('#nama_peminjam').val();

            var id_arho = $('#id_arho').val();

            var id_kota = $('#id_kota').val();

            var id_kecamatan = $('#id_kecamatan').val();

            var id_kelurahan = $('#id_kelurahan').val();

            var alamat = $('#alamat').val();

            var kode_pos = $('#kode_pos').val();

            var tgl_jatuh_tempo = $('#tgl_jatuh_tempo').val();

            var jumlah_angsuran = $('#jumlah_angsuran').val();

            var nilai_angsuran = $('#nilai_angsuran').val();

            var saldo = $('#saldo').val();

             $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        $.ajax({
                   type:'POST',
                   url:'{{route("admin.peminjaman.simpan")}}',
                   data:{

                    'no_agreement':no_agreement,
                    'nama_peminjam':nama_peminjam,
                    'id_arho':id_arho,
                    'id_kota':id_kota,
                    'id_kecamatan':id_kecamatan,
                    'id_kelurahan':id_kelurahan,
                    'alamat':alamat,
                    'kode_pos':kode_pos,
                    'tgl_jatuh_tempo':tgl_jatuh_tempo,
                    'jumlah_angsuran':jumlah_angsuran,
                    'nilai_angsuran':nilai_angsuran,
                    'saldo':saldo

                    

                   },
                   success:function(data){

                      if(data==1){
                        alert('Peminjaman berhasil disimpan');

                        location.reload();
                      }

                      else{
                        alert('Pemijaman gagal disimpan');
                      }
                   }
                });


      });

      $('#id_kecamatan').on('change',function  () {
        // body...

        var id_kecamatan = $('#id_kecamatan').val();

          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kelurahan.fetch_by_kecamatan")}}',
                   data:{

                    'id_kecamatan':id_kecamatan

                   },
                   success:function(data){

                    $('#id_kelurahan').empty();

                    $('#id_kelurahan').append('<option value="" disabled selected>Pilih Kelurahan</option>');

                    $('select').material_select();

                     for(var i=0; i<data.length; i++){
                        
                        var kelurahan = data[i];

                        var select_opt_var = "<option value='"+kelurahan.id_kelurahan+"'>"+kelurahan.nama_kelurahan+"</option>";

                        $('#id_kelurahan').append(select_opt_var);

                        $('#id_kelurahan').trigger('contentChanged');

                            $('select').on('contentChanged', function() {
                              // re-initialize (update)
                              $(this).material_select();
                            });
                     }
                   }
                });
      });
		});
	</script>
@endpush
@stop