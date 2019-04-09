@extends('template')

@section('main')
	<div id="order">
		<h2>Order</h2>
		@include('transaction.form_search')
		
		@if(!empty($transaction_list))
			<table class="table">
				<thead>
					<tr>
						<th>Order Number</th>
						<th>Price</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($transaction_list as $transaction)
					<tr>
						<td>{{$transaction->order_number}}</td>
						<td>{{$transaction->price}}</td>
						<td>{{$transaction->shopping_type == 'product' ? $transaction->product.' that costs '.$transaction->price : $transaction->balance->balance_value.'  for '.$transaction->mobile_number }}</td>
						<td>
							<div class="box-button">
								@if($transaction->status=='Waiting')
									<div class="box-button">
										{!! Form::open(['method'=>'PATCH', 'action'=>['TransactionController@pay', $transaction->id]]) !!}
										{!! Form::submit('Pay now', ['class'=>'btn btn-primary']) !!}
										{!! Form::close() !!}
									</div>
								@elseif($transaction->status=='Success')
									@if($transaction->shopping_type=='product')
										{{ $transaction->shipping_code }}
									@else
										{{ 'Success' }}
									@endif
								@endif
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>Nothing Order.</p>
		@endif
		
		<div class="table-nav">
			<div class="count-data">
				<strong>Total Order : {{$count_transaction}}</strong>
			</div>
			<div class="paging">
				{{ $transaction_list->links() }}
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop


