<table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th class="text-center" >SN</th>
            <th class="text-center" >Image</th>

            @if($type == 'bangla_news')
                <th class="text-center">News Title Bangla</th>
            @elseif($type == 'english_news')
                <th class="text-center">News Title English</th>
            @else
                <th class="text-center">News Title Bangla</th>
                <th class="text-center">News Title English</th>
            @endif
            {{-- <th class="text-center" >News Title Bangla</th>
            <th class="text-center" >News Title English</th> --}}
            <th class="text-center" >Reporter Name</th>
            <th class="text-center" >Published Date</th>

            @if ( Auth::user()->type == 'reporter')
                <th class="text-center" style="width: 13%">Edit</th>
                {{-- <th class="text-center">Approve</th> --}}
            @endif
        </tr>
    </thead>
    
    <tbody>
        @foreach ($posts as $key =>$post)
            @if ($post->stage == 'pending')
                @if(Auth::user()->type !== 'reporter')
                    {{-- @if(Auth::user()->id !== $post->user_id) --}}
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" ><img width="100" height="100" src="{{ asset($post->image) }}" style="object-fit: cover;"  alt=""></td>
                            @if($type == 'bangla_news')

                                <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_bn }}</td>

                            @elseif($type == 'english_news' )

                                <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_en }}</td>

                            @else
                            
                                 <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_bn }}</td>
                                <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_en }}</td>
                            @endif
                            <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->user->name_en }}</td>
                            <td  class="text-center">{{ $post->published_date }}</td>
                            @if ( Auth::user()->type == 'reporter')
                                <td  class="text-center">
                                    <a href="{{ route('admin.news.edit', $post->id) }}" data-target="#edit_image"  class="btn btn-link text-success">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    {{-- @endif --}}
                @else
                    @if(Auth::user()->id == $post->user_id)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center"><img width="100" height="100" src="{{ asset($post->image) }}" style="object-fit: cover;" alt=""></td>
                            @if($type == 'bangla_news')

                            <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_bn }}</td>

                            @elseif($type == 'english_news' )

                                <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_en }}</td>

                            @else
                            
                                <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_bn }}</td>
                                <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_en }}</td>
                            @endif
                            {{-- <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->title_bn }}</td>
                            <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->title_en }}</td> --}}
                            <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->user->name_en }}</td>
                            <td  class="text-center">{{ $post->published_date }}</td>
                            @if ( Auth::user()->type == 'reporter')
                                <td  class="text-center">
                                    <a href="{{ route('admin.news.edit', $post->id) }}" data-target="#edit_image"  class="btn btn-link text-success">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endif
                @endif
            @endif
        @endforeach
    </tbody>
</table>