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
                        <h4 class="card-title">MANAGE SUBDISTRICTS</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">  Create Subdistrict </button>
                        </div>
                        <div class="material-datatables">
                            <table id=" " class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Division Bangla Name</th>
                                            <th class="text-center">Division English Name</th>
                                            <th class="text-center">District Bangla Name</th>
                                            <th class="text-center">District English Name</th>
                                            <th class="text-center">Bangla Name</th>
                                            <th class="text-center">English Name</th>
                                            <th class="text-center" style="width:13%;">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center">Division Bangla Name</th>
                                        <th class="text-center">Division English Name</th>
                                        <th class="text-center">District Bangla Name</th>
                                        <th class="text-center">District English Name</th>
                                        <th class="text-center">Bangla Name</th>
                                        <th class="text-center">English Name</th>
                                        <th class="text-center" >Action</th>
                                    </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @foreach ($subdistricts as $key => $subdistrict)
                                            <tr>
                                                <td class="text-left align-top">{{ ++$key }}</td>
                                                <td class="text-left align-top">{{ $subdistrict->division->division_name_bn }}</td>
                                                <td class="text-left align-top">{{ $subdistrict->division->division_name_en }}</td>
                                                <td class="text-left align-top">{{ $subdistrict->district->district_name_bn }}</td>
                                                <td class="text-left align-top">{{ $subdistrict->district->district_name_en }}</td>
                                                <td class="text-left align-top">{{ $subdistrict->subdistrict_name_bn }}</td>
                                                <td class="text-left align-top">{{ $subdistrict->subdistrict_name_en }}</td>
                                                <td class="td-actions text-center align-top">
                                                    <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                                                        <i class="material-icons">person</i>
                                                    </a>
                                                    <a href=""  onclick="subdis_edit({{$subdistrict->id }})"  data-toggle="modal" data-target="#edit_subdistrict"  class="btn btn-link text-success">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="{{ route('admin.subdistrict.delete', $subdistrict->id) }}"  data-toggle="tooltip" class="btn btn-link text-danger delete">
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
                        <h4 class="modal-title">ADD SUBDISTRICT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                            <form action="{{ route('admin.subdistrict.store')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Division Name</label>
                                    <div class="col-md-9">
                                        <select class="selectpicker division_id" data-style="select-with-transition" title="Choose Division" data-size="7" name="division_id" id="division_id">
                                            <option disabled> Choose Division</option>
                                                @foreach($divisions as $key => $division)
                                                    <option value="{{ $division->id }}">{{ $division->division_name_bn }} | {{ $division->division_name_en }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">District Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" data-style="select-with-transition" id="district_id" name="district_id" required="">
                                        </select>
                                    {{-- <select class="form-control district_id" data-style="select-with-transition" title="Choose District" data-size="7" name="district_id" id="district_id">
                                        <option disabled> Choose District</option>
                                            @foreach($districts as $key => $district)
                                                <option value="{{ $district->id }}">{{ $district->district_name_bn }} | {{ $district->district_name_en }}</option>
                                            @endforeach
                                    </select> --}}
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">বাংলা নাম</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="subdistrict_name_bn">
                                            @error('subdistrict_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">English Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="subdistrict_name_en">
                                            @error('subdistrict_name_en')
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
    <div class="modal fade" id="edit_subdistrict" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDIT SUBDISTRICTS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group md-form-group is-filled">
                        <form action="{{ route('admin.subdistrict.update')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                                <label class="col-md-3 col-form-label">Division Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" data-style="select-with-transition" data-size="7" id="division_id" name="division_id" required="">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">District Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" data-style="select-with-transition" id="district_id" name="district_id" required="">
                                    </select>
                                {{-- <select class="form-control district_id" data-style="select-with-transition" title="Choose District" data-size="7" name="district_id" id="district_id">
                                    <option disabled> Choose District</option>
                                        @foreach($districts as $key => $district)
                                            <option value="{{ $district->id }}">{{ $district->district_name_bn }} | {{ $district->district_name_en }}</option>
                                        @endforeach
                                </select> --}}
                                </div>
                            </div>
                            <div class="row">
                            <label class="col-md-3 col-form-label">বাংলা নাম</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class="form-control subdistrict_name_bn" type="text" name="subdistrict_name_bn">
                                        <input type="hidden" name="id" class="id">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <label class="col-md-3 col-form-label">English Name</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class="form-control subdistrict_name_en" type="text" name="subdistrict_name_en">
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
{{-- District Filter--}}
<script type="text/javascript">
    $(".division_id").change(function(){
        var id = $(this).val();
        $.ajax({
            url: 'subdistrict/filter/'+id,
            method: 'get',
            data: {},
            success: function(data) {
              $("select[name='district_id'").html('');
              $("select[name='district_id'").html(data.data);
            }
        });
    });
  </script>

{{-- Subdistrict Edit --}}
<script type="text/javascript">
   function subdis_edit(id){
     $.ajax({
           'url': 'subdistrict/edit/'+id,
           'type': 'GET',
           'data': {},
          success:function(data){
           // empty data
            $('.subdistrict_name_bn').empty();
            $('.subdistrict_name_en').empty();
            $('.id').empty();
            // append data
            $('.subdistrict_name_bn').val(data.data.subdistrict_name_bn);
            $('.subdistrict_name_en').val(data.data.subdistrict_name_en);
            $('.id').val(data.data.id);

            $("select[name='division_id'").html('');
            $("select[name='division_id'").html(data.division);

            $("select[name='district_id'").html('');
            $("select[name='district_id'").html(data.district);

         },
     });
   };
</script>
@endpush