@extends('template')

@section('content')
<div class="row">
        <div class="col-xs-12">
    		<section class="content-header">
		  		<h1>
		    		Tambah 
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
	<div id="fasilitas">
		{{-- 'files' menambahkan multipart/form-data --}}
		{!! Form::open(['url' => 'fasilitas', 'files' => true]) !!}
			@include('admin.fasilitas.form', ['submitButtonText' => 'Tambah Fasilitas'])
		{!! Form::close() !!}
	</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          </div>
          </div>
	</div>
@endsection