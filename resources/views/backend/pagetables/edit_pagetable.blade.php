@extends('backend.layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">EDIT PAGETABLE
                            <small class="category">Complete your Pagetable Profile</small>
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="toolbar">
                            <a href="{{route('admin.pagetable.show') }}"><button class="btn btn-primary"  data-target="#exampleModalCenter">View Page Table</button></a> 
                        </div>
                        <form action="{{ route('admin.pagetable.update') }}" method="post">
                            @csrf
                            <input type="hidden" class="id" name="id" value ="{{ $pagetables->id }}" > 
                            <div class ="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="selectpicker" data-style="select-with-transition" title="Page Type" value="" name="page_type" id="page_type" >

                                            <option selected disabled style="background-color: white; color:black" value = "{{$pagetables->page_type}}" >{{$pagetables->page_type}}</option>

                                            <option style="background-color: #202940; color:white" value="about">About</option>
                                    
                                            <option style="background-color: #202940; color:white" value="contuct">Contuct</option>

                                            <option style="background-color: #202940; color:white" value="service">Service</option>                          

                                            <option style="background-color: #202940; color:white" value="editorial_policy">Editorial Policy</option>
                                    
                                            <option style="background-color: #202940; color:white" value="terms-of_services">Terms Of Services</option>

                                            <option style="background-color: #202940; color:white" value="privacy_policy">Privacy Policy</option>
                                    
                                            <option style="background-color: #202940; color:white" value="sample_policy">Sample Policy</option>

                                            <option style="background-color: #202940; color:white" value="help">Help</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">পৃষ্ঠার শিরোনাম</label>
                                        <input type="text" name="page_title_bn"class="form-control" value="{{ $pagetables->page_title_bn }}"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Page Title English</label>
                                        <input type="text" name="page_title_en" class="form-control" value="{{ $pagetables->page_title_en }}">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">বর্ণনা</label>
                                        <!-- <input type="text" name="description_title_bn" class="form-control" > -->
                                        <textarea class="ckeditor form-control" name="description_title_bn" >{!! $pagetables->description_title_bn !!}</textarea>        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control">Description  English</label>
                                        <!-- <input type="text" name="description_title_en" > -->
                                        <textarea class="ckeditor form-control" name="description_title_en" class="form-control">{!! $pagetables->description_title_en !!}</textarea>    
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Update</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection



