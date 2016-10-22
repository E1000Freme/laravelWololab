@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>
						<b>Patient #{{$patient->id}}:</b> {{$patient->user->name}}
						<small><a href="{{url('patient/'.$patient->id.'/edit')}}" class="btn btn-danger pull-right" role="button"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a></small>
					</h3>
				</div>

				<div class="panel-body">
					<div class="data-group row">
						<div class="col-sm-2">Name</div>
						<div class="col-sm-10">
							&nbsp;{{$patient->name}}
						</div>
					</div>
					<div class="data-group row">
						<div class="col-sm-2">Sex</div>
						<div class="col-sm-10">
							&nbsp;{{$patient->sex}}
						</div>
					</div>
					<div class="data-group row">
						<div class="col-sm-2">Address</div>
						<div class="col-sm-10">
							&nbsp;{{$patient->address}}
						</div>
					</div>
					<div class="data-group row">
						<div class="col-sm-2">Postcode</div>
						<div class="col-sm-10">
							&nbsp;{{$patient->postcode}}
						</div>
					</div>
					<div class="data-group row">
						<div class="col-sm-2">Phone</div>
						<div class="col-sm-10">
							&nbsp;{{$patient->phone}}
						</div>
					</div>
				</div>
			</div>
			@if(Auth::user()->hasRole('operator'))
			@include('patient.deleteform')
			@endif
		</div>
	</div>
</div>
@endsection