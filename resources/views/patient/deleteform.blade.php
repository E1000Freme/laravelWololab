<div class="panel panel-danger">
	<div class="panel-heading">Danger Zone</div>
	<div class="panel-body">
		<h4>ATTENTION: This action cannot be undone</h4>
		<form class="form-horizontal" action="{{ url('/patient/'.$patient->id) }}" method="POST">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<button type="submit" class="btn btn-danger pull-right">Delete Patient</button>
		</form>
	</div>
</div>