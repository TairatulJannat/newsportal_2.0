@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route ('changedPassword') }}" autocomplete="off">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mail_outline</i>
                                </div>
                                <h4 class="card-title">STACKED FORM</h4>
                            </div>
                   
                            <div class="card-body ">
                    
                                <div class="form-group">
                                    <label for="exampleEmail" class="md-label-floating">Email Address</label>
                                    <input readonly type="email" class="form-control" name = "email" id="email" value = "{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="examplePass" class="md-label-floating">Password</label>
                                    <input  readonly type="password" class="form-control" name ="pass" id="pass" value = "{{$user->password}}">
                                </div>
                                <div class="form-group">
                                    <label for="examplePass" class="md-label-floating">New Password</label>
                                    <input type="password" class="form-control" id="new_pass" name = "new_pass">
                                </div>
                                <div class="form-group">
                                    <label for="examplePass" class="md-label-floating">Confirm New Password</label>
                                    <input type="password" class="form-control" name ="confirm_new_pass" id="confirm_new_pass">
                                </div>
                        
                            </div>

                            <div class="card-footer "> 
                                <button type="submit" id = "submit" class="btn btn-fill btn-primary">Submit</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
@push('js')
<script>
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