@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon ">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">MANAGE DRAFTED NEWS</h4>
                    </div>

                    <div class="material-datatables">
                        <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center"style="width:8%;">SN</th>
                                    <th class="text-center" style="width:8%;">Image</th>
                                    <th class="text-center" style="width:8%;">News Title Bangla</th>
                                    <th class="text-center" style="width:8%;">News Title English</th>
                                    <th class="text-center" style="width:8%;">Reporter Name</th>
                                    <th class="text-center" style="width:8%;">Published Date</th>
                                    <th class="text-center" >Action</th>
                                </tr>
                            </thead>
                            {{-- <tfoot>

                            <tr>

                                    <th class="text-center">SN</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">News Title Bangla</th>
                                    <th class="text-center">News Title English</th>
                                    <th class="text-center" >Reporter Name</th>
                                    <th class="text-center">Published Date</th>

                                    <th class="text-center" >Action</th>

                                </tr>
                            </tfoot> --}}
                            <tbody>
                                @foreach ($posts as $key =>$post)
                                    @if ($post->stage == 'draft')

                                        @if(Auth::user()->id == $post->user_id)
                                            <tr>
                                                <td class="text-left align-top">{{ ++$key }}</td>
                                                <td class="text-left align-top"><img width="100" height="100" style="object-fit: cover;" src="{{ asset($post->image) }}" alt=""></td>
                                                <td class="text-left align-top">{{ $post->title_bn }}</td>
                                                <td class="text-left align-top">{{ $post->title_en }}</td>
                                                <td class="text-left align-top">{{ $post->user->name_en }}</td>
                                                <td class="text-left align-top">{{ $post->published_date }}</td>
                                                <td  class="text-center">
                                                    <a href="{{ route('admin.news.edit', $post->id) }}" data-target="#edit_image"  class="btn btn-link text-success">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
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
</div>

@endsection


@push('js')

<script>



</script>


@endpush
