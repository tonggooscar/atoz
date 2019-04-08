@extends('template')

@section('main')
	<div id="prepaid_balance">
		<h2>Prepaid Balance</h2>
		{{--@include('errors.form_error_list')--}}
		{{--<form action="{{url('prepaid')}}" method="POST">--}}
		{!! Form::open(['url'=>'transaction']) !!}
		
			{!! Form::hidden('shopping_type', 'prepaid') !!}
		
			@if($errors->any())
				<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : 'has-success' }}">
			@else
				<div class="form-group">
			@endif
				{!! Form::label('mobile_number', 'Mobile Number : ', ['class'=>'control-label']) !!}
				{!! Form::text('mobile_number', null, ['class'=>'form-control', 'placeholder'=>'Mobile Number']) !!}
				@if($errors->has('mobile_number'))
					<span class="help-block">{{ $errors->first('mobile_number') }}</span>
				@endif
			</div>
			
			@if($errors->any())
				<div class="form-group {{ $errors->has('id_balance') ? 'has-error' : 'has-success' }}">
			@else
				<div class="form-group">
			@endif
				{!! Form::label('id_balance', 'Balance : ', ['class'=>'control-label']) !!}
				@if(count($list_balance))
					{!! Form::select('id_balance', $list_balance, null, ['class'=>'form-control', 'id'=>'id_balance', 'placeholder'=>'Choose Balance']) !!}
				@else
					<p>Nothing Balance, please insert the data before.</p>
				@endif
				@if($errors->has('id_balance'))
					<span class="help-block">{{ $errors->first('id_balance') }}</span>
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
				
				