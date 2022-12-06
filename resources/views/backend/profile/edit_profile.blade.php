@extends('backend.layouts.app')
@section('content')

@php
    $user_image = Storage::url(Auth::user()->image);
@endphp

<div class="content">
    <div class="container-fluid">
        <div class="col-md-8 col-12 mr-auto ml-auto">
        <!--     Wizard container     -->
            <div class="wizard-container">
                <div class="card card-wizard" data-color="purple" id="wizardProfile">
                    <form action="{{ route ('edited.profile')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <!--    You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"     -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                EDIT PROFILE 
                            </h3>
                            <h5 class="card-description">Update Your Information</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                    About
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                    Account
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                                    Address
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @isset($user)
            
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="about">
                                <!-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> -->
                                    <div class="row justify-content-center">
                                        <div class="col-sm-4">
                                            <div class="picture-container">

                                                @if($user_image!=null)

                                                    <div class="picture">
                                                        <img src="http://thevoice24.com/public{{ $user_image }}" class="picture-src" id="wizardPicturePreview" title="" />
                                                        <input name="image" type="file" id="wizard-picture">
                                                    </div>

                                                @else

                                                    <div class="picture">
                                                        <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                        <input name="image" type="file" id="wizard-picture">
                                                    </div>

                                                @endif

                                                <h6 class="description">Choose Picture</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group form-control-lg mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInput1" class="md-label-floating">English Name</label>
                                                    <input  type="text" class="form-control" id="exampleInput1" name="en_name" value = "{{ $user->name_en}}">
                                                </div>
                                            </div>
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">record_voice_over</i>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInput11" class="md-label-floating">Bangla Name</label>
                                                    <input  type="text" class="form-control" id="exampleInput11" name="bn_name" value = "{{ $user->name_bn}}">
                                                    <input  type="hidden" class="form-control" id="exampleInput" name="id" value = "{{ $user->id}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 mt-3">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInput1" class="md-label-floating">email</label>
                                                    <input readonly type="email" class="form-control" id="exampleemalil" name="email" value = "{{ $user->email}}" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="tab-pane" id="address">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-5">
                                            <label>Division</label>
                                            <div class="form-group ">
                                                <select class="form-control" data-style="select-with-transition" title="Choose Division" name="division" id="division_id" onchange="getDistrictByDivision(this)">
                                                    @foreach($division as $data)
                                                        @if($user->division == $data->id)
                                                            <option style="background-color: black; color:white" value="{{ $data->id }}" class="dynamic_division" id="did" selected> {{ $data->division_name_en }} </option>
                                                        @else
                                                            <option style="background-color: black; color:white" value="{{ $data->id }}" class="dynamic_division" id="did" > {{ $data->division_name_en }} </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label>District</label>
                                            <div class="form-group">
                                                <select value="0"  class="form-control" data-style="select-with-transition" title="Choose SubCategory" id="district_id" name="district">
                                                    @foreach($district as $data)
                                                        @if($data->id == $user->district)
                                                            <option style="background-color: black; color:white" value="{{ $data->id }}" selected> {{ $data->district_name_en }} </option>
                                                        @endif
                                                            <option style="background-color: black; color:white" value="{{ $data->id }}"> {{ $data->district_name_en }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" value = "{{ $user->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Permanent Address</label>
                                                    <input type="text" class="form-control" name="address_permanent" value = "{{ $user->address_permanent}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Present Address</label>
                                                <input type="text" class="form-control" name="address_present" value = "{{ $user->address_present}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endisset
                        
                        <div class="card-footer">
                            <div class="mr-auto">
                                <input type="button" class="btn btn-previous btn-fill btn-secondary btn-wd disabled" name="previous" value="Previous">
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-next btn-fill btn-primary btn-wd" name="next" value="Next">
                                <input type="submit" class="btn btn-finish btn-fill btn-success btn-wd" name="finish" value="Update" style="display: none;">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

    $(document).ready(function() {
      // Initialise the wizard
      demo.initMaterialWizard();
      setTimeout(function() {
        $('.card.card-wizard').addClass('active');
      }, 600);

    });
    

    function getDistrictByDivision(division) {
        var id = $('#division_id').val();
        $.ajax({
            url: "{{ route('ajax.get_district_by_division') }}",
            method: 'GET',
            data: {
                id: id,
            },
            
            success: function(data) {
                console.log(data);
                $('#district_id').html(null);
                    $('#district_id').append($('<option >', {
                        value: '',
                        text: 'Choose One',
                    }));

                for (var i = 0; i < data.length; i++) {
                    $('#district_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].district_name_bn + ' | ' + data[i].district_name_en,
                    }));
                    $('#district_id option').css({'background-color':'black' })
                }
            }
        });
           
    }

</script>
@endpush