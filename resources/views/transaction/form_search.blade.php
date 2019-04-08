<div id="pencarian">
	{!! Form::open(['url' => 'order', 'method' => 'GET', 'id' => 'form-search']) !!}
	
		<div class="row">
			<div class="col-md2">
				<div class="input-group">
					{!! Form::text('keyword', (!empty($keyword)) ? $keyword : null, ['class' => 'form-control', 'placeholder' => 'Enter the keyword']) !!}
					<span class="input-group-btn">
						{!! Form::button('Search', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
					</span>
				</div>
			</div>
		</div>

	{!! Form::close() !!}
</div>

