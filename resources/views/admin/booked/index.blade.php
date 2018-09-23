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
                  {{ link_to('booked/create','&nbsp; Tambah Data', ['id' => 'tambahBooking', 'class' => 'btn btn-success btn-lg btn-flat fa fa-plus', 'title' => 'Edit']) }}
	            </div>
	            <br />
	                      <div class="col-sm-12">
          @include('_partial/flash_message')
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="booked" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Telepon</th>
                  <th>Jumlah</th>
                  <th>Jenis Booking</th>
                  <th>Status</th>
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
  						Apakah anda ingin menghapus pesanan <span class="dname"></span> ? <span
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
@endsection

@section('js')
	<script>
      	$(function() {
            var no = 0;
           	var table = $('#booked').DataTable({
                            language: {
                processing: "<img src='{{ asset("loading/spinner.gif") }}' heigt='50' width='50'> Loading...",
              },
           		processing: true,
               	serverSide: true,
               	ajax: "{{ url('dataBooked') }}",
                columns: [
                  { data: 'user.nama', name: 'user.nama'},
                  { data: 'waktu', name: 'review.waktu', render: function(data){
                    var date = new Date(data);
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    var day = date.getDate();
                    return ("0"+day).slice(-2) + '-' + ("0"+month).slice(-2) + '-' + year + ' '+("0"+date.getHours()).slice(-2)+':'+("0"+date.getMinutes()).slice(-2);
                  }, 'searchable': false, 'orderable': false},
                  { data: 'user.telepon', name: 'user.telepon'},
                  { data: 'jumlah', name: 'booking.jumlah'},
                  { data: 'jenis', name: 'booking.jenis'},
                  { mData: function(data, type, row){
                    if(data.status == 'Booked'){
                      return '<a href="status/'+data.idBooking+'"><button class="btn btn-flat btn-default">'+data.status+'</button></a>';
                    }
                    else {
                      return data.status;
                    }
                  }, 'searchable': false, 'orderable': false},
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
            url: '{{ url('hapusBooked') }}',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': $('.did').text()
            },
            success: function(data) { 
				      location.href = '{{ url('/booked') }}';
            }
        	});
    });
      	});
   	</script>
@endsection