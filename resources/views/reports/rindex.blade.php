@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>
						Reports
						<small>
							<a href="{{url('report/create')}}" class="btn btn-danger pull-right" role="button"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
						</small>
					</h3>
				</div>

				<div class="panel-body">
					@if($reports->total() == 0)
						Nothing to show
					@else
					@include('reports.rindextable');
					@endif
				</div>
				<div class="panel-footer">
					{{$reports->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
