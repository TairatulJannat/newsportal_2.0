@extends('backend.layouts.app')
@section('content')
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header card-header-primary card-header-icon ">
                  <div class="card-icon">
                     <i class="material-icons">summarize</i>
                  </div>
                  <h4 class="card-title">Blog blog_comment List </h4>
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
                            @foreach ($blog_comments as $key =>$blog_comment)
                            <tr>
                              <td class="text-center">{{ ++$key }}</td>
                              <td class="text-center">{{ $blog_comment->name }}</td>
                              <td class="text-center">{{ $blog_comment->email }}</td>
                              <td class="text-center">{{ $blog_comment->message }}</td>
                        
                              <td class="text-center">
                                  @if($blog_comment->approved == 1)
                                  <div class="togglebutton">
                                     <label>
                                     <input type="checkbox" checked="" data-id="{{$blog_comment->id}}" name="approved" onclick="approve({{$blog_comment->id}})" class="approved" value="{{$blog_comment->approved }}">
                                     <span class="toggle"></span>
                                     </label>
                                  </div>
                                  @else 
                                  <div class="togglebutton">
                                     <label>
                                     <input type="checkbox" unchecked="" data-id="{{$blog_comment->id}}" name="approved" onclick="approve({{$blog_comment->id}})"  class="approved" value="{{ $blog_comment->approved }}">
                                     <span class="toggle"></span>
                                     </label>
                                  </div>
                                  @endif
                               </td>
                              
                              <td class="td-actions text-center">
                              <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                                  <i class="material-icons">person</i>
                              </a>
                              <a href="{{ route('backend.blog_comment.delete', $blog_comment->id) }}"   class="btn btn-link text-danger delete">
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
            
            url: "{{ route('backend.blog_comment.update') }}" ,
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
        $(function() {
        $('.approved').change(function() {
            var approved = $(this).prop('checked') == true ? 1 : 0; 
            var id = $(this).data('id'); 
            $.ajax({
        
                url: "{{ route('backend.blog_comment.update') }}",
                type: "GET",
                data: {'approved': approved, 'id': id},
        
                success: function(data){
                    Swal.fire(
                    'Success!',
                    '',
                    'success'
                    )
                }
            });
        })
        })
    </script>

@endpush