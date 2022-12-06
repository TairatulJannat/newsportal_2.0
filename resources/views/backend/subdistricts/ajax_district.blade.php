@if(!empty($districts))
  @foreach($districts as $key => $value)
  	@if($district_id == $value->id)
    	<option selected value="{{ $value->id }}" style="background-color: black">{{ $value->district_name_bn }}</option>
    @else
    	<option value="{{ $value->id }}" style="background-color: black">{{ $value->district_name_bn }}</option>
    @endif
  @endforeach
@endif