@extends('backend.layouts.app')
@section('content')

@php
    $user_image = Storage::url(Auth::user()->image);
@endphp

<div class="content">
    <div class="container-fluid">
        <div class="col-md-8 col-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard" data-color="purple" id="wizardProfile">
                    <form action="" method="" autocomplete="off">
                    <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                            CREATE PROFILE 
                            </h3>
                            <h5 class="card-description">Create Your Information.</h5>
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
                                                        <img src="http://localhost/newsportal_2.0/public{{ $user_image }}" class="picture-src" id="wizardPicturePreview" title="" />
                                                    </div>

                                                @else

                                                    <div class="picture">
                                                        <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                    </div>

                                                @endif
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
                                                    <input readonly type="text" class="form-control" id="exampleInput1" name="firstname" value = "{{ $user->name_en}}">
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
                                                    <input readonly type="text" class="form-control" id="exampleInput11" name="lastname" value = "{{ $user->name_bn}}">
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
                                            <div class="form-group"> 
                                                 <label>Division</label> 
                                                <input readonly  type="text" class="form-control" value = "{{ $division->division_name_en }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>District</label>
                                                <input readonly type="text" class="form-control" value = "{{ $district->district_name_en}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" value = "{{ $user->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Permanent Address</label>
                                                <input type="text" class="form-control" value = "{{ $user->address_permanent}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Present Address</label>
                                                <input type="text" class="form-control" value = "{{ $user->address_present}}">
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
                                <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish" style="display: none;">
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
  </script>
@endpush