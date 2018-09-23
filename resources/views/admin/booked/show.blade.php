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
            <div class="container">
            <div class="box-body">
	<div id="event">
			<table class="table table-hover table-striped">
					<tr>
						<th>Nama Event</th>
						<td>{{ $event->namaEvent }}</td>
					</tr>

					<tr>
						<th>Deskripsi</th>
						<td>{{ $event->deskEvent }}</td>
					</tr>

					<tr>
						<th>Tanggal Mulai</th>
						<td>{{ $event->tanggalMulai }}</td>
					</tr>
					<tr>	
						<th>Tanggal Selesai</th>
						<td>{{ $event->tanggalSelesai }}</td>
					</tr>
					<tr>
						<th>Gambar</th>
						<td>
							@if(isset($event->gambar))
								<img class="thumbnail" src="{{ asset('gambarupload/'. $event->gambar) }}" height="400" width="800">
							@endif
						</td>
					</tr>
			</table>
	</div>
	            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          </div>
          </div>
	</div>
@stop