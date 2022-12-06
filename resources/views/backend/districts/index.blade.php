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
                        <h4 class="card-title">MANAGE DISTRICTS</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">  Create District</button>
                        </div>
                        <div class="material-datatables">
                            <table id=" " class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center">Division Bangla Name</th>
                                        <th class="text-center">Division English Name</th>
                                        <th class="text-center">Bangla Name</th>
                                        <th class="text-center">English Name</th>
                                        <th class="text-center">Bangla Slug</th>
                                        <th class="text-center">English Slug</th>
                                        <th class="text-center" style="width:13%;">Action</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Division Bangla Name</th>
                                    <th class="text-center">Division English Name</th>
                                    <th class="text-center">Bangla Name</th>
                                    <th class="text-center">English Name</th>
                                    <th class="text-center">Bangla Slug</th>
                                    <th class="text-center">English Slug</th>
                                    <th class="text-center" style="width:13%;">Action</th>
                                </tr>
                                </tfoot> --}}
                                <tbody>
                                    @foreach ($districts as $key => $district)
                                        <tr>
                                            <td class="text-left align-top">{{ ++$key }}</td>
                                            <td class="text-left align-top">{{ $district->division->division_name_bn }}</td>
                                            <td class="text-left align-top">{{ $district->division->division_name_en }}</td>
                                            <td class="text-left align-top">{{ $district->district_name_bn }}</td>
                                            <td class="text-left align-top">{{ $district->district_name_en }}</td>
                                            <td class="text-left align-top">{{ $district->district_slug_bn  }}</td>
                                            <td class="text-left align-top">{{ $district->district_slug_en  }}</td>
                                            <td class="td-actions text-center align-top">
                                                <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                                                    <i class="material-icons">person</i>
                                                </a>
                                                <a href=""  onclick="div_edit({{$district->id }})"  data-toggle="modal" data-target="#edit_district"  class="btn btn-link text-success">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="{{ route('admin.district.delete', $district->id) }}"  data-toggle="tooltip" class="btn btn-link text-danger delete">
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
        <!-- Add modal-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD DISTRICT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                            <form action="{{ route('admin.district.store')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Division Name</label>
                                    <div class="col-md-9">
                                        <select class="selectpicker" data-style="select-with-transition" title="Choose Category" data-size="7" name="division_id">
                                            <option disabled> Choose Division </option>
                                                @foreach($divisions as $key => $division)
                                                    <option value="{{ $division->id }}">{{ $division->division_name_bn }} | {{ $division->division_name_en }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">বাংলা নাম</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="district_name_bn">
                                            @error('district_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">English Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="district_name_en">
                                            @error('district_name_en')
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
   <!-- Edit modal-->
    <div class="modal fade" id="edit_district" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDIT DISTRICT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group md-form-group is-filled">
                        <form action="{{ route('admin.district.update')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                                <label class="col-md-3 col-form-label">Division Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="division_id" name="division_id" required="">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">বাংলা নাম</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class="form-control district_name_bn" type="text" name="district_name_bn">
                                        <input type="hidden" class="id" name="id">
                                        @error('district_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">English Name</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class="form-control district_name_en" type="text" name="district_name_en">
                                        @error('district_name_en')
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
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-link">Nice Button</button>
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
   function div_edit(id){
     $.ajax({
           'url': 'district/edit/'+id,
           'type': 'GET',
           'data': {},
          success:function(data){
           // empty data
           $('.district_name_bn').empty();
           $('.district_name_en').empty();
           $('.id').empty();
           // append data
           $('.district_name_bn').val(data.data.district_name_bn);
           $('.district_name_en').val(data.data.district_name_en);
           $('.id').val(data.data.id);
           $("select[name='division_id'").html('');
             $("select[name='division_id'").html(data.division);
         },
     });
   };
</script>
@endpush