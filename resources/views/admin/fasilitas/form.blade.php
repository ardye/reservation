		@if (isset($fasilitas))
			{!! Form::hidden('idFasilitas', $fasilitas->idFasilitas) !!}
		@endif

		@if($errors->any())
			<div class="form-group {{ $errors->has('namaFasilitas') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('namaFasilitas', 'Nama Fasilitas', ['class' => 'control-label']) !!}
				{!! Form::text('namaFasilitas', null, ['class' => 'form-control']) !!}
				@if($errors->has('namaFasilitas'))
					<span class="help-block">{{ $errors->first('namaFasilitas') }}</span>
				@endif
			</div>

		@if($errors->any())
			<div class="form-group {{ $errors->has('detailFasilitas') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('detailFasilitas', 'Detail', ['class' => 'control-label']) !!}
				{!! Form::textarea('detailFasilitas', null, ['class' => 'form-control']) !!}
				@if($errors->has('detailFasilitas'))
					<span class="help-block">{{ $errors->first('detailFasilitas') }}</span>
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