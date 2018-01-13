@push('meta')
<!-- Meta Tag -->
 <meta name="_token" content="{{ csrf_token() }}">
@endpush 

@extends('layouts.default')

@section('content')



<div class="row" style="margin-top:15px;" id="div_kecamatan">

	<div class="col s8">


		<a class="waves-effect waves-light modal-trigger btn" href="#modal-tambah-kecamatan">Tambah Kecamatan</a>

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

    <table class="bordered highlight centered responsive-table" id="tabel_kecamatan">
        <thead>
          <tr>
          	  <th>No.</th>
              <th>Nama Kecamatan</th>
              <th>Luas Wilayah (Km2)</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody class="list">

        	@foreach($list_kecamatan as $kecamatan)

        		<tr>
        		<td>{{$loop->index+1}}</td>
        		<td class="nama_kecamatan">{{$kecamatan->nama_kecamatan}}</td>
            <td>{{$kecamatan->luas_wilayah_km2}}</td>
        		<td>{{$kecamatan->lat}}</td>
        		<td>{{$kecamatan->lng}}</td>
        		<td>
        			<a class='dropdown-button btn' href='#' data-activates='dropdown-{{$kecamatan->id_kecamatan}}'>Actions</a>

        			<!-- Dropdown Structure -->
				  <ul id='dropdown-{{$kecamatan->id_kecamatan}}' class='dropdown-content'>
				    <li data-idkecamatan="{{$kecamatan->id_kecamatan}}" class="li-edit"><a>Edit</a></li>
				    <li data-idkecamatan="{{$kecamatan->id_kecamatan}}" class="li-hapus"><a>Hapus</a></li>
				   
				  </ul>
        		</td>
        	</tr>

        	@endforeach

        	
          
        </tbody>
      </table>

      <div class="row">
        
        <div class="center-align">
          {{$list_kecamatan->links('paginator.default')}}
        </div>
       
      </div>

      

	</div>

</div>

<!-- Modal Structure -->
  <div id="modal-tambah-kecamatan" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
      	<form class="col s12">

      		<div class="input-field col s6">
      			<input type="text" name="nama_kecamtan" id="nama_kecamatan" class="validate">
      			<label for="nama_kecamatan">Nama Kecamatan</label>
      		</div>

        <div class="input-field col s6">
            <input type="number" name="luas_wilayah" id="luas_wilayah" class="validate">
            <label for="luas_wilayah">Luas Wilayah</label>
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
    <button class="waves-effect waves-green btn-flat" id="btn-tambah-kecamatan">Ganti</button>
    </div>
  </div>

  <!-- Modal Structure -->
  <div id="modal-edit-kecamatan" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
      	<form class="col s12">

      		<input type="hidden" name="id_kecamatan" id="id_kecamatan">
      		<div class="input-field col s12">
      			<input type="text" name="edit_nama_kecamtan" id="edit_nama_kecamatan" class="validate">
      			<label for="nama_kecamatan">Nama Kecamatan</label>
      		</div>

            <div class="input-field col s6">
            <input type="number" name="edit_luas_wilayah" id="edit_luas_wilayah" class="validate">
            <label for="edit_luas_wilayah">Luas Wilayah</label>
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
	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

	<script type="text/javascript">
		
		$(document).ready(function () {
			// body...

       var options = {
        valueNames: [ 'nama_kecamatan']
    };

    var listKecamatan = new List('div_kecamatan', options);
   
$('.li-edit').click(function  () {
  // body...
    var id_kecamatan = $(this).data('idkecamatan');

         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kecamatan.fetch")}}',
                   data:{

                  'id_kecamatan':id_kecamatan
                   },
                   success:function(data){

                    console.log(data);

                      $('#id_kecamatan').val(data.id_kecamatan);

                      $('#edit_nama_kecamatan').val(data.nama_kecamatan);

                      $('#edit_latitude').val(data.lat);

                      $('#edit_longitude').val(data.lng);

                      $('#edit_luas_wilayah').val(data.luas_wilayah_km2);



                      $('#modal-edit-kecamatan').modal('open');

                        Materialize.updateTextFields();
                      
                     
                   }
                });

});

$('.li-hapus').click(function  () {
  // body...
     var id_kecamatan = $(this).data('idkecamatan');

         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kecamatan.hapus")}}',
                   data:{

                  'id_kecamatan':id_kecamatan
                   },
                   success:function(data){

                    if(data==1){
                      alert('Kecamatan berhasil dihapus');

                      location.reload();

                    }

                    else{
                      alert("Kecamatan tidak berhasil dihapus");
                    }
                     
                   }
                });
});


			$('#btn-edit-kecamatan').click(function  () {
				// body...
				var id_kecamatan = $('#id_kecamatan').val();

				var nama_kecamatan = $('#edit_nama_kecamatan').val();

				var lat = $('#edit_latitude').val();

				var lng = $('#edit_longitude').val();

        var luas_wilayah_km2 = $('#edit_luas_wilayah').val();

						 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kecamatan.update")}}',
                   data:{

                 	'id_kecamatan':id_kecamatan,
                 	'nama_kecamatan':nama_kecamatan,
                  'luas_wilayah_km2':luas_wilayah_km2,
                 	'lat':lat,
                 	'lng':lng
                   },
                   success:function(data){

                   	if(data==1){
                   		alert('Kecamatan berhasil diupdate');

                   		location.reload();

                   	}

                   	else{
                   		alert("Kecamatan tidak berhasil diupdate");
                   	}
                     
                   }
                });


			});

			

			$('#btn-tambah-kecamatan').click(function  () {
				// body...
				var nama_kecamatan = $('#nama_kecamatan').val();

				var lat = $('#latitude').val();

				var lng = $('#longitude').val();

        var luas_wilayah_km2 = $('#luas_wilayah').val();

				//alert(nama_kecamatan+" ");

				 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.list_kecamatan.simpan")}}',
                   data:{

                  'nama_kecamatan':nama_kecamatan,
                  'luas_wilayah_km2':luas_wilayah_km2,
                  'lat':lat,
                  'lng':lng

                   },
                   success:function(data){
                      
                      if(data==1){
                        alert('Kecamatan berhasil disimpan');

                        location.reload();
                      }

                      else{
                        alert("Kecamatan tidak berhasil disimpan");
                      }

                   }
                });

			});
			
		});
	</script>

@endpush	