@if(!empty($divisions))
  @foreach($divisions as $key => $value)
  	@if($division_id == $value->id)
    	<option selected value="{{ $value->id }}" style="background-color: black"> {{ $value->division_name_bn }} | {{ $value->division_name_en }}</option>
    @else
    	<option value="{{ $value->id }}" style="background-color: black">{{ $value->division_name_bn }} | {{ $value->division_name_en }}</option>
    @endif
  @endforeach
@endif