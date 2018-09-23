@extends('template')

@section('content')
	<div class="row">
        <div class="col-xs-12">
    		<section class="content-header">
		  		<h1>
		  		{{ ucwords($halaman) }}
		  		</h1>
		 		 <ol class="breadcrumb">
		    		<li class="active"><i class="fa fa-dashboard"></i> Home</li>
      			</ol>
    		</section>
         	
         	<div class="box">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $jumlahBooking }}</h3>

              <p>New Booking</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{url('booked')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Event</h3>
              @foreach($event as $event)
              <p>{{ $event->namaEvent }}</p>
              @endforeach
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="{{url('event')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $menu }}</h3>

              <p>Menu</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="{{ url('menu') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $fasilitas }}</h3>

              <p>Fasilitas</p>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="{{ url('fasilitas') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          </div>
@endsection