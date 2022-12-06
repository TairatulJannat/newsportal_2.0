{{-- <option value="">--- Select One ---</option> --}}
@if(!empty($categories))
  @foreach($categories as $key => $value)
  	@if($category_id == $value->id)
    	<option selected value="{{ $value->id }}" style="background-color: black"> {{ $value->category_name_bn }} | {{ $value->category_name_en }}</option>
    @else
    	<option value="{{ $value->id }}" style="background-color: black">{{ $value->category_name_bn }} | {{ $value->category_name_en }}</option>
    @endif
  @endforeach
@endif