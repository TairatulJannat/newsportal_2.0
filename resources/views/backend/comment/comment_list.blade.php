@extends('backend.layouts.app')
@section('content')
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header card-header-primary card-header-icon ">
                  <div class="card-icon">
                     <i class="material-icons">comment</i>
                  </div>
                  <h4 class="card-title">Comment List </h4>
               </div>
              
                  <div class="material-datatables">
                     <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                           <tr>
                              <th class="text-center"style="width:10%;">SN</th>
                              <th class="text-center" style="width:10%;">Name</th>
                              <th class="text-center" style="width:10%;">Email</th>
                              <th class="text-center" style="width:10%;">Massage</th>
                              <th class="text-center" style="width:10%;">Approved</th>
                              <th class="text-center" style="width:10%;">Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                            
                           <tr>
                                
                            <th class="text-center"style="width:10%;">SN</th>
                            <th class="text-center" style="width:10%;">Name</th>
                            <th class="text-center" style="width:10%;">Email</th>
                            <th class="text-center" style="width:10%;">Massage</th>
                            <th class="text-center" style="width:10%;">Approved</th>
                            <th class="text-center" style="width:10%;">Action</th>
                        </tfoot>
                        <tbody>
                            @foreach ($comments as $key =>$comment)
                            <tr>
                              <td class="text-center">{{ ++$key }}</td>
                              <td class="text-center">{{ $comment->name }}</td>
                              <td class="text-center">{{ $comment->email }}</td>
                              <td class="text-center">{{ $comment->message }}</td>
                        
                              <td class="text-center">
                                  @if($comment->approved == 1)
                                    <div class="togglebutton">
                                        <label>
                                        <input type="checkbox" checked data-id="{{$comment->id}}" name="approved" onclick="approve( {{$comment->id}} )" class="approved" value="{{$comment->approved }}">
                                        <span class="toggle"></span>
                                        </label>
                                    </div>
                                  @else 
                                    <div class="togglebutton">
                                        <label>
                                        <input type="checkbox"  data-id="{{$comment->id}}" name="approved" onclick="approve({{$comment->id}})" class="approved" value="{{ $comment->approved }}">
                                        <span class="toggle"></span>
                                        </label>
                                    </div>
                                  @endif
                               </td>
                              
                              <td class="td-actions text-center">
                              <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                                  <i class="material-icons">person</i>
                              </a>
                              <a href="{{ route('admin.comment.delete', $comment->id) }}"   class="btn btn-link text-danger delete">
                                  <i class="material-icons">close</i>
                              </a>
                              </td>
                               
                           </tr>   
                           @endforeach
                       
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- end content-->
            </div>
            <!--  end card  -->
         </div>
         <!-- end col-md-12 -->
      </div>
      <!-- end row -->
@endsection

@push('js')

<script>
    function approve(id){
        var status = $(this).prop('checked') == true ? 1 : 0; 
        // alert(status);
        // alert(id);
        $.ajax({
            
            url: "{{ route('admin.comment.approved') }}" ,
            type: "GET",
            data: {'id': id},

            success: function(data){
            Swal.fire(
                'Success!',
                '',
                'success'
            )
            setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
            }, 2000);
            }
        });
    }
    
 </script>

@endpush