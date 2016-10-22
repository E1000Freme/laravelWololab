@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>
						<b>Report #{{$rp->id}}:</b> {{$rp->user->name}}
					</h3>
				</div>

				<div class="panel-body">
					<div class="data-group row">
						<div class="col-sm-2">Patient Name</div>
						<div class="col-sm-10">
							&nbsp;{{$rp->user->name}}
						</div>
					</div>
					<hr>
					<div class="data-group row">
						<div class="col-sm-2">Test Name</div>
						<div class="col-sm-4">Test Description</div>
						<div class="col-sm-6">Test Results</div>
					</div>
					@foreach($rp->results()->get() as $res)
					<div class="data-group row">
						<div class="col-sm-2">{{$res->title}}</div>
						<div class="col-sm-4">{{$res->description}}</div>
						<div class="col-sm-6">{{$res->data}}</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection