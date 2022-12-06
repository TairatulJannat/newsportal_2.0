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
                        <h4 class="card-title">MANAGE PAGETABLE</h4>
                    </div>
              
                    <div class="material-datatables">
                        <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Page Title Bangla</th>
                                    <th class="text-center">Page Title English</th>
                                    <th class="text-center">Page Description Bangla</th>
                                    <th class="text-center">Page Description English</th>
                                    <th class="text-center" style="width: 13%">Action</th>
                                </tr>
                            </thead>
                        {{-- <tfoot>
                           <tr>
                                
                              <th class="text-center">SN</th>
                              <th class="text-center">Page Title Bangla</th>
                              <th class="text-center">Page Title English</th>
                              <th class="text-center">Page Description Bangla</th>
                              <th class="text-center">Page Description English</th>
                              <th class="text-center" style="width: 13%">Action</th>
                        </tfoot> --}}
                            <tbody>
                                @foreach ($pagetables as $key => $pagetable)
                                    <tr>
                                        <td class="text-left align-top">{{ ++$key }}</td> 
                                        <td class="text-left align-top">{{ $pagetable->page_title_bn }}</td>
                                        <td class="text-left align-top">{{ $pagetable->page_title_en }}</td>
                                        <td class="text-left align-top">{!! $pagetable->description_title_bn !!}</td>
                                        <td class="text-left align-top">{!! $pagetable->description_title_en !!}</td>
                                        
                                        <td class="td-actions text-center align-top">
                                        <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                                            <i class="material-icons">person</i>
                                        </a>
                                        <a href="{{ route('admin.pagetable.edit', $pagetable->id) }}" data-target="#edit_image"  class="btn btn-link text-success">
                                            <i class="material-icons">edit</i>
                                        <a href="{{ route('admin.pagetable.delete', $pagetable->id) }}"   class="btn btn-link text-danger delete">
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
</div>     
@endsection