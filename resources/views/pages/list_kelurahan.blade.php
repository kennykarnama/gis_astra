@push('meta')
<!-- Meta Tag -->
 <meta name="_token" content="{{ csrf_token() }}">
@endpush 

@extends('layouts.default')

@section('content')

<div class="row" style="margin-top:15px;">

	<div class="col s8">

		<a class="waves-effect waves-light modal-trigger btn" href="#modal-tambah-kelurahan">Tambah Kelurahan</a>

		<table class="bordered highlight centered responsive-table" id="tabel_kelurahan">
        <thead>
          <tr>
          	  <th>No.</th>
              <th>Nama Kelurahan</th>
              <th>Nama Kecamatan</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody>

        	@foreach($list_kelurahan as $kelurahan)

        		<tr>
        		<td>{{$loop->index+1}}</td>
        		<td>{{$kelurahan->nama_kelurahan}}</td>
        		<td>{{$kelurahan->nama_kecamatan}}</td>
            <td>{{$kelurahan->lat}}</td>
        		<td>{{$kelurahan->lng}}</td>
        		<td>
        			<a class='dropdown-button btn' href='#' data-activates='dropdown-{{$kelurahan->id_kelurahan}}'>Actions</a>

        			<!-- Dropdown Structure -->
				  <ul id='dropdown-{{$kelurahan->id_kelurahan}}' class='dropdown-content'>
				    <li data-idkelurahan="{{$kelurahan->id_kelurahan}}" class="li-edit"><a>Edit</a></li>
				    <li data-idkelurahan="{{$kelurahan->id_kelurahan}}" class="li-hapus"><a>Hapus</a></li>
				   
				  </ul>
        		</td>
        	</tr>

        	@endforeach

        	
          
        </tbody>
      </table>

	</div>

</div>

<!-- Modal Structure -->
  <div id="modal-tambah-kelurahan" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
      	<form class="col s12">

          <div class="input-field col s12">
          <select id="pilih_kecamatan">
            <option value="" disabled selected>Pilih Kecamatan</option>
              @foreach($list_kecamatan as $kecamatan)
                <option value="{{$kecamatan->id_kecamatan}}">{{$kecamatan->nama_kecamatan}}</option>
              @endforeach
          </select>
          <label>Materialize Select</label>
        </div>

      		<div class="input-field col s12">
      			<input type="text" name="nama_kelurahan" id="nama_kelurahan" class="validate">
      			<label for="nama_kecamatan">Nama Kelurahan</label>
      		</div>

      		<div class="input-field col s6">
      			<input type="number" name="latitude" id="latitude" class="validate">
      			<label for="latitude">Latitude</label>
      		</div>
			
			<div class="input-field col s6">
      			<input type="number" name="longitude" id="longitude" class="validate">
      			<label for="longitude">Longitude</label>
      		</div>

      	</form>
      </div>
    </div>
    <div class="modal-footer">
      <button class="modal-action modal-close waves-effect waves-red btn-flat">Batal</button>
    <button class="waves-effect waves-green btn-flat" id="btn-tambah-kelurahan">Simpan</button>
    </div>
  </div>

  <!-- Modal Structure -->
  <div id="modal-edit-kelurahan" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
      	<form class="col s12">

      		<input type="hidden" name="id_kelurahan" id="id_kelurahan">

      		<div class="input-field col s12">
          <select id="edit_pilih_kecamatan">
            <option value="" disabled selected>Pilih Kecamatan</option>
              @foreach($list_kecamatan as $kecamatan)
                <option value="{{$kecamatan->id_kecamatan}}">{{$kecamatan->nama_kecamatan}}</option>
              @endforeach
          </select>
          <label>Materialize Select</label>
        </div>

          <div class="input-field col s12">
            <input type="text" name="edit_nama_kelurahan" id="edit_nama_kelurahan" class="validate">
            <label for="nama_kecamatan">Nama Kelurahan</label>
          </div>

          <div class="input-field col s6">
            <input type="number" name="edit_latitude" id="edit_latitude" class="validate">
            <label for="latitude">Latitude</label>
          </div>
      
      <div class="input-field col s6">
            <input type="number" name="edit_longitude" id="edit_longitude" class="validate">
            <label for="longitude">Longitude</label>
          </div>

      	</form>
      </div>
    </div>
    <div class="modal-footer">
      <button class="modal-action modal-close waves-effect waves-red btn-flat">Batal</button>
    <button class="waves-effect waves-green btn-flat" id="btn-edit-kecamatan">Ganti</button>
    </div>
  </div>

 



@stop

@push('scripts')

 <script type="text/javascript" src="{{asset('js/dataTables.materialize.js')}}"></script>

	
	<script type="text/javascript">
		
		$(document).ready(function () {
			// body...
      var tabel_kelurahan = $('#tabel_kelurahan').DataTable({
          "scrollY":        "200px",
        "scrollCollapse": true,
      });

      $('#tabel_kelurahan tbody').on('click','.li-edit',function  () {
        // body...
          var id_kelurahan = $(this).data('idkelurahan');

         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kelurahan.fetch")}}',
                   data:{

                  'id_kelurahan':id_kelurahan
                   },
                   success:function(data){

                    console.log(data);

                      $('#id_kelurahan').val(data.id_kelurahan);

                      $('#edit_nama_kelurahan').val(data.nama_kelurahan);

                      $('#edit_latitude').val(data.lat);

                      $('#edit_longitude').val(data.lng);

                      $('#edit_pilih_kecamatan').val(data.id_kecamatan);



                      $('#modal-edit-kelurahan').modal('open');

                        Materialize.updateTextFields();

                         $('select').material_select();
                      
                     
                   }
                });
      });

    $('#tabel_kelurahan tbody').on('click','.li-hapus',function  () {
      // body...
        var id_kelurahan = $(this).data('idkelurahan');



         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kelurahan.hapus")}}',
                   data:{

                  'id_kelurahan':id_kelurahan
                   },
                   success:function(data){

                    if(data==1){
                      alert('Kelurahan berhasil dihapus');

                      location.reload();

                    }

                    else{
                      alert("Kelurahan tidak berhasil dihapus");
                    }
                     
                   }
                });
    });

			$('#btn-edit-kecamatan').click(function  () {
				// body...
				var id_kelurahan = $('#id_kelurahan').val();

        var id_kecamatan = $('#edit_pilih_kecamatan').val();

        var nama_kelurahan = $('#edit_nama_kelurahan').val();

        var lat = $('#edit_latitude').val();

        var lng = $('#edit_longitude').val();

				

						 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kelurahan.update")}}',
                   data:{

                 	
                  'id_kecamatan':id_kecamatan,
                  'id_kelurahan':id_kelurahan,
                 	'nama_kelurahan':nama_kelurahan,
                 	'lat':lat,
                 	'lng':lng
                   },
                   success:function(data){

                   	if(data==1){
                   		alert('Kelurahan berhasil diupdate');

                   		location.reload();

                   	}

                   	else{
                   		alert("Kelurahan tidak berhasil diupdate");
                   	}
                     
                   }
                });


			});
		

			$('#btn-tambah-kelurahan').click(function  () {
				// body...
				var id_kecamatan = $('#pilih_kecamatan').val();

				var lat = $('#latitude').val();

				var lng = $('#longitude').val();

        var nama_kelurahan = $('#nama_kelurahan').val();

				//alert(nama_kelurahan+" "+lat+" "+lng+" "+id_kecamatan);

				 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kelurahan.simpan")}}',
                   data:{
                  'id_kecamatan':id_kecamatan,
                  'nama_kelurahan':nama_kelurahan,
                  'lat':lat,
                  'lng':lng

                   },
                   success:function(data){
                      
                      if(data==1){
                        alert('Kelurahan berhasil disimpan');

                        location.reload();
                      }

                      else{
                        alert("Kelurahan tidak berhasil disimpan");
                      }

                   }
                });

			});
			
		});
	</script>

@endpush	