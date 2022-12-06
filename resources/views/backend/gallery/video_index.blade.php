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
                            <h4 class="card-title">MANAGE VIDEOS</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create
                                    Video</button>
                            </div>
                            <div class="material-datatables">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Video Title Bangla</th>
                                            <th class="text-center">Video Title English</th>
                                            <th class="text-center">Link</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                    <tr>
                                    <th class="text-center">SN</th>
                                        <th class="text-center">Video Title Bangla</th>
                                        <th class="text-center">Video Title English</th>
                                        <th class="text-center">Link</th>
                                        <th class="text-center" style="width:10%;">Action</th>
                                    </tr>
                                </tfoot> --}}
                                    <tbody>
                                        @foreach ($videos as $key => $video)
                                            <tr>
                                                <td class="text-left align-top">{{ ++$key }}</td>
                                                <td class="text-left align-top">{{ $video->video_title_bn }}</td>
                                                <td class="text-left align-top">{{ $video->video_title_en }}</td>
                                                <td class="text-left align-top">{{ $video->link }}</td>
                                                <td class="td-actions text-center">
                                                    <a href="" data-toggle="tooltip" class="btn btn-link text-info">
                                                        <i class="material-icons">person</i>
                                                    </a>
                                                    <a href="" onclick="video_edit({{ $video->id }})" data-toggle="modal"
                                                        data-target="#edit_video" class="btn btn-link text-success">
                                                        <i class="material-icons">edit</i>
                                                        <a href="{{ route('admin.video.delete', $video->id) }}"
                                                            data-toggle="tooltip" class="btn btn-link text-danger delete">
                                                            <i class="material-icons">close</i>
                                                        </a>
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
                            <h4 class="modal-title">ADD VIDEOS</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group md-form-group is-filled">
                                <form action="{{ route('admin.video.store') }}" method="post" class="form-horizontal"
                                    autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Video Title Bangla</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default">
                                                <input class="form-control" type="text" name="video_title_bn">
                                                @error('video_title_bn')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Video Title English</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default">
                                                <input class="form-control" type="text" name="video_title_en">
                                                @error('video_title_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Link</label>
                                        <div class="col-md-9">
                                            <div class="form-group has-default">
                                                <input class="form-control" type="text" name="link">
                                                @error('link')
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
        <div class="modal fade" id="edit_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT VIDEOS</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                            <form action="{{ route('admin.video.update') }}" method="POST" enctype="multipart/form-data"
                                class="form-horizontal" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Video Title Bangla</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="video_title_bn"
                                                id="video_title_bn">
                                            <input type="hidden" class="id" name="id">
                                            @error('video_title_bn')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Video Title English</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="video_title_en"
                                                id="video_title_en">
                                            <input type="hidden" class="id" name="id">
                                            @error('video_title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Link</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="link" id="link">
                                            <input type="hidden" class="id" name="id">
                                            @error('link')
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-link">Nice Button</button>
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    <script type="text/javascript">
        function video_edit(id) {
            // alert(id);
            $.ajax({
                'url': 'videogallery/edit/' + id,
                'type': 'GET',
                'data': {},
                success: function(data) {
                    // empty data
                    $('#video_title_bn').empty();
                    $('#video_title_en').empty();
                    $('#link').empty();
                    $('.id').empty();
                    // append data
                    $('#video_title_bn').val(data.video_title_bn);
                    $('#video_title_en').val(data.video_title_en);
                    $('#link').val(data.link);
                    $('.id').val(data.id);
                },
            });
        };
    </script>
@endpush
