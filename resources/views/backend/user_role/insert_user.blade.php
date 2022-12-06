@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">mail_outline</i>
                        </div>
                        <h4 class="card-title">INSERT USER</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action = "{{route('admin.user.store')}}" >
                            @csrf
                            <div class="form-group">
                                <label for="name_en" class="md-label-floating">Name (English)</label>
                                <input type="text" name = "name_en" class="form-control" id="name_en" value="{{Request::old('name_en') }}">
                                @error ('name_en') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="name_bn" class="md-label-floating">Name (Bangla)</label>
                                <input type="text" name = "name_bn" class="form-control" id="name_bn" value="{{Request::old('name_bn') }}">
                                @error ('name_bn') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
             
                            <div class="form-group">
                                <label for="email" class="md-label-floating">Email</label>
                                <input type="email" name = "email" class="form-control" id="email" value="{{Request::old('email') }}">
                                @error ('email') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
                            <!-- <div class="form-group">
                            <label for="examplePass" class="md-label-floating">Password</label>
                            <input type="password" class="form-control" id="examplePass">
                            </div> -->
                            <div class="form-group">
                                <div class = "row pt-3">
                                    <div class = "col-md-2">
                                        <label for="phone" class="md-label-floating">Phone</label>
                                    </div>
                                    <div class ="col-md-4">
                                        <input type="text"  readonly  class="form-control" id="phone" value = "+880">
                                    </div>
                                    <div class ="col-md-6">
                                        <input type="number" name = "phone" class="form-control" id="phone" value="{{Request::old('phone') }}">
                                        @error ('phone') <span style="color: red">{{ @$message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class = "row pt-3">
                                <div class = "col-md-3">
                                    <select class="form-control" data-style="select-with-transition" data-size="7" name = "division"  @error('division') is-invalid @enderror id="division_id" onchange="getDistrictByDivision(this)">
                                        <option  selected style="background-color: black" value="" >--- Division ---</option>
                                            @foreach ($divisions as $division)
                                                <option style="background-color: black" value="{{ $division->id }}">{{ $division->division_name_bn }} || {{ $division->division_name_en }}</option>
                                            @endforeach
                                    </select>
                                    @error('division')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ @$message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class = "col-md-3">
                                    <select class="form-control" data-style="select-with-transition" data-size="7" name="district" id="district_id" onchange="getSubDistrictByDistrict(this)">
                                        <option  selected style="background-color: black" value="" >--- District ---</option>
                                    </select>
                                </div>
                                <div class = "col-md-3">
                                    <select class="form-control" data-style="select-with-transition" data-size="7" id="subDistrict" name="sub_district" >
                                        <option  selected style="background-color: black" value="" >--- Sub District ---</option>
                                    </select>
                                </div>
                                <div class = "col-md-3">
                                    <div class="form-group">
                                        <label for="zip" class="md-label-floating">Zip Code</label>
                                        <input type="text" class="form-control" id="zip" name = "zip_code" value="{{Request::old('zip_code') }}">
                                        @error ('zip_code') <span style="color: red">{{ @$message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class ="row pt-3">
                                <div class ="col-md-6">
                                    <div class="form-group">
                                        <label for="permanent_adderss" class="md-label-floating"> Permanent Address</label>
                                        <textarea style ="background-color:#202940;color: white;" name="permanent_adderss" id="permanent_adderss" cols="60" rows="5" >{{ old('permanent_adderss') }}</textarea> <br>
                                        @error ('permanent_adderss') <span style="color: red">{{ @$message }}</span> @enderror
                                    </div>
                                </div>
                                <div class ="col-md-6">
                                    <div class="form-group">
                                        <label for="present_adderss" class="md-label-floating"> Present Address</label>
                                        <textarea style = "background-color:#202940;color: white;" name="present_adderss" id="present_adderss" cols="60" rows="5" >{{ old('present_adderss') }}</textarea>  <br>
                                        @error ('present_adderss') <span style="color: red">{{ @$message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <label class="form-group">Type</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" data-style="select-with-transition" data-size="7" id="type" name="type">
                                        <option  selected style="background-color: black" value="" >--- Select Type ---</option>
                                        @if(Auth::user()->type == 'super_admin')

                                            <option  value="admin" style="background-color: black" >Admin</option> 
                                            <option  value="editor" style="background-color: black" >Editor</option>  
                                            <option  value="sub_editor" style="background-color: black" >Sub-Editor</option> 
                                            <option  value="reporter" style="background-color: black" >Reporter</option>	

                                        @elseif(Auth::user()->type == 'admin') 

                                            <option  value="editor" style="background-color: black" >Editor</option>  
                                            <option  value="sub_editor" style="background-color: black" >Sub-Editor</option>  
                                            <option  value="reporter" style="background-color: black" >Reporter</option>	

                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class = "row pt-3">
                            <div class="col-md-12">Roles</div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Category Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "category_role" type="checkbox"  >
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Country Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "country_role" type="checkbox" >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Ads Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "ads_role" type="checkbox"  >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Comment Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "comments_role" type="checkbox" >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Page Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "page_role" type="checkbox" >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Gallery Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "gallery_role" type="checkbox"  >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">SEO Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "seo_role" type="checkbox" >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Settings Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "settings_role" type="checkbox"  >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Post Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "post_role" type="checkbox"  >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">Blog Post Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "blog_role" type="checkbox" >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-md-3">
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <label class="form-group">User Role</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-check-label"> 
                                                <input class="form-check-input role" name = "user_role" type="checkbox" >
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class = "row pt3">
                                <div class = "col-md-3">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th class="text-center">Category Role</th>
                                            <th class="text-center">Country Role</th>
                                            <th class="text-center">Ads Role</th>
                                            <th class="text-center">Comment Role</th>
                                            <th class="text-center">Page Role</th>
                                            <th class="text-center">Gallery Role</th>
                                            <th class="text-center">SEO Role</th>
                                            <th class="text-center">Settings Role</th>
                                            <th class="text-center">Users Role</th>
                                            <th class="text-center">Post Role</th>
                                            <th class="text-center">Blog Role</th>
                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            
                                                <th class="text-center">Category Role</th>
                                                <th class="text-center">Country Role</th>
                                                <th class="text-center">Ads Role</th>
                                                <th class="text-center">Comment Role</th>
                                                <th class="text-center">Page Role</th>
                                                <th class="text-center">Gallery Role</th>
                                                <th class="text-center">SEO Role</th>
                                                <th class="text-center">Settings Role</th>
                                                <th class="text-center">Users Role</th>
                                                <th class="text-center">Post Role</th>
                                                <th class="text-center">Blog Role</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <td style = "text-align:center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input role" name = "category_role" type="checkbox" value="" >
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td style = "text-align:center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input role" name = "country_role" type="checkbox" value="" >
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td style = "text-align:center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input role" name = "ads_role" type="checkbox" value="" >
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td style = "text-align:center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input role" name = "comment_role" type="checkbox" value="" >
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            <div class="card-footer ">
                                <input type="submit" class="btn btn-fill btn-primary" value = "submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">
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

                        $('#district_id').append($('<option >', {
                            value: data[i].id,
                            text: data[i].district_name_bn + ' | ' + data[i].district_name_en,
                        }));
                        $('#district_id option').css({
                            'background-color': 'black'
                        })
                        getSubDistrictByDistrict(data[i].id);
                    }
                }
            });

        }
    </script>
    <script>
        function getSubDistrictByDistrict(district) {
            var id = $('#district_id').val();
            $.ajax({
                url: "{{ route('ajax.get_sub_district_by_district') }}",
                method: "get",
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#subDistrict').html(null);
                    $('#subDistrict').append($('<option >', {
                        value: '',
                        text: 'Choose One',
                    }));
                    for (var i = 0; i < data.length; i++) {
                        $('#subDistrict').append($('<option >', {
                            value: data[i].id,
                            text: data[i].subdistrict_name_bn + ' | ' + data[i].subdistrict_name_en,
                        }));
                        $('#subDistrict option').css({
                            'background-color': 'black'
                        })
                        // getSubDistrictByDistrict(data[i].id);
                    }
                }
            });

        }
    </script>
@endpush
