@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Report
				</div>

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
					<form class="form-horizontal" action="{{ url('/report') }}" method="POST">
						@include('reports.form')
					</form>
				</div>
				<div class="panel-footer">

				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')
<script type="text/javascript">
	$('#addTest').click(function(){
		var rGroup = $('.result-group');
		console.log(rGroup.length);
		var no = rGroup.length;
		var last = rGroup.last();
		var testForm = `@include('reports.resultFormBase')`;
		testForm = testForm.replace(/x_/g, no);
		testForm = testForm.replace(/_x/g, "_"+no);
		last.after(testForm);
	});

	$(document).on('change', '.testType', function(){
		var formGroup = $(this).parents('.form-group');
		var no = parseInt($(this).attr('data-testNo'));
		switch($(this).val()){
			case 'text':
				var textInclude = `@include('reports.textBase')`;
				textInclude = textInclude.replace(/_x/g, "_"+no);
				formGroup.html(textInclude);
				break;
			case 'percentage':
				var percentInclude = `@include('reports.percentageBase')`;
				percentInclude = percentInclude.replace(/_x/g, "_"+no);
				formGroup.html(percentInclude);
				break;
			case 'ppm':
				var ppmInclude = `@include('reports.ppmBase')`;
				ppmInclude = ppmInclude.replace(/_x/g, "_"+no);
				formGroup.html(ppmInclude);
				break;
		}
	});

	// $('#pName').autocomplete({
	// 	source: function(request, response){
	// 	$.ajax({
	// 		async: true,
	// 		url: "http://localhost/crossover/crossover/public/ajax/patient-by-name/"+request.term,
	// 		method: "GET",
	// 		success: function(data){
	// 			response (data);
	// 			}
	// 		});
	// 	},
 //      minLength: 1,
 //      select: function( event, ui ) {
 //        log( ui.item ?
 //          "Selected: " + ui.item.label :
 //          "Nothing selected, input was " + this.value);
 //      },
 //      open: function() {
 //        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
 //      },
 //      close: function() {
 //        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
 //      }
 //    });

 //    function log( message ) {
 //      $( "<div>" ).text( message ).prependTo( "#log" );
 //      $( "#log" ).scrollTop( 0 );
 //    }


	// function test(){
	// 	var settings = {
	// 		"async": true,
	// 		"url": "http://localhost/crossover/crossover/public/ajax/patient-by-name/vlad",
	// 		"method": "GET",
	// 	}

	// 	$.ajax(settings).done(function (response) {
	// 	  console.log(response);
	// 	});
	// }
</script>
@endsection