@extends('backend.layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">CREATE PAGE TABLE -
                            <small class="category">Complete your Page Table</small>
                        </h4>
                    </div>
                    <div class ="col-md mt-2">
                        <div class="togglebutton">
                            <label class="form-group" id ="bangla">Bangla</label>
                                <label>
                                    <input type="checkbox" checked="" class="en_bn">
                                    <span class="toggle"></span>
                                </label>
                            <label class="form-group" id ="english" style=" color:white; font-weight:bold"> English</label>
                        </div> 
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.pagetable.store') }}" method="post">
                            @csrf
                            <div class ="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="selectpicker" data-style="select-with-transition" title="Page Type" value="" name="page_type" id="page_type" >

                                            <option selected disabled style="background-color: white; color:black"  >--Select One --</option>

                                            <option style="background-color: #202940; color:white" value="about">About</option>
                                    
                                            <option style="background-color: #202940; color:white" value="contuct">Contuct</option>

                                            <option style="background-color: #202940; color:white" value="service">Service</option>                          

                                            <option style="background-color: #202940; color:white" value="editorial_policy">Editorial Policy</option>
                                    
                                            <option style="background-color: #202940; color:white" value="terms_of_services">Terms Of Services</option>

                                            <option style="background-color: #202940; color:white" value="privacy_policy">Privacy Policy</option>
                                    
                                            <option style="background-color: #202940; color:white" value="sample_policy">Sample Policy</option>

                                            <option style="background-color: #202940; color:white" value="help">Help</option>
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row bn">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-group">পৃষ্ঠার শিরোনাম</label>
                                        <input type="text" name="page_title_bn" class="form-control">
                                        @error ('page_title_bn') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row en">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-group">Page Title English</label>
                                        <input type="text" name="page_title_en" class="form-control">
                                        @error ('page_title_en') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 bn">
                                    <div class="form-group">
                                        <label class="form-control"><strong>বর্ণনা</strong></label>
                                        <textarea  name="description_title_bn" class="ckeditor"></textarea><br>
                                        @error ('description_title_bn') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            
                                <div class="col-md-12 en">
                                    <div class="form-group">
                                        <label class="form-control"><strong>Description English</strong></label>
                                        <textarea  name="description_title_en" class="ckeditor"></textarea> <br>
                                        @error ('description_title_en') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right" href="">Save</button>
                            <div class="clearfix"></div>
                        </form>  
                    </div>
                </div>
            </div>
       </div>
    </div>
</div> 

@endsection
@push('js')
 
<script>
    $( document ).ready(function() {
        $('.bn').hide();
        // document.getElementById("bn").style.visibility = "hidden";
    });
   $(function() {
     $('.en_bn').change(function() {
         var status = $(this).prop('checked') == true ? 1 : 0; 
         if(status==0){
            $('.en').hide();
            $('.bn').show();
            $('#bangla').css({ 'margin':'auto','font-weight':' bold','color': 'white' })
            $("#english").removeAttr("style");

            }
        else{
            $('.bn').hide();
            $('.en').show();
            $('#english').css({'margin':'auto','font-weight':' bold','color': 'white' })
            $("#bangla").removeAttr("style");
        }
     })
   })
</script>

@endpush


