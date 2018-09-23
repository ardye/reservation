@extends('template')

@section('content')
<div class="row">
        <div class="col-xs-12">
    		<section class="content-header">
		  		<h1>
		    		Detail 
		    		<small>{{ ucwords($halaman) }}</small>
		  		</h1>
		 		 <ol class="breadcrumb">
		    		<li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		    		<li class="active">{{ ucwords($halaman) }}</li>
      			</ol>
    		</section>
         	
         	<div class="box">
            	<div class="box-header"></div>
            <div class="box-body">
	<div id="menu">
			<table class="table table-hover table-striped">
					<tr>
						<th>Nama Menu</th>
						<td>{{ $menu->namaMenu }}</td>
					</tr>

					<tr>
						<th>Deskripsi</th>
						<td>{{ $menu->deskMenu }}</td>
					</tr>

					<tr>
						<th>Rating</th>
						<td>{{ $menu->rating }}</td>
					</tr>
					<tr>	
						<th>Harga</th>
						<td>Rp. {{ number_format($menu->harga) }}</td>
					</tr>
					<tr>
						<th>Gambar</th>
						<td>
							@if(isset($menu->gambar))
								<img class="thumbnail" src="{{ asset('gambarupload/'. $menu->gambar) }}" height="200" width="200">
							@endif
						</td>
					</tr>
			</table>
	</div>
	@if(count($menu->user) != 0)
		<div class="box box-primary direct-chat direct-chat-primary">

            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
              
                @foreach($menu->user as $review)
                		<div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">{{ $review->namaUser }}</span>
                    <span class="direct-chat-timestamp pull-right">Rating: <mark>{{ $review->pivot->rating }}</mark></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="{{ asset('gambarupload/'.$review->gambar)}}" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                  	<div class="pull-right">
                  		<button class='delete-modal btn btn-danger btn-xs btn-flat' data-id='{{$review->pivot->idReview}}' data-name='{{ $review->username}}'>
                            <i class='fa fa-trash'></i>
                        </button></div>
                    {{ $review->pivot->review }}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
                @endforeach

              </div>
              <!--/.direct-chat-messages-->
            </div>
            <!-- /.box-body -->
          </div>
          <!--/.direct-chat -->
	            <!-- /.box-body -->
	            @endif
          </div>
          <!-- /.box -->
          </div>
          </div>
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
  						Apakah anda ingin menghapus review <span class="dname"></span> ? <span
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
@stop

@section('js')
	<script>
      	$(function() {
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
            url: '{{ url('deleteReview') }}',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': $('.did').text()
            },
            success: function(data) { 
				      location.href = '{{ url('/menu/'. $menu->idMenu) }}';
            }
        	});
    });
      	});
   	</script>
@endsection