@extends('template')

@section('main')
	<div id="siswa">
		<h2>Prepaid Balance</h2>
		{{--@include('errors.form_error_list')--}}
		{{--<form action="{{url('siswa')}}" method="POST">--}}
		{!! Form::open(['url'=>'siswa', 'files'=>true]) !!}
			@if($errors->any())
				<div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error' : 'has-success' }}">
			@else
				<div class="form-group">
			@endif
				{!! Form::label('nomor_telepon', 'Telepon : ', ['class'=>'control-label']) !!}
				{!! Form::text('nomor_telepon', null, ['class'=>'form-control']) !!}
				@if($errors->has('nomor_telepon'))
					<span class="help-block">{{ $errors->first('nomor_telepon') }}</span>
				@endif
			</div>

			{!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
		{{--</form>--}}
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	{{--@include('footer')--}}
@stop
				
				