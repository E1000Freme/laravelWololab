{{ csrf_field() }}
<div class="form-group">
	<label for="pName" class="col-sm-2 control-label">Patient</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="pName" name="pName" placeholder="Patient Name" value="{{$patient->name or ''}}">
	</div>
</div>

<hr>
<div class="result-group" data-testNo="0">
	<div class="form-group">
		<label for="tTitle_0" class="col-sm-2 control-label">Test Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="tTitle_0" name="tTitle_0" placeholder="Test Title">
		</div>
	</div>
	<div class="form-group">
		<label for="tDesc_0" class="col-sm-2 control-label">Test Description</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="tDesc_0" name="tDesc_0" placeholder="Test Description">
		</div>
	</div>
	@include('reports.resultTypes')
</div>
<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="button" id="addTest" class="btn btn-success pull-right">Add Test</button>
		</div>
	</div>
<hr>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-success pull-right">Send</button>
	</div>
</div>
