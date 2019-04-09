@extends('template')

@section('main')
	<div id="siswa">
		<h2>Success!</h2>
		{!! Form::open(['method'=>'PATCH', 'action'=>['TransactionController@pay', $transaction->id]]) !!}
		<table class="table table-striped">
			<tr>
				<th>Order No</th>
				<td>{{$transaction->order_number}}</td>
			</tr>
			<tr>
				<th>Total</th>
				<td>{{$transaction->price}}</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<td>&nbsp;</td>
			</tr>
			@if($transaction->shopping_type == 'product')
			<tr>
				<th>{{ $transaction->product }} that costs {{ $transaction->price }} will be shipped to :<br />{{ $transaction->shipping_address }}<br /><p>Only after you pay</p></th>
				<td></td>
			</tr>
			@endif
		</table>
		{!! Form::submit('Pay now', ['class'=>'btn btn-primary form-control']) !!}
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop
			
			
			
			
