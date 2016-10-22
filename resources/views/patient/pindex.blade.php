@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>
						<b>Patients</b>
					</h3>
				</div>
				<div class="panel-body">

					@foreach($patients as $p)
					<div class="data-group row" style="padding-top: 10px">
						<div class="col-sm-2">{{$p->name}}</div>
						<div class="col-sm-10">
							<a href="{{url('patient/'.$p->id)}}" role="button" class="btn btn-primary">
							<i class="fa fa-search" aria-hidden="true"></i>
							</a>
						</div>
					</div>
					@endforeach
				</div>
				<div class="panel-footer">
					{{$patients->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection