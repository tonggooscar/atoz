@extends('template')

@section('main')
	<div id="product">
		<h2>Product Page</h2>
		{{--@include('errors.form_error_list')--}}
		{!! Form::open(['url'=>'transaction']) !!}
		
			{!! Form::hidden('shopping_type', 'product') !!}
			
			@if($errors->any())
				<div class="form-group {{ $errors->has('product') ? 'has-error' : 'has-success' }}">
			@else
				<div class="form-group">
			@endif
				{!! Form::label('product', 'Product : ', ['class'=>'control-label']) !!}
				{!! Form::textarea('product', null, ['id' => 'product', 'rows' => 4, 'cols' => 54, 'placeholder'=>'Product']) !!}
				@if($errors->has('product'))
					<span class="help-block">{{ $errors->first('product') }}</span>
				@endif
			</div>
			
			@if($errors->any())
				<div class="form-group {{ $errors->has('shipping_address') ? 'has-error' : 'has-success' }}">
			@else
				<div class="form-group">
			@endif
				{!! Form::label('shipping_address', 'Shipping Address : ', ['class'=>'control-label']) !!}
				{!! Form::textarea('shipping_address', null, ['id' => 'shipping_address', 'rows' => 4, 'cols' => 54, 'placeholder'=>'Shipping Address']) !!}
				@if($errors->has('shipping_address'))
					<span class="help-block">{{ $errors->first('shipping_address') }}</span>
				@endif
			</div>
			
			@if($errors->any())
				<div class="form-group {{ $errors->has('price') ? 'has-error' : 'has-success' }}">
			@else
				<div class="form-group">
			@endif
				{!! Form::label('price', 'Price : ', ['class'=>'control-label']) !!}
				{!! Form::text('price', null, ['class'=>'form-control', 'placeholder'=>'Price']) !!}
				@if($errors->has('price'))
					<span class="help-block">{{ $errors->first('price') }}</span>
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
				
				