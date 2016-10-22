@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Patient</div>

				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ strtoupper(str_replace(' p ', ' ', $error)) }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" action="{{ url('/patient/'.$patient->id) }}" method="POST">
						{{ method_field('PUT') }}
						@include('patient.form')
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection