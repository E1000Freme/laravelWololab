<table class="table table-striped">
	<thead>
		<tr>
			<th>Patient Name</th>
			<th>Date</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($reports as $r)
		<tr>
			<td>
				{{$r->user->name}}
			</td>
			<td>
				{{$r->created_at}}
			</td>
			<td>
				<a href="{{url('report/'.$r->id)}}" class="btn btn-alert" role="button">
					<a href="" class="btn btn-danger pull-right" role="button"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>