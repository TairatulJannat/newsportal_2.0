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
                            <h4 class="card-title">MANAGE IMAGES</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Create Image</button>
                            </div>
                            <div class="material-datatables">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Image Title Bangla</th>
                                            <th class="text-center">Image Title English</th>
                                            {{-- <th class="text-center">Image Description Bangla</th>
                                            <th class="text-center">Image Description English</th> --}}
                                            <th class="text-center" style="width:18%;">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Image Title Bangla</th>
                                        <th class="text-center">Image Title English</th>
                                        <th class="text-center">Image Description Bangla</th>
                                        <th class="text-center">Image Description English</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot> --}}
                                    <tbody>
                                        @foreach ($imagies as $key => $image)
                                            <tr>
                                                <td class="text-left align-top">{{ ++$key }}</td>
                                                <td class="text-left align-top"><img width="50" style="object-fit: cover;"
                                                        height="50" src="{{ asset($image->original_filename) }}"
                                                        style="object-fit: cover;"></td>
                                                <td class="text-center">
                                                    @if ($image->image_status == 1)
                                                        <div class="togglebutton">  
                                                            <label>
                                                                <input type="checkbox" checked
                                                                    data-id="{{ $image->id }}"
                                                                    onchange="image_status({{ $image->id }})"
                                                                    name="image_status" class="image_status"
                                                                    value="{{ $image->image_status }}">
                                                                <span class="toggle"></span>
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="togglebutton"> 
                                                            <label>
                                                                <input type="checkbox"
                                                                    data-id="{{ $image->id }}"
                                                                    onchange="image_status({{ $image->id }})"
                                                                    name="image_status" class="image_status"
                                                                    value="{{ $image->image_status }}">
                                                                <span class="toggle"></span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="text-center align-top">{{ $image->image_title_bn }}</td>
                                                <td class="text-center align-top">{{ $image->image_title_en }}</td>
                                                {{-- <td class="text-left align-top">{!! $image->image_description_bn !!}</td>
                                                <td class="text-left align-top">{!! $image->image_description_en !!}</td> --}}



                                                <td class="td-actions text-center align-top">
                                                    <a href="" data-toggle="tooltip" class="btn btn-link text-info">
                                                        <i class="material-icons">person</i>
                                                    </a>
                                                    <a href="" onclick="image_edit({{ $image->id }})" data-toggle="modal"
                                                        data-target="#edit_image" class="btn btn-link text-success">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="{{ route('admin.image.delete', $image->id) }}"
                                                        data-toggle="tooltip" class="btn btn-link text-danger delete">
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
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ADD IMAGE</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group md-form-group is-filled">
                                <form action="{{ route('admin.image.store') }}" method="post"
                                    enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Image</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{ asset('public/uploads/backend/ads/image_icon.png') }}"
                                                        style="display: inline-block;position:block;object-fit:cover; border: 1px solid #ddd; width:100px; height:100px;"
                                                        alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-primary btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="original_filename" />
                                                    </span>
                                                    <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists"
                                                        data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Title Bangla Name</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default">
                                                <input class="form-control" type="text" name="image_title_en">
                                                @error('image_title_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Title English Name</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default">
                                                <input class="form-control" type="text" name="image_title_bn">
                                                @error('image_title_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Description Bangla</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default">
                                                <input class="form-control" type="text" name="image_description_bn">
                                                @error('image_description_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Description English</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default">
                                                <input class="form-control" type="text" name="image_description_en">
                                                @error('image_description_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-1" type="button"
                                            data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" name="submit" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit modal-->
        <div class="modal fade" id="edit_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT IMAGEGALLERY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                            <form action="{{ route('admin.image.update') }}" method="POST" enctype="multipart/form-data"
                                class="form-horizontal" autocomplete="off">
                                @csrf

                                <div class="row">
                                    <label class="col-md-3 col-form-label">Image</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ asset('public/uploads/backend/ads/image_icon.png') }}"
                                                    id="original_filename"
                                                    style="display: inline-block;position:block;object-fit:cover; border: 1px solid #ddd; width:100px; height:100px;"
                                                    alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="original_filename" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists"
                                                    data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="color:red" id="errImggallery"></p>
                                </div>

                                <div class="row">
                                    <label class="col-md-3 col-form-label">Title Bangla Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="image_title_bn"
                                                id="image_title_bn">
                                            <input type="hidden" class="id" name="id">
                                            @error('image_title_bn')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label"> Title English Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="image_title_en"
                                                id="image_title_en">
                                            <input type="hidden" class="id" name="id">
                                            @error('image_title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Description Bangla</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            {{-- <input class="form-control" type="text" name="image_description_bn" id="image_description_bn"> --}}
                                            <textarea class="form-control" name="image_description_bn"
                                                id="image_description_bn" cols="30" rows="10"></textarea>
                                            @error('image_description_bn')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Description English</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            {{-- <input class="form-control" type="text" name="image_description_en" id="image_description_en"> --}}
                                            <textarea class="form-control" name="image_description_en"
                                                id="image_description_en" cols="30" rows="10"></textarea>
                                            @error('image_description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Update</button>
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
        function image_edit(id) {

            $.ajax({
                'url': 'imagegallery/edit/' + id,
                'type': 'GET',
                'data': {},
                success: function(data) {
                    console.log(data.original_filename);

                    $('#image_title_bn').empty();
                    $('#image_title_en').empty();
                    $('.id').empty();
                    var APP_URL = {!! json_encode(url('/')) !!}
                    image = APP_URL + '/' + data.original_filename;
                    $("#original_filename").attr("src", image);
                    $('#image_title_bn').val(data.image_title_bn);
                    $('#image_title_en').val(data.image_title_en);
                    $('#image_description_bn').text(data.image_description_bn);
                    $('#image_description_en').text(data.image_description_en);
                    $('.id').val(data.id);
                },
            });
        };
    </script>

    <script>
        function image_status(id) {
            // alert(123)
            var status = $(this).prop('checked') == true ? 1 : 0;
            // alert(status);
            alert(123);
            $.ajax({

                url: 'imagegallery/image_status/' + id,
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
