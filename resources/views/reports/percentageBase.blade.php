<label for='tDesc_x' class='col-sm-2 control-label'>Percentage</label>
		<div class='col-sm-10'>
			<div class="input-group">
				<select class='form-control testType' id='tResult_x' name='tResult_x'>
					<option value='' selected disabled>---</option>
					@for($i=1; $i<=100; $i++)
					<option value='{{$i}}'>{{$i}}</option>
					@endfor
				</select>
				<span class="input-group-addon">%</span>
			</div>
		</div>