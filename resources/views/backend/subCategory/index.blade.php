@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">MANAGE SUBCATEGORIES</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Create Sub Category</button>
                        </div>
                        <div class="material-datatables">
                            <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="td-actions text-center">SN</th>
                                        <th class="td-actions text-center">Bangla Name</th>
                                        <th class="td-actions text-center">English Name</th>
                                        <th class="td-actions text-center">Category bn Name</th>
                                        <th class="td-actions text-center">Category en Name</th>
                                        <th class="td-actions text-center" style="width: 13%;">Show on Header</th>
                                        <th class="td-actions text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($subcategories as $key => $subcategory)
                                        <tr>
                                            <td class="text-left align-top">{{ ++$key }}</td>
                                            <td class="text-left align-top">{{ $subcategory->subcategory_name_bn }}</td>
                                            <td class="text-left align-top">{{ $subcategory->subcategory_name_en }}</td>
                                            <td class="text-left align-top">
                                                @isset($subcategory->category)
                                                    {{ $subcategory->category->category_name_bn }}
                                                @endisset
                                            </td>
                                            <td class="text-left align-top">
                                                @isset($subcategory->category)
                                                    {{ $subcategory->category->category_name_en }}
                                                @endisset
                                            </td>
                                            <td class="text-center">
                                                @if($subcategory->show_on_header == 1)
                                                    <div class="togglebutton">

                                                        <label>
                                                            <input type="checkbox" checked
                                                                    data-id="{{ $subcategory->id }}"
                                                                    onchange="show_on_header({{ $subcategory->id }})"
                                                                    name="show_on_header" class="header_update"
                                                                    value="{{ $subcategory->show_on_header }}">
                                                                <span class="toggle"></span>
                                                            </label>
                                                    </div>
                                                @else
                                                    <div class="togglebutton">

                                                        <label>
                                                            <input type="checkbox"
                                                                data-id="{{ $subcategory->id }}"
                                                                onchange="show_on_header({{ $subcategory->id }})"
                                                                name="show_on_header" class="header_update"
                                                                value="{{ $subcategory->show_on_header }}">
                                                            <span class="toggle"></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>

                                            <td class="td-actions text-center align-top">
                                                <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                                                    <i class="material-icons">person</i>
                                                </a>
                                                <a href=""  onclick="cat_edit({{$subcategory->id }})"  data-toggle="modal" data-target="#edit_category"  class="btn btn-link text-success">
                                                    <i class="material-icons">edit</i>
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

        <!-- Add modal-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD SUBCATEGORY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                            <form action="{{ route('admin.subcategory.store')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Category Name</label>
                                    <div class="col-md-9">
                                        <select class="selectpicker" data-style="select-with-transition" title="Choose Category" data-size="7" name="category_id" required>
                                            <option disabled> Choose Category</option>
                                                @foreach($categories as $key => $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name_bn }} | {{ $category->category_name_en }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">বাংলা নাম</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="subcategory_name_bn">
                                            @error('subcategory_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">English Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="subcategory_name_en">
                                            @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Show Header</label>
                                    <div class="col-md-9 ">
                                        <div class="togglebutton">
                                            <label>
                                            <input type="checkbox" id="togBtn" name="show_on_header" value="1">
                                            <span class="toggle"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Status</label>
                                    <div class="col-md-9">
                                        <select class="selectpicker" data-style="select-with-transition" title="Choose Status" data-size="7" name="status">
                                            <option disabled> Choose</option>
                                            <option value="1">Active </option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit modal-->
        <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT SUBCATEGORY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                            <form action="{{ route('admin.subcategory.update')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Category Name</label>
                                    <div class="col-md-9">
                                        {{-- <select class="selectpicker" data-style="select-with-transition" data-size="7" name="category_id" id="category_id">

                                        </select> --}}
                                        <select class="form-control" data-style="select-with-transition" data-size="7" id="category_id" name="category_id" required="">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">বাংলা নাম</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control subcategory_name_bn" type="text" name="subcategory_name_bn">
                                            <input type="hidden" name="id" class="id">
                                            @error('category_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">English Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control subcategory_name_en" type="text" name="subcategory_name_en">
                                            @error('category_bangla_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
   function cat_edit(id){
     $.ajax({
           'url': 'subcategory/edit/'+id,
           'type': 'GET',
           'data': {},
          success:function(data){
           // empty data
           $('.subcategory_name_bn').empty();
           $('.subcategory_name_en').empty();
           $('.id').empty();
           // append data
           $('.subcategory_name_bn').val(data.data.subcategory_name_bn);
           $('.subcategory_name_en').val(data.data.subcategory_name_en);
           $('.id').val(data.data.id);

           $("select[name='category_id'").html('');
            $("select[name='category_id'").html(data.category);
         },
     });
   };
</script>
<script>
   $(function() {
     $('.status_update').change(function() {
         var status = $(this).prop('checked') == true ? 1 : 0;
         var id = $(this).data('id');

         $.ajax({

             url: 'subcategory/status-update/'+id,
             type: "GET",
             data: {'status': status, 'id': id},

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
<script>
//    $(function() {
//      $('.header_update').change(function() {
//          var status = $(this).prop('checked') == true ? 1 : 0;
//          var id = $(this).data('id');

//          $.ajax({

//              url: 'subcategory/show-header-update/'+id,
//              type: "GET",
//              data: {'status': status, 'id': id},

//              success: function(data){
//                Swal.fire(
//                  'Success!',
//                  '',
//                  'success'
//                )
//              }
//          });
//      })
//    })

   function show_on_header(id) {
            var status = $(this).prop('checked') == true ? 1 : 0;
            // alert(status);
            // alert(123);
            $.ajax({

                url: "{{route('admin.subcategory.header_update')}}"
                type: "GET",
                data: {
                    'status': status,
                    'id': id
                },

                success: function(data) {
                    Swal.fire(
                        'Success!',
                        '',
                        'success'
                    )

                }
            });
        }


</script>


@endpush
