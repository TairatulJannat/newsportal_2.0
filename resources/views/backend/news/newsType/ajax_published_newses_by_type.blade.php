<table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0"
    width="100%" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">SN</th>
            <th class="text-center">Image</th>
            
                @if($type == 'bangla_news')
                    <th class="text-center">Bangla Title</th>
                @elseif($type == 'english_news')
                    <th class="text-center">English Title</th>
                @else
                    <th class="text-center">Bangla Title</th>
                    <th class="text-center">English Title</th>
                @endif
            
            <th class="text-center">Reporter Name</th>
            <th class="text-center">Published Date</th>
            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                <th class="text-center">Breaking News</th>
                <th class="text-center">Feature News</th>
                <th class="text-center">Status</th>
                <th class="text-center">Main News</th>
                @if (Auth::user()->comments_role == 1)
                    <th class="text-center" style="width: 13%">Action</th>
                @endif
            @endif
        </tr>
    </thead>

    <tbody>
        @foreach ($posts as $key => $post)
            @if ($post->stage == 'approved')
                @if (Auth::user()->type !== 'reporter')
                    @if (Auth::user()->id !== $post->user_id)
                        <tr>
                            <td class="text-left align-top">{{ ++$key }}</td>
                            <td class="text-left align-top"><img width="100" height="100"
                                    style="object-fit: cover;" src="{{ asset($post->image) }}"
                                    alt="">
                            </td>
                            
                                @if($type == 'bangla_news')
                                    <td class="text-center align-top">{{ $post->title_bn }} </td>
                                @elseif($type == 'english_news' )
                                    <td class="text-center align-top">{{ $post->title_en }}</td>
                                @else
                                <td class="text-center align-top">{{ $post->title_bn }} </td>
                                <td class="text-center align-top">{{ $post->title_en }}</td>
                                @endif
                            
                                
                            <td class="text-left align-top">{{ $post->user->name_en }}</td>
                            <td class="text-left align-top">{{ $post->published_date }}</td>
                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                                <td class="text-center">
                                    @if ($post->breaking_news == 1)
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" checked
                                                    data-id="{{ $post->id }}"
                                                    onchange="breaking_news({{ $post->id }})"
                                                    name="breaking_news" class="breaking_news"
                                                    value="{{ $post->breaking_news }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox"
                                                    data-id="{{ $post->id }}"
                                                    onchange="breaking_news({{ $post->id }})"
                                                    name="breaking_news" class="breaking_news"
                                                    value="{{ $post->breaking_news }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($post->feature_news == 1)
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" checked
                                                    data-id="{{ $post->id }}"
                                                    onchange="feature_news({{ $post->id }})"
                                                    name="feature_news" class="feature_news"
                                                    value="{{ $post->feature_news }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox"
                                                    data-id="{{ $post->id }}"
                                                    onchange="feature_news({{ $post->id }})"
                                                    name="feature_news" class="feature_news"
                                                    value="{{ $post->feature_news }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($post->status == 1)
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" checked
                                                    id="{{ $post->id }}"
                                                    onchange="status(this.id)" name="status"
                                                    class="status"
                                                    value="{{ $post->status }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" id="{{ $post->id }}"
                                                    onchange="status(this.id)" name="status"
                                                    class="status"
                                                    value="{{ $post->status }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($post->main_news == 1)
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" checked
                                                    id="{{ $post->id }}"
                                                    onchange="main_news(this.id)"
                                                    name="main_news" class="main_news"
                                                    value="{{ $post->main_news }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" id="{{ $post->id }}"
                                                    onchange="main_news(this.id)"
                                                    name="main_news" class="main_news"
                                                    value="{{ $post->main_news }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @endif
                                </td>
                                @if (Auth::user()->comments_role == 1)
                                    <td class="td-actions text-center">
                                        @if (Auth::user()->comments_role == 1)
                                            <a href="{{ route('admin.news.comments.list', $post->id) }}"
                                                data-toggle="tooltip"
                                                class="btn btn-link text-info">
                                                <i class="material-icons">comment</i>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endif
                @else
                    @if (Auth::user()->id == $post->user_id)
                        <tr>
                            <td class="text-left align-top">{{ ++$key }}</td>
                            <td class="text-left align-top"><img width="100" height="100"
                                    src="{{ asset($post->image) }}" alt=""></td>
                                @if($type == 'bangla_news')
                                    <td class="text-center align-top">{{ $post->title_bn }} </td>
                                @elseif($type == 'english_news' )
                                    <td class="text-center align-top">{{ $post->title_en }}</td>
                                @else
                                <td class="text-center align-top">{{ $post->title_bn }} </td>
                                <td class="text-center align-top">{{ $post->title_en }}</td>
                                @endif
                            {{-- <td class="text-left align-top">{{ $post->title_bn }}</td>
                            <td class="text-left align-top">{{ $post->title_en }}</td> --}}
                            <td class="text-left align-top">{{ $post->user->name_en }}</td>
                            <td class="text-left align-top">{{ $post->published_date }}</td>
                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                                <td class="text-center">
                                    @if ($post->breaking_news == 1)
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" checked
                                                    data-id="{{ $post->id }}"
                                                    onchange="breaking_news({{ $post->id }})"
                                                    name="breaking_news" class="breaking_news"
                                                    value="{{ $post->breaking_news }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox"
                                                    data-id="{{ $post->id }}"
                                                    onchange="breaking_news({{ $post->id }})"
                                                    name="breaking_news" class="breaking_news"
                                                    value="{{ $post->breaking_news }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($post->status == 1)
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" checked
                                                    id="{{ $post->id }}"
                                                    onchange="status(this.id)" name="status"
                                                    class="status"
                                                    value="{{ $post->status }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" id="{{ $post->id }}"
                                                    onchange="status(this.id)" name="status"
                                                    class="status"
                                                    value="{{ $post->status }}">
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                    @endif
                                </td>
                                <td class="td-actions text-center">
                                    @if (Auth::user()->comments_role == 1)
                                        <a href="{{ route('admin.news.comments.list', $post->id) }}"
                                            data-toggle="tooltip"
                                            class="btn btn-link text-info">
                                            <i class="material-icons">comment</i>
                                        </a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endif
                @endif
            @endif
        @endforeach
    </tbody>
</table>

