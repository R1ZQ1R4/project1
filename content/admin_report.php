<form action="" method="POST" class="form-search">
<div class="width-input"  style="margin-right: auto">
	<label>From
		<input type='date' name="date1" value="2017-01-01">
	</label>
	<label>Until
		<input type='date' name="date2" value="2017-01-02">
	</label>

	<label for="">Status
	<select name="status">
		<option value="all">all</option>
		<option value="0">canceled</option>
		<option value="1">booked</option>
		<option value="2">occupied</option>
		<option value="3">pending</option>
		<option value="9">completed</option>
	</select>
	</label>
</div>
<div class="width-input">
	<button class="btn global" name="btn_search">search</button>
	<button class="btn global default" id="print">print</button>
</div>
</form>



