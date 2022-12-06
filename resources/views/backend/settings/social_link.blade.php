@extends('backend.layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">Edit Social Link pages -
                        <small class="category">Complete your Social link pages</small>
                        </h4>
                    </div>
                    <div class="card-body">
                  
                        @isset($sociallink)

                            <form action="{{ route( 'admin.sociallink.update' ) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="id"class="form-control" value="{{$sociallink->id}}"hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Facebook</label>
                                            <input type="text" name="facebook"class="form-control" value="{{$sociallink->facebook}}" required>
                                            @error('facebook')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Twitter</label>
                                            <input type="text" name="twitter" class="form-control" value="{{$sociallink->twitter}}" required>
                                            @error('twitter')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Youtube</label>
                                            <input type="text" name="youtube" class="form-control" value="{{$sociallink->youtube}}" required>
                                            @error('youtube')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Linkedin</label>
                                            <input type="text" name="linkedin" class="form-control" value="{{$sociallink->linkedin}}" required>
                                            @error('linkedin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="md-label-floating">Instagram</label>
                                            <input type="text" name="instagram" class="form-control" value="{{$sociallink->instagram}}" required>
                                            @error('instagram')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                       
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        
                                        <div class="form-group">
                                        
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div> -->

                                <button type="submit" name="submit" class="btn btn-rose pull-right">Update Link</button>
                                <div class="clearfix"></div>
                            </form>

                        @else
                            <form action="{{ route( 'admin.sociallink.update' ) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Facebook</label>
                                            <input type="text" name="facebook"class="form-control" required>
                                            @error('facebook')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Twitter</label>
                                            <input type="text" name="twitter" class="form-control" required>
                                            @error('twitter')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Youtube</label>
                                            <input type="text" name="youtube" class="form-control" required>
                                            @error('youtube')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Linkedin</label>
                                            <input type="text" name="linkedin" class="form-control" required>
                                            @error('linkedin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="md-label-floating">Intagram</label>
                                            <input type="text" name="instagram" class="form-control" required>
                                            @error('instagram')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-rose pull-right" href="{{route('admin.seo.store')}}">Insert New Link</button>
                                <div class="clearfix"></div>
                            </form>  
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection

<!-- summernote css/js -->

