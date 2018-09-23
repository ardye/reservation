@extends('template')

@section('content')
	<div class="row">
        <div class="col-xs-12">
    		<section class="content-header">
		  		<h1>
		    		Data 
		    		<small>{{ ucwords($halaman) }}</small>
		  		</h1>
		 		 <ol class="breadcrumb">
		    		<li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		    		<li class="active">{{ ucwords($halaman) }}</li>
      			</ol>
    		</section>
         	
         	<div class="box">
            	<div class="box-header"></div>

            	<div class="container">
                  {{ link_to('menu/create','&nbsp; Tambah Data', ['id' => 'tambahMenu', 'class' => 'btn btn-success btn-lg btn-flat fa fa-plus', 'title' => 'Tambah']) }}
	            </div>
	            <br />
	                      <div class="col-sm-12">
          @include('_partial/flash_message')
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="menu" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama Menu</th>
                  <th>Detail</th>
                  <th>Aksi</th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          </div>

    <div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title"></h4>
  				</div>
  				<div class="modal-body">
  					<div class="deleteContent">
  						Apakah anda ingin menghapus data <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn btn-flat actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='fa'> </span>
  						</button>
  						<button type="button" class="btn btn-warning btn-flat" data-dismiss="modal">
  							<span class='fa fa-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
		  </div>
      </div>
@endsection

@section('js')
	<script>
      	$(function() {
            var no = 0;
           	var table = $('#menu').DataTable({
              language: {
                processing: "<img src='{{ asset("loading/spinner.gif") }}' heigt='50' width='50'> Loading...",
              },
           		processing: true,
               	serverSide: true,
               	ajax: "{{ url('dataMenu') }}",
                columns: [
                  { data: 'gambar', name: 'gambar', render: function(data,type,row){
                    return '<img src="gambarupload/'+data+'" height="50" width="100">';
                  }},
                  { data: 'namaMenu', name: 'namaMenu'},
                  { data: 'deskMenu', name: 'deskMenu'},
                  { data: 'action', name: 'action', 'searchable': false, 'orderable': false}
                ]
              });

           	$('div.alert').not('.alert-important').delay(3000).slideUp(300);

        	$(document).on('click', '.delete-modal', function() {
        		$('#footer_action_button').text(" Delete");
        		$('#footer_action_button').removeClass('fa-check');
        		$('#footer_action_button').addClass('fa-trash');
        		$('.actionBtn').removeClass('btn-success');
        		$('.actionBtn').addClass('btn-danger');
        		$('.actionBtn').addClass('delete');
        		$('.modal-title').text('Delete');
       		 	$('.did').text($(this).data('id'));
        		$('.deleteContent').show();
        		$('.form-horizontal').hide();
        		$('.dname').html($(this).data('name'));
        		$('#myModal').modal('show');
    		});

    		$('.modal-footer').on('click', '.delete', function() {
        	$.ajax({
            type: 'post',
            url: '{{ url('hapusMenu') }}',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': $('.did').text()
            },
            success: function(data) { 
				      location.href = '{{ url('/menu') }}';
            }
        	});
    });
      	});
   	</script>
@endsection