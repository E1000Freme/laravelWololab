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
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ strtoupper(str_replace(' p ', ' ', $error)) }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" action="{{ url('/report/'.$rp->id) }}" method="POST">

					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<!--{{$i=0}}-->
					@foreach($rp->results()->get() as $res)
					<hr>
					<div class='result-group' data-testNo='{{$i}}'>
						<div class='form-group'>
							<label for='tTitle_{{$i}}' class='col-sm-2 control-label'>Test Title</label>
							<div class='col-sm-10'>
								<input type='text' class='form-control' id='tTitle_{{$i}}' name='tTitle_{{$i}}' value='{{$res->title}}'>
							</div>
						</div>
						<div class='form-group'>
							<label for='tDesc_{{$i}}' class='col-sm-2 control-label'>Test Description</label>
							<div class='col-sm-10'>
								<input type='text' class='form-control' id='tDesc_{{$i}}' name='tDesc_{{$i}}' value='{{$res->description}}'>
							</div>
						</div>
						<div class='form-group'>
							<label for='tResult_{{$i}}' class='col-sm-2 control-label'>Result</label>
							<div class='col-sm-10'>
								<input type='text' class='form-control' id='tResult_{{$i}}' name='tResult_{{$i}}' value='{{$res->data}}'>
							</div>
						</div>
					</div>
					<!-- {{$i++}} -->
					@endforeach
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success pull-right">Send</button>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection