@extends('layouts.default')

@section('content')



<div class="row" style="margin-">


	  
	  <div id="arho-swipe" class="col s12" style="margin-top:15px;">


	  	<a class="waves-effect waves-light modal-trigger btn" href="#modal-tambah-arho">Tambah Arho</a>

      <div class="row">
          <form class="col s12">

             <div class="input-field col s6">
        <!--   <input  id="search_field" type="text" class="validate">
          <label for="search_field">Search</label> -->
        </div>

         <div class="input-field col s6">
          <input  id="search_field" type="text" class="validate search">
          <label for="search_field">Search</label>
        </div>

          </form>
      </div>

          @php
            $puter = ($list_arho->currentPage()-1)* $list_arho->perPage() + 1;
          @endphp
           

	  	<table  id="tabel_daftar_arho">
        <thead>
          <tr>
          	  <th>No.</th>
          	  <th>Avatar</th>
              <th>Nama</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody class="list">

        	@foreach($list_arho as $arho)

        		<tr>
        			<td>{{$puter++}}</td>

        			@if(strlen($arho->avatar)==0)
        			<td>
        				<img class="responsive-img" src="{{url('/images/worker.png')}}" style="width:80px;">
        			</td>
        			@endif

        			@if(strlen($arho->avatar)>0)
        				<td>
        				<img class="responsive-img" src="{{$arho->avatar}}">
        			</td>
        			@endif
        			<td class="nama_arho">

              {{$arho->nama_lengkap}}

                </td>
        		
        			<td>
               
        				<a class='dropdown-button btn' data-activates='dropdown-arho-{{$arho->id_arho}}'>Actions</a>

        			<!-- Dropdown Structure -->
						  <ul id='dropdown-arho-{{$arho->id_arho}}' class='dropdown-content'>
						    <li data-idarho="{{$arho->id_arho}}" class="li-arho-detail"><a>Detail</a></li>
                <li data-idarho="{{$arho->id_arho}}" class="li-arho-edit"><a>Edit</a></li>
						    <li data-idarho="{{$arho->id_arho}}" class="li-arho-hapus"><a>Hapus</a></li>

						  </ul>
        			</td>
        		</tr>

        	@endforeach
        </tbody>

      </table>

      <div class="row">

      <div class="col s4">
      </div>

      <div class="col s4">
        {{$list_arho->links('paginator.default')}}
      </div>

      <div class="col s4">
      </div>

      

      </div>
	  </div>
	  
	</div>
  
<!-- Modal Structure -->
  <div id="modal-pilih-detail-arho" class="modal">
    <div class="modal-content">
      <div class="center-align">

          <input type="hidden" id="detail-id-arho">
          <p><b>Detail Arho<b></p>
          <p><b>Silakan pilih Untuk melihat detail arho dengan tombol dibawah ini</b></p>
      </div>
      
    </div>
    <div class="modal-footer">

     
   
      <a href="#!" class="waves-effect waves-green btn-flat" id="btn-arho-customer">Daftar Customer</a>
      <a href="#!" class="waves-effect waves-green btn-flat" id="btn-arho-wilayah">Daftar Wilayah</a>
    </div>
  </div>

<!-- Modal Structure -->
  <div id="modal-edit-arho" class="modal">
    <div class="modal-content">
          
          <div class="row">
            <form class="col s12">

              <input type="hidden" name="edit_id_arho" id="edit_id_arho">
            
                <div class="input-field col s12">
                
                  <input id="edit_nama_lengkap" name="edit_nama_lengkap" type="text" class="validate">
                  <label for="edit_nama_lengkap">Nama Lengkap</label>
               
             
            </div>


              <div class="input-field col s6">
                
                <input id="edit_avatar_path" name="avatar_path" type="text" class="validate">
                <label for="edit_avatar_path">Avatar</label>
              </div>

              <div class="col s6">
                <button type="button" class="waves-effect waves-red btn-flat">Browse...</button>
              </div>

               

             <input type="hidden" id="id_kelurahan_penugasan" name="id_kelurahan_penugasan">

          <div class="input-field col s12">
            <input placeholder="Tgl Input" id="tgl_input_penugasan" name="tgl_input_penugasan" type="text"
            class="datepicker"
            >

            <label for="tgl_input_penugasan">Tgl Input</label>
          </div>

          <input type="hidden" name="id_penugasan_arho" id="id_penugasan_arho">

          <div class="col s12" style="margin-bottom:15px;">
            <a class="waves-effect waves-light btn" id="btn-tambah-penugasan-edit">Tambah Penugasan</a>
          </div>

          

          <div id="tambah_penugasan_arho" style="display:none;">

            <div class="input-field col s12">

              <select multiple id="edit_wilayah">

                @for($i=0; $i < count($list_kelurahan_kecamatan); $i++)

                  @php
                    $kecamatan = $list_kelurahan_kecamatan[$i];

                    $list_kelurahan = $kecamatan['kelurahan'];
                  @endphp

                  <optgroup label="Kecamatan {{$kecamatan['nama_kecamatan']}}">

                      @for($j=0;$j < count($list_kelurahan); $j++)
                         <option value="{{$list_kelurahan[$j]['id_kelurahan']}}">{{$list_kelurahan[$j]['nama_kelurahan']}}</option>
                      @endfor
                     
                  </optgroup>

                @endfor
               
              </select>
              <label>Wilayah Penugasan</label>


              
          </div>

            

          </div>


          <ul class="collection with-header" id="list_penugasan_arho">

          </ul>


            </form>
          </div>

    </div>
    <div class="modal-footer">
  <button class="modal-action modal-close waves-effect waves-red btn-flat">Batal</button>
  <button class="waves-effect waves-green btn-flat" id="btn-edit-arho">Simpan</button>
    
    </div>
  </div>



<!-- Modal Structure -->
  <div id="modal-tambah-arho" class="modal">
    <div class="modal-content">
          
          <div class="row">
            <form class="col s12">

           
                <div class="input-field col s12">
               
                  <input id="nama_lengkap" name="nama_lengkap" type="text" class="validate">
                  <label for="nama_lengkap">Nama</label>
                </div>
          
           
             <div class="input-field col s12">
              <input type="text" class="datepicker" id="tgl_input">
              <label>Tanggal Input</label>
          </div>

            <div class="input-field col s12">

              <select multiple id="wilayah">

                @for($i=0; $i < count($list_kelurahan_kecamatan); $i++)

                  @php
                    $kecamatan = $list_kelurahan_kecamatan[$i];

                    $list_kelurahan = $kecamatan['kelurahan'];
                  @endphp

                  <optgroup label="Kecamatan {{$kecamatan['nama_kecamatan']}}">

                      @for($j=0;$j < count($list_kelurahan); $j++)
                         <option value="{{$list_kelurahan[$j]['id_kelurahan']}}">{{$list_kelurahan[$j]['nama_kelurahan']}}</option>
                      @endfor
                     
                  </optgroup>

                @endfor
               
              </select>
              <label>Wilayah Penugasan</label>


              
          </div>


            <div class="row">

              <div class="input-field col s6">
                <i class="material-icons prefix">insert_drive_file</i>
                <input id="avatar_path" name="avatar_path" type="text" class="validate">
                <label for="avatar_path">Avatar</label>
              </div>

              <button type="button" class="waves-effect waves-red btn-flat">Browse...</button>

            </div>



            </form>
          </div>

    </div>
    <div class="modal-footer">
  <button class="modal-action modal-close waves-effect waves-red btn-flat">Batal</button>
  <button class="waves-effect waves-green btn-flat" id="btn-tambah-arho-baru">Simpan</button>
    
    </div>
  </div>


@stop

@push('scripts')

<!-- <script type="text/javascript" src="{{asset('js/dataTables.materialize.js')}}"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

<script type="text/javascript">

function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}

function is_exist_id_kecamatan (arr_obj, id_kecamatan) {
  // body...
  for(var i=0;i<arr_obj.length;i++){
    if(arr_obj[i].id_kecamatan == id_kecamatan){
      return true;
    }
  }

  return false;
}

function match_with_penugasan (id_kelurahan,penugasan_arho) {
  // body...
  for(var i=0;i<penugasan_arho.length;i++){
    var item = penugasan_arho[i];

    if(item.id_kelurahan==id_kelurahan)
      return true;
  }

  return false;
}

function insert_kelurahan_in_kecamatan (arr_obj,obj_kelurahan) {
  // body...
  for(var i=0;i<arr_obj.length;i++){
     
     var obj_kecamatan = arr_obj[i];

     if(obj_kecamatan.id_kecamatan == obj_kelurahan.id_kecamatan){
        obj_kecamatan.kelurahan.push(obj_kelurahan);
     }

  }
}

function hapusPenugasanArho (event) {
  // body...
 
 var url = event.getAttribute('href');

 var id_arho = event.getAttribute('data-idarho');

 var id_kecamatan = event.getAttribute('data-idkecamatan');

 var id_kelurahan = event.getAttribute('data-idkelurahan');

  $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

         $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.hapus_penugasan")}}',
                   data:{

                    'id_arho':id_arho,
                    'id_kelurahan':id_kelurahan


                   },
                   success:function(data){
                      if(data==1){
                        alert('Penugasan berhasil dihapus');

                        location.reload();
                      }

                      else{
                        alert('Penugasan tidak berhasil dihapus');
                      }
                   }
                });

//alert(id_arho+" "+id_kelurahan);

 return false;

}



  $(document).ready(function () {
    // body..
    $("#link_nama_arho").click(function  () {
      // body...
      alert('tet');
    });
    $('#btn-arho-wilayah').click(function  () {
      // body...
      var id_arho  =$('#detail-id-arho').val();
      var url = '{{ route("admin.detail_arho", [":pilihan",":id_arho"]) }}';
    url = url.replace(':pilihan', 2);
    url = url.replace(':id_arho', id_arho);

       $('#modal-pilih-detail-arho').modal('close');
    
    var win = window.open(url, '_blank');
if (win) {
    //Browser has allowed it to be opened
    win.focus();
} else {
    //Browser has blocked it
    alert('Please allow popups for this website');
}

      
   
    });

    $('#btn-arho-customer').click(function  () {
      // body...

      $('#modal-pilih-detail-arho').modal('close');
    });
    $('.li-arho-detail').click(function  () {
      // body...
      var id_arho = $(this).data('idarho');

      $('#detail-id-arho').val(id_arho);

        $('#modal-pilih-detail-arho').modal('open');
    });

    $('#btn-tambah-penugasan-edit').click(function  () {
      // body...
      $('#tambah_penugasan_arho').toggle();
    
    });
    
    var options = {
        valueNames: [ 'nama_arho']
    };

    var arhoList = new List('arho-swipe', options);
    

 $('.li-arho-edit').click(function  () {
   // body...
    $('#list_penugasan_arho').empty();
     var id_arho = $(this).data('idarho');

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.get_arho_by_id")}}',
                   data:{

                    'id_arho':id_arho


                   },
                   success:function(data){
                      
                      var arho = data.arho;

                      var penugasan_arho = data.penugasan_arho;

                      console.log('ken');

                      console.log(penugasan_arho);

                      // fill master info arho

                      $('#edit_id_arho').val(arho[0].id_arho);

                      $('#edit_nama_lengkap').val(arho[0].nama_lengkap);

                      
                      // fill info penugasan

                    if(data.penugasan_arho.length > 0){

                        $('#tgl_input_penugasan').val(penugasan_arho[0].tgl_input);


                        // iterate
                          
                        var arr_id_kecamatan = [];

                        var arr_obj_kecamatan = [];



                        for(var i=0;i<data.penugasan_arho.length;i++){

                          

                          var item = penugasan_arho[i];

                          var obj = {
                            'id_penugasan_arho':item.id_penugasan_arho,
                            'id_kecamatan':item.id_kecamatan,
                            'nama_kecamatan':item.nama_kecamatan,
                            'id_arho':arho[0].id_arho,
                            'kelurahan':[]

                          };

                          if(!is_exist_id_kecamatan(arr_obj_kecamatan,item.id_kecamatan)){
                            arr_obj_kecamatan.push(obj);  
                          }

                          arr_id_kecamatan.push(item.id_kecamatan);

                          

                        }

                        console.log('zaf');
                        console.log(arr_obj_kecamatan);
                        // get unique id kecamatan

                        var unique = arr_id_kecamatan.filter( onlyUnique ); // returns ['a', 1, 2, '1']

                         
                        
                        // select kecamatan based on array

                        // $('#edit_kecamatan').val(unique);

                       $('#edit_kecamatan').material_select();

                       // fetch kelurahan by id kecamatan

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                   $.ajax({
                             type:'POST',
                             url:'{{route("admin.informasi_arho.fetch_kelurahan")}}',
                             data:{

                              'arr_id_kecamatan':unique


                             },
                             success:function(data){

                              //console.log(data);

                             // var info_penugasan_arho = arr_obj_kecamatan;

                              // clear 

                             
                               
                               // populate select list by iterating over data

                               var arr_id_kelurahan = [];

                               for(var i=0;i<data.length;i++){
                                 
                                 var item = data[i];


                                 var obj_kelurahan = {

                                  'id_kelurahan':item.id_kelurahan,
                                  'nama_kelurahan':item.nama_kelurahan,
                                  'id_kecamatan':item.id_kecamatan

                                 };


                                if(match_with_penugasan(item.id_kelurahan,penugasan_arho)){
                                 insert_kelurahan_in_kecamatan(arr_obj_kecamatan,obj_kelurahan);
                                  arr_id_kelurahan.push(item.id_kelurahan);
 
                                }
                                 

                                 //alert(item.id_kelurahan);

                                 var select_var = "<option value='"+item.id_kelurahan+"'>"+item.nama_kelurahan+"</option>";

                                

                                // $('#edit_kelurahan').append(select_var)


                               }

                             //  console.log(info_penugasan_arho);

                               // populate list penugasan arho

                               $('#list_penugasan_arho').empty();

                               var info_penugasan_arho = arr_obj_kecamatan;

                               for(var a = 0; a < info_penugasan_arho.length; a++){
                                
                                var header = info_penugasan_arho[a].nama_kecamatan;

                                var item_kecamatan = info_penugasan_arho[a];
                                  
                                  var append_str = "<li class='collection-header'>"+"<p><b> Kecamatan "+header+"</b></p>"+"</li>";

                                  var arr_kelurahan = info_penugasan_arho[a].kelurahan;

                                  var no_arho = info_penugasan_arho[a].id_arho;

                                  for(var b=0;b<arr_kelurahan.length;b++){
                                    
                                    var item_kelurahan = arr_kelurahan[b].nama_kelurahan;

                                    //append_str+='<div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>'

                                    append_str += "<li class='collection-item'>"+"<div>"+item_kelurahan+"<a href='#!'"+"data-idkecamatan='"+item_kecamatan.id_kecamatan+"'"
                                    +"data-idarho='"+no_arho+"'"+"data-idkelurahan='"+arr_kelurahan[b].id_kelurahan+"'"

                                    +"onclick='return hapusPenugasanArho(this); return false;' class='secondary-content'>"
                                    +"<i class='material-icons'>delete_forever</i></a></div>"+"</li>";

                                  }

                                  $("#list_penugasan_arho").append(append_str);
                               }

                               //console.log(arr_id_kelurahan);
                               //$('#edit_wilayah').val(arr_id_kelurahan);



                               $('select').material_select();

                         

                             }
                          });


                    }
                  


                       Materialize.updateTextFields();

                      $('#modal-edit-arho').modal('open');

                   }
                });

 });


$('.hello').click(function  () {
  // body...

  alert('lol');
});
$('.li-arho-hapus').click(function  () {
  // body...
       var id_arho = $(this).data('idarho');

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

         $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.hapus")}}',
                   data:{

                    'id_arho':id_arho


                   },
                   success:function(data){
                      if(data==1){
                        alert('Arho berhasil dihapus');

                        location.reload();
                      }

                      else{
                        alert('Akun tidak berhasil dihapus');
                      }
                   }
                });
});

    $('#btn-simpan-edit-penugasan').click(function () {
      
      // body...

      var id_kelurahan = $('#id_kelurahan_penugasan').val();

      var tgl_input = $('#tgl_input_penugasan').val();

      var arho = $('#edit_pilih_arho').val();

       $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.update_penugasan_arho")}}',
                   data:{

                   'id_kelurahan':id_kelurahan,
                   'tgl_input':tgl_input,
                   'arho':arho

                   },
                   success:function(data){
                      
                      if(data==1){
                        alert('Penugasan arho berhasil diedit');

                        location.reload();
                      }

                      else{
                        alert("penugasan arho tidak berhasil diedit");
                      }

                   }
                });


    });
    $('.btn-edit-penugasan').click(function () {
      // body...
      var id_kelurahan = $(this).data('idkelurahan');

      $('#id_kelurahan_penugasan').val(id_kelurahan);

       $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.get_info_penugasan")}}',
                   data:{

                    'id_kelurahan':id_kelurahan

                   },
                   success:function(data){
                      
                     var info_penugasan_kelurahan = data;

                     $.ajaxSetup({
                        headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });

                      $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.fetch_list_arho")}}',
                   data:{

                   },
                   success:function(data){
                      
                    $('#id_edit_kelurahan_penugasan').val(info_penugasan_kelurahan[0].id_kelurahan);

                     $('#nama_kelurahan_penugasan').val(info_penugasan_kelurahan[0].nama_kelurahan);

                     $('#tgl_input_penugasan').val(info_penugasan_kelurahan[0].tgl_input);

                     $('#edit_pilih_arho').empty();

                      var select_var = "<option disabled selected>Pilih Arho</option>";

                      $('#edit_pilih_arho').append(select_var);

                      var arr_id_arho = [];

                     for(var i=0;i<data.length;i++){
                      
                      var arho = data[i];

                      select_var = "<option value='"+arho.id_arho+"'>"+arho.nama_lengkap+"</option>";

                      for(var x = 0; x < info_penugasan_kelurahan.length;x++){
                        if(arho.id_arho == info_penugasan_kelurahan[x].id_arho){
                          arr_id_arho.push(arho.id_arho);
                        }
                      }

                      $('#edit_pilih_arho').append(select_var);

                     }

                 
                     $('#edit_pilih_arho').val(arr_id_arho);

                     $('select').material_select();

               
                       

                     $('#modal-edit-penugasan-arho').modal('open');

                   }
                });

                     

                   }
                });


      

     
    });
    $('#btn-tambah-penugasan-arho').click(function() {
      // body...
      var tgl_input = $('#tgl_input').val();

      var id_arho = $('#arho').val();

      var kecamatan = $('#kecamatan').val();

      var kelurahan = $('#kelurahan').val();




      $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


      $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.simpan_penugasan")}}',
                   data:{

                   'tgl_input':tgl_input,
                   'id_arho':id_arho,
                   'kecamatan':kecamatan,
                   'kelurahan':kelurahan


                   },
                   success:function(data){
                      
                      if(data==1){
                        alert('Penugasan arho berhasil ditambahkan');

                        location.reload();
                      }

                      else{
                        alert("penugasan arho tidak berhasil ditambahkan");
                      }

                   }
                });

      
    
    });
    $('#kecamatan').on('change',function  () {
      // body...
        var id_kecamatan = $('#kecamatan').val();

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.get_kelurahan_by_kecamatan")}}',
                   data:{

                   'id_kecamatan':id_kecamatan


                   },
                   success:function(data){
                      
                      for(var i=0;i<data.length;i++){

                        var kelurahan = data[i];

                        var str = "<option value='"+kelurahan.id_kelurahan+"'>"+data.nama_kelurahan+"</option>";

                        $('#kelurahan').append($('<option>', {
                            value: kelurahan.id_kelurahan,
                            text: kelurahan.nama_kelurahan
}                       ));

                      }

                      $('select').material_select();

                   }
                });

        
    });

  $('#edit_kecamatan').on('change',function  () {
      // body...
        var id_kecamatan = $('#edit_kecamatan').val();

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.get_kelurahan_by_kecamatan")}}',
                   data:{

                   'id_kecamatan':id_kecamatan


                   },
                   success:function(data){

                  $("#edit_kelurahan").empty();
                      
                      for(var i=0;i<data.length;i++){

                        var kelurahan = data[i];

                        var str = "<option value='"+kelurahan.id_kelurahan+"'>"+data.nama_kelurahan+"</option>";

                        $('#edit_kelurahan').append($('<option>', {
                            value: kelurahan.id_kelurahan,
                            text: kelurahan.nama_kelurahan
}                       ));

                      }

                      $('select').material_select();

                   }
                });

        
    });

    $('#btn-edit-arho').click(function () {
      // body...

      var id_arho = $('#edit_id_arho').val();

      var nama_lengkap = $('#edit_nama_lengkap').val();

      

      var avatar_path = $('#edit_avatar_path').val();

      var arr_kelurahan = $('#edit_wilayah').val();

      var tgl_input = $('#tgl_input_penugasan').val();

      //alert(edit_wilayah);
     

      $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

      $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.update")}}',
                   data:{

                    'id_arho':id_arho,
                    'nama_lengkap':nama_lengkap,
                    'avatar_path':avatar_path,
                    'arr_kelurahan':arr_kelurahan,
                    'tgl_input':tgl_input



                   },
                   success:function(data){
                      
                      if(data==1){
                        
                        alert('Arho berhasil diupdate');

                        location.reload();

                      }

                      else{
                        alert('Arho tidak berhasil diedit');
                      }

                   }
                });
  
    });

  
  
      $('#btn-tambah-arho-baru').click(function () {
        // body...

        var nama_lengkap = $('#nama_lengkap').val();

        // var nama_panggilan = $('#nama_panggilan').val();

        var avatar_path = "";

        var tgl_input = $('#tgl_input').val();

      //var id_arho = $('#arho').val();

      var arr_kelurahan = $('#wilayah').val();

      console.log(arr_kelurahan);

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        $.ajax({
                   type:'POST',
                   url:'{{route("admin.informasi_arho.simpan")}}',
                   data:{

                   'nama_lengkap':nama_lengkap,
                   'avatar_path':avatar_path,
                   'tgl_input':tgl_input,
                   'arr_kelurahan':arr_kelurahan

                   },
                   success:function(data){
                      if(data==1){
                        alert('Arho berhasil ditambahkan');

                        location.reload();
                      }

                      else{
                        alert('Akun tidak berhasil ditambahkan');
                      }
                   }
                });

      });

  });
</script>

@endpush