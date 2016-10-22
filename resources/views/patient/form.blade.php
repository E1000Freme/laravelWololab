{{ csrf_field() }}
<div class="form-group">
	<label for="pName" class="col-sm-2 control-label">Name</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="pName" name="pName" placeholder="Patient Name" value="{{$patient->user->name or ''}}">
	</div>
</div>

<div class="form-group">
	<label for="sexMale" class="col-sm-2 control-label">Sex</label>
	<div class="col-sm-10">
		<div class="radio">
			<label>
			<input type="radio" name="pSex" id="sexMale" value="male">
			Male
			</label>
			&nbsp;
			&nbsp;
			<label>
			<input type="radio" name="pSex" id="sexFemale" value="female">
			Female
			</label>
		</div>
	</div>
</div>

<div class="form-group">
	<label for="pName" class="col-sm-2 control-label">Address</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="pAddress" name="pAddress" placeholder="Patient Address" value = "{{$patient->address or ''}}">
	</div>
</div>

<div class="form-group">
	<label for="pName" class="col-sm-2 control-label">Postcode</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="pPostcode" name="pPostcode" placeholder="Patient Postcode" value="{{$patient->postcode or ''}}">
	</div>
</div>

<div class="form-group">
	<label for="pName" class="col-sm-2 control-label">Phone number</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="pPhone" name="pPhone" placeholder="Patient Phone" value="{{$patient->phone or ''}}">
	</div>
</div>
@if(Request::url() == route('patient.create'))
<div class="form-group">
	<label for="pPwd" class="col-sm-2 control-label">Patient Password</label>
	<div class="col-sm-10">
		<input type="password" class="form-control" id="pPwd" name="pPwd" placeholder="Patient Password">
	</div>
	<div class="col-sm-offset-2 col-sm-10">
		<button type="button" class="btn btn-info pull-right">Generate Password</button>
	</div>
</div>
@endif


<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-success pull-right">Send</button>
	</div>
</div>
