@extends('FrontendBangla.layouts.app')
@section('content') 
@php
    $user =Session::get('user');
@endphp


<section class=" pt-4 profile-page">
    <div class="container">
        <h1 class="mb-4 text-center">User Profile</h1>
        
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
    
            <div class="profile-tab-nav border-right">
                <form action="{{ route('FrontendBangla.user.profile', $user->id ) }}" id="updatebutton" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="p-5">
                    <div class="img-circle text-center mb-3">
                        @if($user->image!=null)
                            <img class="profile_image" src="{{asset($user->image)}}"alt="Image" class="shadow">
                        @else
                            <img src="{{asset ('public/frontend/assets/img/user.png') }}" alt="Image" class="shadow">
                        @endif
                    </div>

                    <div class="edit-image">
                        <div id="img-preview"></div>
                        <input type="file" id="choose-file" name="image" />
                        <label for="choose-file">Choose File</label>
                    </div>

                    <style>
                        .profile-page .profile-tab-nav #img-preview {
                            background: url('{{asset($user->image) }}');
                            background-position: center;
                            background-size: cover;
                            background-color: #ddd;
                        }
                    </style>

                    <h4 class="text-center text-dark">@isset( $user->name_en){{ $user->name_en }} @endisset</h4>
                </div>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                        <i class="fa fa-home text-center mr-1"></i> 
                        Profile
                    </a>
                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                        <i class="fa fa-key text-center mr-1"></i> 
                        Password
                    </a>
                    <a class="nav-link" id="bookmark-tab" data-toggle="pill" href="#bookmark" role="tab" aria-controls="bookmark" aria-selected="false">
                        <i class="fa fa-user text-center mr-1"></i> 
                        Bookmarks
                    </a>
                </div>
            </div>

            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">Account Settings</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control sendbutton" name="name_en" value="{{ $user->name_en }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control sendbutton" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <strong>Present Address</strong>
                        </div>
                        
                        
                        <div class="col-md-6 division">
                            <div class="form-group">
                                <label>Division</label>   
                                @foreach ($division as $data)
                                    @if($user->division == $data->id)
                                    
                                    @endif
                                @endforeach    
                                <input readonly type="text" class="form-control sendbutton" name="division" value="@isset($user->division){{$user_division_name->division_name_en}} @endisset">  
                            </div>
                        </div>
                        <div class="col-md-6 edit_division">
                            <div class="form-group">
                                <select class="form-control sendbutton" readonly data-style="select-with-transition" title="Choose Division" name="division" id="division_id" onchange="getDistrictByDivision()">
                                    <option selected style="background-color: black; color:white" value="">---Division ---
                                    </option>
                                    @foreach($division as $data)
                                        @if($user->division == $data->id)
                                            <option style="background-color: white; color:black" value="{{ $data->id }}" class="dynamic_division" id="did" selected> {{ $data->division_name_en }} | {{ $data->division_name_bn }} </option>
                                        @else
                                            <option style="background-color: white; color:black" value="{{ $data->id }}" class="dynamic_division" id="did" > {{ $data->division_name_en }} | {{ $data->division_name_bn }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- @php
                            print_r($user->subdistrict);
                        @endphp --}}
                        <div class="col-md-6 district">
                            <label>District</label>      
                                <input readonly type="text" class="form-control sendbutton" name="district" value=" @isset($user->district){{ $user_distrit_name->district_name_en}} @endisset">
                            </div>
                        <div class="col-md-6 edit_district">
                        
                            <select value="0"  class="form-control sendbutton" data-style="select-with-transition" title="Choose district" id="district_id" name="district"  onchange="getSubDistrictByDistrict()" >
                                <option selected style="background-color: black; color:white" value="">---District ---
                                </option>
                                @foreach($district as $data)
                                    @if($data->id == $user->district)
                                        <option style="background-color: black; color:white" value="{{ $data->id }}" selected> {{ $data->district_name_en }} | {{ $data->district_name_bn }} </option>
                                    @endif
                                        <option  style="background-color: black; color:white" value="{{ $data->id }}"> {{ $data->district_name_en }} | {{ $data->district_name_bn }} </option>
                                @endforeach
                            </select>
                        </div>

                       
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <input readonly type="text" class="form-control sendbutton" name="city" value="@isset($user->district){{ $user->city}} @endisset">
                            </div>
                        </div>  --}}

                        <div class="col-md-6 district">
                            <label>Subdistrict</label>      
                                <input readonly type="text" class="form-control sendbutton" name="sub_district" value=" @isset($user->city){{ $user_sub_distrit_name->subdistrict_name_en}} @endisset">
                            </div>
                        <div class="col-md-6 edit_district">
                        
                            <select value="0"  class="form-control sendbutton" data-style="select-with-transition" title="Choose SubCategory" id="sub_district_id" name="subdistrict" >
                                <option selected style="background-color: black; color:white" value="">---Subdistrict ---
                                </option>
                                @foreach($subdistrict as $data)
                                    @if($data->id == $user->city)
                                        <option style="background-color: black; color:white" value="{{ $data->id }}" selected> {{ $data->subdistrict_name_en }} | {{ $data->subdistrict_name_bn }} </option>
                                    @endif
                                        <option  style="background-color: black; color:white" value="{{ $data->id }}"> {{ $data->subdistrict_name_en }} | {{ $data->subdistrict_name_bn }}</option>
                                @endforeach
                            </select>
                        </div>

                    

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control sendbutton" name="zip_code" value="{{ $user->zip_code }}" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> <b>Permanent Address</b></label>
                                <input type="text" class="form-control sendbutton"  name="address_permanent" value="{{ $user->address_permanent }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control sendbutton"  name="phone" value="{{ $user->phone }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea readonly class="form-control sendbutton" name="about" value="{{ $user->about }}" rows="4">{{ $user->about }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class = "edit">
                        <button type="button"  class="btn btn-primary edit">Edit</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                    <div class = "update">
                        <button type="submit" id="sendButton" class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>

                </form>

                <div id="password" class="tab-pane fade" role="tabpanel" aria-labelledby="password-tab">
                    <h3 class="mb-4">Password Settings</h3>
                    
                <form action="{{ route('FrontendBangla.user.changepassword',$user->id) }}" method="post" > 
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Old password</label>
                                <input readonly type="password" name="password" value="{{ $user->password }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New password</label>
                                <input type="password" class="form-control" id="new_pass" name = "new_pass">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm new password</label>
                                <input type="password" class="form-control" name ="confirm_new_pass" id="confirm_new_pass">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" id = "submit" >Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                    
                </form> 
                </div>
    
                <div class="tab-pane fade bookmark" id="bookmark" role="tabpanel" aria-labelledby="bookmark-tab">
                    <h3 class="mb-4">Bookmarks</h3>
                    <div class="row mb-3 border-bottom">
                        <div class="col-md-3">
                            <a href="">
                                <img src="{{asset ('public/frontend/assets/img/tn2.jpg') }}" alt="">
                            </a>
                        </div>

                        <div class="col-md-7">
                            <a href="">
                                <p class="title text-dark">JAPAN WORKING ON RELEASE OF OIL RESERVES AFTER US REQUEST</p>
                            </a>
                        </div>

                        <div class="col-md-2 d-flex align-items-start justify-content-end">
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </div>
                    </div>
                    
                    <div class="row mb-3 border-bottom">
                        <div class="col-md-3">
                            <a href="">
                                <img src="{{asset ('public/frontend/assets/img/tn2.jpg') }}" alt="">
                            </a>
                        </div>

                        <div class="col-md-7">
                            <a href="">
                                <p class="title text-dark">JAPAN WORKING ON RELEASE OF OIL RESERVES AFTER US REQUEST</p>
                            </a>
                        </div>

                        <div class="col-md-2 d-flex align-items-start justify-content-end">
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </div>
                    </div>
                    
                    <div class="row mb-3 border-bottom">
                        <div class="col-md-3">
                            <a href="">
                                <img src="{{asset ('public/frontend/assets/img/tn2.jpg') }}" alt="">
                            </a>
                        </div>

                        <div class="col-md-7">
                            <a href="">
                                <p class="title text-dark">JAPAN WORKING ON RELEASE OF OIL RESERVES AFTER US REQUEST</p>
                            </a>
                        </div>

                        <div class="col-md-2 d-flex align-items-start justify-content-end">
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</section>


@endsection

@push('js')
<script>
    // profile picture
    const chooseFile = document.getElementById("choose-file");
    const imgPreview = document.getElementById("img-preview");
    chooseFile.addEventListener("change", function () {
        getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
            imgPreview.style.display = "block";
            imgPreview.innerHTML = '<img src="' + this.result + '" />';
            });    
        }
    }
    // --end-- profile picture


    $( document ).ready(function() {
        $('.edit-image').hide();
        $('.update').hide();
        $('.edit').show();
        $('.edit_division').hide();
        $('.edit_district').hide();
        $('.division').show();
        $('.district').show();
    });

    $(".edit").click(function() {
        event.preventDefault();
        $('.edit-image').show();
        $('.img-circle').hide();
        $('.edit').hide();
        $('.update').show();
        $('.edit_division').show();
        $('.edit_district').show();
        $('.division').hide();
        $('.district').hide();
        $('.sendbutton').prop('readonly', false);
    
    });
    $("#sendButton").click(function(){
        $('#updatebutton').submit();
    });
    function getDistrictByDivision() {
            var id = $('#division_id').val();
            $.ajax({
                url: "{{ route('ajax.get_district_by_division') }}",
                method: 'GET',
                data: {
                    id: id,
                },
                
                success: function(data) {
                    // console.log(data);
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
                        $('#district_id option').css({'background-color':'white' })
                    }
                    getSubDistrictByDistrict()
                }
            });
           
        }  
        
        function getSubDistrictByDistrict() {
            var id = $('#district_id').val();
            $.ajax({
                url: "{{ route('ajax.get_sub_district_by_district') }}",
                method: "get",
                data: {
                    id: id,
                },
                success: function(data) {
                    // console.log(data);
                    $('#sub_district_id').html(null);
                    $('#sub_district_id').append($('<option >', {
                        value: '',
                        text: 'Choose One',
                    }));
                    for (var i = 0; i < data.length; i++) {
                        $('#sub_district_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].subdistrict_name_bn + ' | ' + data[i].subdistrict_name_en,
                        }));
                        $('#sub_district_id option').css({
                            'background-color':'white'
                        })
                    }
                }
            });

        } 

        $('#sendButton').click(function(){
            event.preventDefault();
        $('.sendbutton').prop('readonly', false);
    });

    
    // function getSubDistrictByDistrict(district) {
    //     var id = $('#district_id').val();
    //     $.ajax({
    //         url: "{{ route('ajax.get_sub_district_by_district') }}",
    //         method: "get",
    //         data: {
    //             id: id,
    //         },
    //         success: function(data) {
    //             $('#sub_district_id').html(null);
    //             $('#sub_district_id').append($('<option >', {
    //                 value: '',
    //                 text: 'Choose One',
    //             }));
    //             for (var i = 0; i < data.length; i++) {
    //                 $('#sub_district_id').append($('<option>', {
    //                     value: data[i].id,
    //                     text: data[i].subdistrict_name_bn + ' | ' + data[i].subdistrict_name_en,
    //                 }));
    //                 $('#sub_district_id option').css({
    //                     'background-color': 'black'
    //                 })
    //             }
    //         }
    //     });

    // }

   

    $( "#confirm_new_pass" ).focusout(function() {
        // $( "#focus-count" ).text( "focusout fired: " + focus + "x" );
        // alert('hi');
        var new_pass = document.getElementById("new_pass").value;
        var confirm_new_pass = document.getElementById("confirm_new_pass").value;
        if( new_pass == '' && confirm_new_pass == ''){
            alert('Please fill up all the fild before submit');
        }
        else if(new_pass !== confirm_new_pass ){
            alert('password Does not match');
            $('#confirm_new_pass').val('');
        }

    })


  </script>
@endpush