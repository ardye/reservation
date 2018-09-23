<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delicious</title>
    <meta name="description" content="BootstrapMade.com">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="{{ asset('home/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/themes/krajee-fa/theme.css') }}" media="all" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/themes/krajee-svg/theme.css') }}" media="all" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/themes/krajee-uni/theme.css') }}" media="all" type="text/css"/>

    <!-- =======================================================
        Theme Name: Delicious
        Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
        Author: BootstrapMade.com
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!--banner-->
    <section id="banner">

    <div class="bg-color">
      <nav class="navbar navbar-custom navbar-default navbar-fixed-top">

        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
              Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
              <span class="light header-head">SIL Cafe</span>
            </a>
          </div>
          <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->

            @if(Auth::check())
            <li>
              <a href="{{ url('logout') }}" style="color: #fff">{{Auth::user()->nama}} (Logout)&nbsp;&nbsp;</a>
             {{--  <span onclick="<script>href: 'logout'</script>" class="pull-right menu-icon">{{ Auth::user()->nama }} (Logout)</span><span>&nbsp;</span> --}}
             </li>
            @endif
                    <li>
                        <span onclick="openNav()" class="pull-right menu-icon"> <i class="fa fa-bars"></i> Menu </span>
                    </li>
                    <li>
                      <a>&nbsp;</a>
                    </li>
                </ul>
            </div>
          <div class="container">
            <div id="mySidenav" class="navbar-right sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="#fasility">Fasilitas</a>
              <a href="#menu-list">Daftar Menu</a>
              <a href="#about">Tentang</a>
              <a href="#contact">Booking</a>
            </div>
          </div>
        </div>
      </nav>

      @foreach($eventTerbaru as $event)
      <div class="row">
        <div class="container">
          <div class="col-xs-12 text-center" style="padding-top:120px; padding-bottom: 50px">
            <h1 class="header-h">Up Coming events</h1>
            <p class="header-p">Decorations 100% complete here</p>
          </div>
          <div class="col-md-12" style="padding-bottom:100px;">
            <div class="item active left">
              <div class="col-md-6 col-sm-6 left-images">
                <img src="{{ asset('gambarupload/'.$event->gambar) }}" class="img-responsive">
              </div>
              <div class="col-md-6 col-sm-6 details-text">
                <div class="content-holder">
                  <h2>{{ $event->namaEvent }}</h2>
                  <p>{{ $event->deskEvent }}</p>
                  <address>
                    <strong>Lokasi: </strong>
                    Fakaultas Ilmu Komputer Depok
                    <br>
                    <strong>Tanggal: </strong>
                    {{ $event->tanggalMulai->format('d-M-Y') }} <strong> s/d </strong> {{ $event->tanggalSelesai->format('d-M-Y') }} 
                  </address>
                  <a class="btn btn-imfo btn-read-more book page-scroll" href="#contact">Booking Sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    </section>
    <!-- / banner -->
  <section id="fasility" class="section-padding">
    <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Fasilitas</h1>
                    <p class="header-p">Kami memberikan fasilitas terbaik untuk kenyamanan pelanggan kami.</p>
                </div>
                <div class="col-md-12">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              @for($i = 0; $i<count($fasilitasData); $i++)
                <li data-target="#myCarousel" data-slide-to="{{$i}}" <?php if($i==0)echo "class='active'"?>></li>
              @endfor
            </ol>
            <?php $i=0; ?>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            @foreach($fasilitasData as $fasilitas)
            @if($i==0)
              <div class="item active">
            @else
              <div class="item">
            @endif
                <img src="{{ asset('gambarupload/'.$fasilitas->gambar) }}" alt="{{ $fasilitas->namaFasilitas }}" class="carousels">
                <div class="carousel-caption">
                  <h3 style="color: #fff">{{ $fasilitas->namaFasilitas }}</h3>
                  <p style="color: #fff">{{ $fasilitas->detailFasilitas}}</p>
                </div>
              </div>
            <?php $i++; ?>
            @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <!--/about-->
  
  <!-- menu -->
    <section id="menu-list" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Menu List</h1>
                    <p class="header-p">Disajikan dengan bahan-bahan berkualitas tanpa bahan pengawet
                    <br>masakan dari koki terbaik saat ini. </p>
                </div>
                <div class="col-md-12  text-center gallery-trigger">
                    <ul>
                        <li><a class="filter" data-filter="all">Show All</a></li>
                        @foreach($kategoriData as $kategori)
                          <li><a class="filter" data-filter=".category-{{ $kategori->idKategori }}">{{ $kategori->namaKategori }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div id="Container">
                  @foreach($menuData as $menu)
          <div class="mix category-{{ $menu->idKategori }} menu-restaurant" data-myorder="2">
            <div class="col-xs-6 col-md-4" style="height: 125px">
              <div class="thumbnail">
                <img src="{{asset("gambarupload/".$menu->gambar)}}" alt="..." id="gambars{{$menu->idMenu}}">
              </div>
            </div>
            <div class="col-xs-8">
              <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg" id="open-modal" data-toggle="modal" data-target="#myModal" data-id="{{ $menu->idMenu }}" data-name="{{ $menu->namaMenu }}" data-harga="{{ $menu->harga }}" data-rating="{{ $menu->rating }}" data-desk="{{ $menu->deskMenu }}">{{ $menu->namaMenu }}</a>
              <span class="menu-price">Rp. {{ number_format($menu->harga) }}</span>
            </span>
              <span class="menu-subtitle">{{ $menu->deskMenu }}</span>
              <br />
              <mark>{{ $menu->rating }}</mark>
            </div>
            <div class="col-xs-12">
                <div class=" nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1_{{ $menu->idMenu }}" data-toggle="tab">Review</a></li>
              @if(Auth::check())
              <li><a href="#tab_2_{{ $menu->idMenu }}" data-toggle="tab">Tambah Review</a></li>
              @endif
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_{{ $menu->idMenu }}">
                      <!-- Direct Chat -->
              <div class="row">
                <div class="col-xs-12">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">

            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                @foreach($menu->user as $review)
                  <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">{{ $review->username }}</span>
                    <span class="direct-chat-timestamp pull-right">Rating: <mark>{{ $review->pivot->rating }}</mark></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="gambarupload/{{ $review->gambar }}" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                  @if(Auth::check() && $review->username == Auth::user()->username)
                    <div class="pull-right">
                    {!! Form::open(['method' => 'DELETE', 'action' => ['HomeController@destroy', $review->pivot->idReview]]) !!}

                    {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-xs btn-flat', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                    </div>
                  @endif
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
        </div>
        <!-- /.col -->
              </div>
              <!-- /.tab-pane -->
              </div>

              @if(Auth::check())
              <div class="tab-pane" id="tab_2_{{ $menu->idMenu }}">
              {!! Form::open(['url' => 'addReview']) !!}
              {!! Form::hidden('idMenu', $menu->idMenu, []) !!}
              {!! Form::hidden('idUser', Auth::user()->idUser, []) !!}

            @if($errors->any())
            <div class="form-group {{ $errors->has('review') ? 'has-error' : 'has-success'}}">
          @else
            <div class="form-group">
          @endif
          {!! Form::label('review', 'Review', ['class' => 'control-label']) !!}
          {!! Form::text('review', null, ['class' => 'form-control']) !!}
          @if($errors->has('review'))
            <span class="help-block">{{ $errors->first('review') }}</span>
          @endif
        </div>

    @if($errors->any())
      <div class="form-group {{ $errors->has('rating') ? 'has-error' : 'has-success'}}">
    @else
      <div class="form-group">
    @endif
      {!! Form::label('rating', 'Rating', ['class' => 'control-label']) !!}
        <input id="rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" data-size="xs">
      </div>
      
      <div class="form-group">
        {!! Form::submit('Simpan', ['class' => 'btn btn-success btn-flat']) !!}
      </div>
    {!! Form::close() !!}
              </div>
              <!-- /.tab-pane -->
              @endif
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          </div>
          </div>
                  @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--/ menu -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="dname"></span></h4>
      </div>
      <div class="modal-body">
    <div class="tab-content">
      <br />
      <div class="tab-pane active" id="details">
            <div class="col-lg-12">
                <img src="" alt="..." class="img-thumbnail" id="img-modal">
            </div>
            <div class="col-xs-12">
              <table class="table table-hover table-striped">
                <tr>
                  <th>Harga:</th><td><span class="dharga"></span><td>
                </tr>
                <tr>
                  <th>Deskripsi:</th><td class="menu-subtitle"><span class="ddesk"></span><td>
                </tr>
                <tr>
                  <th>Rating:</th><td class="menu-subtitle"><mark><span class="drating"></span></mark><td>
                </tr>
              </table>
            </div>
      </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
  
    <!--about-->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">About Us</h1>
                    <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                    <br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="col-md-6 col-sm-6">
                        <div class="about-info">
                            <h2 class="heading">vel illum qui dolorem eum</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero impedit inventore culpa vero accusamus in nostrum dignissimos modi, molestiae. Autem iusto esse necessitatibus ex corporis earum quaerat voluptates quibusdam dicta!</p>
                            <div class="details-list">
                                <ul>
                                    <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                    <li><i class="fa fa-check"></i>Quisque finibus eu lorem quis elementum</li>
                                    <li><i class="fa fa-check"></i>Vivamus accumsan porttitor justo sed </li>
                                    <li><i class="fa fa-check"></i>Curabitur at massa id tortor fermentum luctus</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="#" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <!--/about-->
  

    <!-- contact -->
    <section id="contact" class="section-padding">
    @if(Auth::check())
        <div class="container" style="min-height: 570px">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="header-h">Book Your table</h1>
                    <p class="header-p">Pesan meja anda.
                    <br>Kami selalu memberikan layanan terbaik untuk kenyamanan anda.</p>
                </div>
            </div>
            @include('_partial.flash_message')
            <div class="row msg-row">
                <div class="col-md-4 col-sm-4 mr-15">
                    <div class="media-2">
                        <div class="media-left">
                            <div class="contact-phone bg-1 text-center"><span class="phone-in-talk fa fa-phone"></span></div>
                        </div>
                        <div class="media-body">
                            <h4 class="dark-blue regular">Phone Numbers</h4>
                            <p class="light-blue regular alt-p">+628 9088890012 - <span class="contacts-sp">Phone Booking</span></p>
                        </div>
                    </div>
                    <div class="media-2">
                        <div class="media-left">
                            <div class="contact-email bg-14 text-center"><span class="hour-icon fa fa-clock-o"></span></div>
                        </div>
                        <div class="media-body">
                            <h4 class="dark-blue regular">Opening Hours</h4>
                            <p class="light-blue regular alt-p"> Senin - Jumat 08.00 - 22:00</p>
                            <p class="light-blue regular alt-p">
                                 Sabtu dan Minggu 09:00 - 24.00
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                {!! Form::open(['url' => 'booking', 'class'=>'contactForm']) !!}
                {!! Form::hidden('status', 'Booked', []) !!}
                {!! Form::hidden('jenis', 'Web', []) !!}
                {!! Form::hidden('idUser', Auth::user()->idUser, []) !!}
                  <div class="col-md-6 col-sm-6 contact-form">
                    @if($errors->any())
                      <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : 'has-success'}}">
                    @else
                      <div class="form-group">
                    @endif
                      {!! Form::label('tanggal', 'Tanggal',['class' => 'label-control']) !!}
                      {!! Form::date('tanggal', null, ['class' => 'form-control label-floating is-empty']) !!}
                      @if($errors->has('tanggal'))
                        <span class="help-block">{{ $errors->first('tanggal') }}</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6 contact-form">
                    @if($errors->any())
                      <div class="form-group {{ $errors->has('waktu') ? 'has-error' : 'has-success'}}">
                    @else
                      <div class="form-group">
                    @endif
                      {!! Form::label('waktu', 'Jam',['class' => 'label-control']) !!}
                      {!! Form::input('time', 'waktu', null, ['class' => 'form-control label-floating is-empty']) !!}
                    @if($errors->has('waktu'))
                      <span class="help-block">{{ $errors->first('waktu') }}</span>
                    @endif
                    </div>
                  </div>

                <div class="col-md-6 col-sm-6 contact-form">
                  @if($errors->any())
                    <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : 'has-success'}}">
                  @else
                    <div class="form-group">
                  @endif
                  {!! Form::label('jumlah', 'Jumlah Orang',['class' => 'label-control']) !!}
                  {!! Form::text('jumlah', null, ['class' => 'form-control label-floating is-empty']) !!}
                  @if($errors->has('jumlah'))
                    <span class="help-block">{{ $errors->first('jumlah') }}</span>
                  @endif
                </div>
                </div>

                <div class="col-md-6 col-sm-6 contact-form">
                  @if($errors->any())
                    <div class="form-group {{ $errors->has('pesan') ? 'has-error' : 'has-success'}}">
                  @else
                    <div class="form-group">
                  @endif
                  {!! Form::label('pesan', 'Pesan',['class' => 'label-control']) !!}
                  {!! Form::text('pesan', null, ['class' => 'form-control label-floating is-empty']) !!}
                  @if($errors->has('pesan'))
                    <span class="help-block">{{ $errors->first('pesan') }}</span>
                  @endif
                </div>
                </div>
                  <div class="col-md-12 btnpad">
                    <div class="contacts-btn-pad">
                        {!! Form::submit('Book Table', ['class' => 'contacts-btn']) !!}
                    </div>
                  </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        @else
          <div class="container" style="min-height: 570px">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Login</h1>
                    <p class="header-p">Silahkan login terlebih dahulu untuk memesan tempat</p>
                </div>
            </div>
            @include('_partial.login_error_list')
            <div class="col-md-8 col-md-offset-2">
                
                {!! Form::open(['url' => 'login', 'class'=>'contactForm']) !!}
                  <div class="col-md-12 contact-form pad-form">
                      <div class="form-group label-floating is-empty">
                      {!! Form::label('username', 'Username',['class' => 'label-control']) !!}
                      {!! Form::text('username', null, ['class' => 'form-control']) !!}
                    </div>
                  </div>
                  <div class="col-md-12 contact-form">
                      <div class="form-group">
                      {!! Form::label('password', 'Password',['class' => 'label-control']) !!}
                      {!! Form::password('password', ['class' => 'form-control label-floating is-empty']) !!}
                    </div>
                  </div>
                  <div class="col-md-12 btnpad">
                    <div class="contacts-btn-pad">
                        {!! Form::submit('Login', ['class' => 'contacts-btn']) !!}
                    </div>
                  </div>
                {!! Form::close() !!}
                </div>

            <div class="col-md-8 col-md-offset-2" style="padding-top: 20px">
              <div class="callout callout-warning">
                <h4>Perhatian!</h4>
                  <p>Belum punya akun silahkan <a href="#register" class="page-scroll">register</a>.</p>
                </div>
              </div>
        </div>
        </section>

  <section id="register" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="header-h">Register</h1>
                    <p class="header-p">Daftarkan akun anda.
                    <br>Kami menjamin kerahasiaan data anda.</p>
                </div>
            </div>
            @include('_partial.flash_message')
            <div class="row msg-row">
                <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['url' => 'register', 'class'=>'contactForm', 'files' => true]) !!}
                {!! Form::hidden('status', 'Customer', []) !!}
                  <div class="col-md-6 col-sm-6 contact-form pad-form">
                    @if($errors->any())
                      <div class="form-group {{ $errors->has('username') ? 'has-error' : 'has-success'}}">
                    @else
                      <div class="form-group label-floating is-empty">
                    @endif
                      {!! Form::label('username', 'Username',['class' => 'label-control']) !!}
                      {!! Form::text('username', null, ['class' => 'form-control']) !!}
                      @if($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 contact-form pad-form">
                    @if($errors->any())
                      <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success'}}">
                    @else
                      <div class="form-group label-floating is-empty">
                    @endif
                      {!! Form::label('nama', 'Nama',['class' => 'label-control']) !!}
                      {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                      @if($errors->has('nama'))
                        <span class="help-block">{{ $errors->first('nama') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 contact-form pad-form">
                    @if($errors->any())
                      <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success'}}">
                    @else
                      <div class="form-group">
                    @endif
                      {!! Form::label('password', 'Password',['class' => 'label-control']) !!}
                      {!! Form::password('password', ['class' => 'form-control']) !!}
                      @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 contact-form pad-form">
                    @if($errors->any())
                      <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success'}}">
                    @else
                      <div class="form-group">
                    @endif
                      {!! Form::label('password-confirm', 'Konfirmasi Password',['class' => 'label-control']) !!}
                      {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                      @if($errors->has('password'))
                        <span class="help-block">&nbsp;</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6 contact-form pad-form">
                    @if($errors->any())
                      <div class="form-group {{ $errors->has('telepon') ? 'has-error' : 'has-success'}}">
                    @else
                      <div class="form-group">
                    @endif
                      {!! Form::label('telepon', 'Telepon',['class' => 'label-control']) !!}
                      {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
                      @if($errors->has('telepon'))
                        <span class="help-block">{{ $errors->first('telepon') }}</span>
                      @endif
                    </div>
                  </div>
                <div class="col-md-6 col-sm-6 contact-form pad-form">
                  @if($errors->any())
                    <div class="form-group {{ $errors->has('gambar') ? 'has-error' : 'has-success'}}">
                  @else
                    <div class="form-group">
    @endif
        {!! Form::label('gambar', 'Gambar', ['class' => 'control-label']) !!}
        {!! Form::file('gambar', ['class' => 'form-control']) !!}
        @if($errors->has('gambar'))
          <span class="help-block">{{ $errors->first('gambar') }}</span>
        @endif
      </div>
                
                </div>
                  <div class="col-md-12 btnpad">
                    <div class="contacts-btn-pad">
                        {!! Form::submit('Simpan', ['class' => 'contacts-btn']) !!}
                    </div>
                  </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        </section>
        @endif
        </section>

    <!-- footer -->
    <footer class="footer text-center">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div class="widget">
                        <h4 class="widget-title">SIL Cafe</h4>
                        <address>Fakultas Ilmu Komputer Depok</address>
                        <div class="social-list">
                             <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-line" aria-hidden="true"></i></a>
                        </div>
                        <p class="copyright clear-float">
                            © MIK 2017. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.mixitup.min.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script src="{{ asset('home/contactform/contactform.js') }}"></script>
  <script src="{{ asset('home/js/grayscale.min.js') }}"></script>
  <script src="{{ asset('home/js/star-rating.js') }}" type="text/javascript"></script>
  <script>
        $(function() {

          $(document).on('click', '#open-modal', function() {
            $('.did').text($(this).data('id'));
            $('.dname').html($(this).data('name'));
            $('.dharga').html($(this).data('harga'));
            $('.ddesk').html($(this).data('desk'));
            $('.drating').html($(this).data('rating'));
            $('#img-modal').attr('src', $('#gambars'+ $(this).data('id')).attr('src'));
        });

        });
    </script>
    
</body>
</html>