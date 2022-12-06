@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card user-role">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">USER ROLE ({{ $type }})</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <a class="btn btn-primary" href="{{ route('admin.user.insert') }}">Create User</a>
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="padding-right: 18px;">SN</th>
                                            <th class="text-center">Bangla <br> Name</th>
                                            <th class="text-center">English <br> Name</th>
                                            <th class="text-center">Category <br> Role</th>
                                            <th class="text-center">Country <br> Role</th>
                                            <th class="text-center">Ads <br> Role</th>
                                            <th class="text-center">Comment <br> Role</th>
                                            <th class="text-center">Page <br> Role</th>
                                            <th class="text-center">Gallery <br> Role</th>
                                            <th class="text-center">SEO <br> Role</th>
                                            <th class="text-center">Settings <br> Role</th>
                                            <th class="text-center">Users <br> Role</th>
                                            <th class="text-center">Post <br> Role</th>
                                            <th class="text-center">Blog <br> Role</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $key=>$user)
                                            @if ($user->id !=  Auth::user()->id)
                                            <tr>
                                                <td class="text-left align-top">{{ ++$key }}</td>
                                                <td class="text-left align-top">{{ $user->name_bn }}</td>
                                                <td class="text-left align-top">{{ $user->name_en }}</td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->category_role == 1)
                                                            <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "category_role" type="checkbox" value="1" checked>
                                                            @else
                                                            <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "category_role" type="checkbox" value="0">
                                                            @endif

                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">

                                                            @if ($user->country_role == 1)
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "country_role" type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "country_role" type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">

                                                            @if ($user->ads_role == 1)
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "ads_role" type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "ads_role" type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->comments_role == 1)
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "comments_role" type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "comments_role" type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->page_role == 1)
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "page_role" type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "page_role"  type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->gallery_role == 1)
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "gallery_role" type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "gallery_role" type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->seo_role == 1)
                                                                <input class="form-check-input role"   data-user_id = "{{ $user->id }}" data-col_name = "seo_role"  type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "seo_role" type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->settings_role == 1)
                                                                <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "settings_role" type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "settings_role" type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->user_role == 1)
                                                                <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "user_role" type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "user_role" type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>

                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->post_role == 1)
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "post_role" type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role" data-user_id = "{{ $user->id }}" data-col_name = "post_role" type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style = "text-align:center">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            @if ($user->blog_role == 1)
                                                                <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "blog_role"  type="checkbox" value="1" checked>
                                                            @else
                                                                <input class="form-check-input role"  data-user_id = "{{ $user->id }}" data-col_name = "blog_role"  type="checkbox" value="0">
                                                            @endif

                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
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
            <!-- end row -->
        </div>
    </div>
@endsection
@push('js')
<script>
    $(function() {
      $('.role').change(function() {
        //   alert(123)
          var status = $(this).prop('checked') == true ? 1 : 0;
          var colname = $(this).data('col_name');
          var id = $(this).data('user_id');
        //   alert(status)
        //   alert(colname);

          $.ajax({

              url: "{{ route('admin.user.role.edit') }}",
              type: "GET",
              data: { 'id': id, 'status': status, 'col_name': colname},
              success: function(data){
                //   console.log(data)
                Swal.fire(
                  'Success!',
                  '',
                  'success'

                )
                window.location.reload();
              }

          });

      })
    })
 </script>
@endpush
