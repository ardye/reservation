		@if (isset($menu))
			{!! Form::hidden('idMenu', $menu->idMenu) !!}
		@endif

		@if($errors->any())
			<div class="form-group {{ $errors->has('namaMenu') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('namaMenu', 'Nama Menu', ['class' => 'control-label']) !!}
				{!! Form::text('namaMenu', null, ['class' => 'form-control']) !!}
				@if($errors->has('namaMenu'))
					<span class="help-block">{{ $errors->first('namaMenu') }}</span>
				@endif
			</div>

		@if($errors->any())
			<div class="form-group {{ $errors->has('deskMenu') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('deskMenu', 'Detail', ['class' => 'control-label']) !!}
				{!! Form::textarea('deskMenu', null, ['class' => 'form-control']) !!}
				@if($errors->has('deskMenu'))
					<span class="help-block">{{ $errors->first('deskMenu') }}</span>
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

		@if($errors->any())
			<div class="form-group {{ $errors->has('harga') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('harga', 'Harga', ['class' => 'control-label']) !!}
				{!! Form::number('harga', null, ['class' => 'form-control']) !!}
				@if($errors->has('harga'))
					<span class="help-block">{{ $errors->first('harga') }}</span>
				@endif
			</div>

		@if($errors->any())
			<div class="form-group {{ $errors->has('idKategori') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('idKategori', 'Kategori', ['class' => 'control-label']) !!}
				@if (count($listKategori) > 0)	
					{!! Form::select('idKategori', $listKategori, null, ['class' => 'form-control', 'id' => 'idKategori', 'placeholder' => 'Pilih Kategori']) !!}
				@else
					<p> Tidak ada pilihan kategori </p>
				@endif
				@if($errors->has('idKategori'))
					<span class="help-block">{{ $errors->first('idKategori') }}</span>
				@endif
			</div>

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
			
			<div class="form-group">
				{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
			</div>