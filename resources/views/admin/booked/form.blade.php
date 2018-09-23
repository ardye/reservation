		@if (isset($event))
			{!! Form::hidden('idEvent', $event->idEvent) !!}
		@endif

		@if($errors->any())
			<div class="form-group {{ $errors->has('namaEvent') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('namaEvent', 'Nama Event', ['class' => 'control-label']) !!}
				{!! Form::text('namaEvent', null, ['class' => 'form-control']) !!}
				@if($errors->has('namaEvent'))
					<span class="help-block">{{ $errors->first('namaEvent') }}</span>
				@endif
			</div>

		@if($errors->any())
			<div class="form-group {{ $errors->has('deskEvent') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('deskEvent', 'Deskripsi', ['class' => 'control-label']) !!}
				{!! Form::textarea('deskEvent', null, ['class' => 'form-control']) !!}
				@if($errors->has('deskEvent'))
					<span class="help-block">{{ $errors->first('deskEvent') }}</span>
				@endif
			</div>

		@if($errors->any())
			<div class="form-group {{ $errors->has('tanggalMulai') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('tanggalMulai', 'Tanggal Mulai', ['class' => 'control-label']) !!}
				{!! Form::date('tanggalMulai', !empty($event) ? $event->tanggalMulai->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggalMulai']) !!}
				@if($errors->has('tanggalMulai'))
					<span class="help-block">{{ $errors->first('tanggalMulai') }}</span>
				@endif
			</div>

		@if($errors->any())
			<div class="form-group {{ $errors->has('tanggalSelesai') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
				{!! Form::label('tanggalSelesao', 'Tanggal Selesai', ['class' => 'control-label']) !!}
				{!! Form::date('tanggalSelesai', !empty($event) ? $event->tanggalSelesai->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggalSelesai']) !!}
				@if($errors->has('tanggalSelesai'))
					<span class="help-block">{{ $errors->first('tanggalSelesai') }}</span>
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