<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">BLOG POST</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="material-icons">clear</i>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group md-form-group is-filled">
                <form id="edit_post_form" action="{{ route('admin.blog.post.updated.stage') }}" method="post"
                    enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                    @csrf
                    <input type="hidden" id="blog_post_id" class="blog_post_id" name="blog_postid">
                    <div class="row">
                        <label class="col-md-3 col-form-label">বাংলা শিরোনাম</label>
                        <div class="col-md-9">
                            <div class="form-group has-default mt-0">
                                <input class="form-control blog_post_title_bn" type="text" name="blog_post_title_bn"
                                    readonly>
                            </div>
                        </div>
                        <label class="col-md-3 col-form-label">Title English</label>
                        <div class="col-md-9">
                            <div class="form-group has-default mt-0">
                                <input class="form-control blog_post_title_en" type="text" name="blog_post_title_en"
                                    readonly>
                            </div>
                        </div>
                        <label class="col-md-3 col-form-label">Category Name</label>
                        <div class="col-md-9">
                            <div class="form-group has-default mt-0">
                                <input class="form-control blog_category_name" type="text" name="blog_category_name"
                                    readonly>
                            </div>
                        </div>

                        <label class="col-md-3 col-form-label">Reporter Name</label>
                        <div class="col-md-9">
                            <div class="form-group has-default mt-0">
                                <input class="form-control reportar_name" type="text" name="blog_reportar_name"
                                    readonly>
                            </div>
                        </div>

                        <label class="col-md-3 col-form-label">Image</label>
                        <div class="col-md-9">
                            <div class="form-group has-default">
                                <img width="150" class="image" height="100" src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Discription (english)</label>
                        <div class="col-md-9">
                            <div class="form-group has-default">
                                {{-- <input class="form-control discription_en" type="text" name="discription_en" readonly> --}}
                                <textarea class="form-control blog_discription_en" name="blog_discription_en" id=""
                                    cols="30" rows="10" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Discription (BANGLA)</label>
                        <div class="col-md-9">
                            <div class="form-group has-default">
                                <textarea class="form-control blog_discription_bn" name="blog_discription_bn" id=""
                                    cols="30" rows="10" readonly></textarea>

                            </div>
                        </div>
                    </div>

                    @if (Route::currentRouteName() == 'admin.blog.post.pending' || Route::currentRouteName() == 'admin.blog.post.correction')
                        @if (Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                            <div class="row stage">
                                <label class="col-md-3 col-form-label">STAGE</label>
                                <div class="col-md-9">
                                    <select class="selectpicker " data-style="select-with-transition"
                                        title="Choose stage" data-size="7" name="stage" id="stage">
                                        <option disabled> Choose</option>
                                        @if (Auth::user()->type == 'admin' || Auth::user()->type == 'editor' || Auth::user()->type == 'super_admin')
                                            <option value="approved">approved </option>
                                            <option value="correction">Correction</option>
                                        @else
                                            <option value="correction">Correction</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="row correction_blog" style="display: none">
                        <label class="col-form-label"> <b style="color:white; margin-left:30px">Correction
                                Image</b></label>
                        <div class="col-md-3">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <p style="color:red">**no file selected**</p>

                                    {{-- <img src="{{ asset('public/uploads/backend/ads/image_icon.png')  }}" alt=""> --}}
                                    <img src="{{ asset('public/uploads/backend/ads/image_icon.png') }}"
                                        style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; width:100px; height:100px;"
                                        alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>

                                    <span class="btn btn-primary btn-round btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input class="correction_image" type="file" name="correction_image" />
                                    </span>
                                    <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists"
                                        data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row correction_blog" style="display: none">
                        <label class="col-md-3 col-form-label">Message</label>
                        <div class="col-md-9">
                            <div class="form-group has-default">
                                <input class="form-control massege" type="text" name="message">

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        @if (Route::currentRouteName() == 'admin.blog.post')
                            <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                        @elseif(Route::currentRouteName() == 'admin.blog.post.pending')
                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor' || Auth::user()->type == 'super_admin' || Auth::user()->type == 'admin')
                                <button class="btn btn-primary " type="submit">Save</button>
                                <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                            @else

                                <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>

                            @endif
                        @elseif(Route::currentRouteName() == 'admin.blog.post.correction')
                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor'|| Auth::user()->type == 'super_admin' || Auth::user()->type == 'admin')
                                <button class="btn btn-primary " type="submit">Save</button>
                                <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                            @else

                                <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>

                            @endif
                        @endif
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

