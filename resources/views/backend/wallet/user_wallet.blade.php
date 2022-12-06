@extends('backend.layouts.app')

@section('content')

<style>
    .btn-group.news-details .btn { font-size: 11px !important; }
    #datatables_wrapper .row {width: 100%;margin: 0;}
    #datatables_wrapper .row:nth-child(3) {padding-bottom: 1rem;}
</style>


@if (Auth::user()->type == 'super_admin' || Auth::user()->type == 'admin')
    <div class="content">
        <div class="container countdown">
            <h3 id="headline">Time left for BONUS</h3>
            <div id="countdown">
                <ul>
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
                    <li><span id="seconds"></span>Seconds</li>
                </ul>
            </div>
            <div id="content" class="emoji">
                <button id = "update_bonus">Update Bonus</button>
                {{-- <span>🥳</span>
                <span>🎉</span>
                <span>🎂</span> --}}
            </div>
        </div>


        <div class="container-fluid">
            <div class="" style="justify-content: start; margin-left: .1rem; margin-bottom: 1rem">
                <div class="row btn-group">
                    <button type="button" onclick="window.location='{{ route('user.wallet.view','super_admin') }}'" id="super_admin" class="col-lg-3 col-md-3 col-sm-3 col-6 btn btn-info user_role mt-2">Super Admin</button>
                    <button type="button" onclick="window.location='{{ route('user.wallet.view','admin') }}'"  id="admin" class="col-lg-2 col-md-2 col-sm-3 col-6 btn btn-info user_role mt-2">Admin</button>
                    <button type="button" onclick="window.location='{{ route('user.wallet.view','editor') }}'"  id="editor" class="col-lg-2 col-md-2 col-sm-3 col-6 btn btn-info user_role mt-2">Editor</button>
                    <button type="button" id="sub_editor" onclick="window.location='{{ route('user.wallet.view','sub_editor') }}'" class="col-lg-3 col-md-3 col-sm-3 col-6 btn btn-info user_role mt-2">Sub-editor</button>
                    <button type="button" id="reporter" onclick="window.location='{{ route('user.wallet.view','reporter') }}'" class="col-lg-2 col-md-2 col-sm-3 col-6 btn btn-info  user_role mt-2 pl-2 pr-1">Reporter</button>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">USER WALLET DETAILS</h4>
                            </div>
                            {{-- <br> --}}
                            <div class="material-datatables mt-3">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">User</th>
                                            <th class="text-center">Bonus Rate</th>
                                            <th class="text-center">Bonus Status</th>
                                            <th class="text-center">Balance without Bonus</th>
                                            <th class="text-center">Current Bonus</th>
                                            <th class="text-center">Balance with Bonus</th>
                                            <th class="text-center">Bonus Amount Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($users)
                                            @foreach($users as $key=>$user)

                                                <tr>
                                                    <td class="text-center align-top">{{ ++$key }}</td>
                                                    <td class="text-center align-top"> {{ $user->name_en }}</td>
                                                    <td class="text-center align-top"> {{ $user->bonus_amount }}</td>
                                                    <td class="text-center align-top">
                                                        @if($user->bonus_status == 1)
                                                        <div class="togglebutton">
                                                            <label>
                                                            <input type="checkbox" checked data-id="{{$user->id}}" onchange="bonus_status({{$user->id}})"  name="bonus_status" class="bonus_status" value="{{ $user->bonus_status }}">
                                                            <span class="toggle"></span>
                                                            </label>
                                                        </div>
                                                        @else
                                                        <div class="togglebutton">
                                                            <label>
                                                            <input type="checkbox" unchecked data-id="{{$user->id}}" onchange="bonus_status({{$user->id}})" name="bonus_status"  class="bonus_status" value="{{ $user->bonus_status }}">
                                                            <span class="toggle"></span>
                                                            </label>
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td class="text-center align-top">{{ $user->Wallet->Total_balance_without_bonus }}</td>
                                                    <td class="text-center align-top">{{ $user->Wallet->bonus }}</td>
                                                    <td class="text-center align-top">{{ $user->Wallet->Total_balance_bonus }}</td>
                                                    <td>
                                                        <a href=""  onclick="bonus_amount_edit({{$user->id }})"  data-toggle="modal" data-target="#edit_bonus_amount"  class="btn btn-link text-success">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                    </td>

                                                </tr>

                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Own Wallet</h4>
                        </div>

                        <div class="card-body">
                            <div class="material-datatables">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                  <tbody>
                                    <tr>
                                        <td>Total Earning By Post</td>
                                        <td> {{(floatval($post_type[0]['cost_per_post']) * $bn_post_count) + (floatval($post_type[1]['cost_per_post']) * $en_post_count) + (floatval($post_type[2]['cost_per_post']) * $both_post_count)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Bonus</td>
                                        <td>{{ $Totalbonus}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total Earning </td>
                                        <td>{{ (floatval($post_type[0]['cost_per_post']) * $bn_post_count) + (floatval($post_type[1]['cost_per_post']) * $en_post_count) + (floatval($post_type[2]['cost_per_post']) * $both_post_count) + $Totalbonus}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total Withdraw</td>
                                        <td><span style="color: white; background-color: tomato; font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$total_withdraw}}</span> </td>
                                    </tr>
                                    <tr>
                                        <td>Current Balence</td>
                                        <td>
                                            <span style="color: white; background-color: rgb(73, 143, 73); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">
                                                {{ ((floatval($post_type[0]['cost_per_post']) * $bn_post_count) + (floatval($post_type[1]['cost_per_post']) * $en_post_count) + (floatval($post_type[2]['cost_per_post']) * $both_post_count) + $Totalbonus)-$total_withdraw}}
                                            </span>
                                        </td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Own Approved News Details</h4>
                        </div>
                        <div class="container-fluid">
                            <div class="" style="margin-left: .1rem;">
                                <div class="row btn-group news-details">
                                    <button type="button" id="week" class="col-lg-2 col-md-2 col-sm-4 col-6 btn btn-info mt-2 date_range pl-3">This Week</button>
                                    <button type="button" id="month" class="col-lg-3 col-md-3 col-sm-4 col-6 btn btn-info mt-2  date_range">This Month</button>
                                    <button type="button" id="year" class="col-lg-2 col-md-2 col-sm-4 col-6 btn btn-info mt-2 date_range pl-3">This Year</button>
                                    <button type="button" id="all" class="col-lg-2 col-md-2 col-sm-4 col-6 btn btn-info mt-2 date_range">All</button>
                                    <button type="button" id="custom_date" class="col-lg-3 col-md-3 col-sm-4 col-6 btn btn-info mt-2 date_range">Custom Date</button>
                                </div>
                                <div class = "from-control" id="date" Style="display:none">

                                        <div class="row m-0" style="padding: 6px;">
                                            <div class = "col-md-6 form-group d-flex align-items-end p-0 pr-2">
                                                <label style="min-width: 70px" for="start_date">Start Date</label>
                                                <input type="date" class="form-control " name="start_date" id="start_date" value="" >
                                            </div>
                                            <div class = "col-md-6 form-group d-flex align-items-end p-0">
                                                <label style="min-width: 70px" for="end_date">End Date</label>
                                                <input type="date" class="form-control " name="end_date" id="end_date" placeholder = ""value="" >
                                            </div>
                                            <div class = "col-md-12 form-group p-1 d-flex justify-content-center m-0" style="max-height: 70px">
                                                <button type="button" id="find" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info custom p-2">Find</button>
                                                <button type="button" id="close" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-danger custom p-2">Close</button>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        <div class="card-body wallet_detail p-0 mt-3">
                            <div class="material-datatables">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                  <tbody>
                                    <tr>
                                        <td>Total Approve News</td>
                                        <td></td>
                                        {{-- <td>(({{intval($post_type[0]['cost_per_post'])}}*{{$bn_post_count}})+({{intval($post_type[1]['cost_per_post'])}}*{{$en_post_count}}) +({{intval($post_type[2]['cost_per_post'])}}*{{$both_post_count}}))</td> --}}
                                        <td>{{ ($bn_post_count) + ( $en_post_count) + ( $both_post_count)}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total Bangla Approve News</td>
                                        <td>{{intval($post_type[0]['cost_per_post'])}}*{{$bn_post_count}}</td>
                                        <td>{{floatval($post_type[0]['cost_per_post']) * $bn_post_count}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total English With Bonus</td>
                                        <td>{{intval($post_type[1]['cost_per_post'])}}*{{$en_post_count}}</td>
                                        <td>{{floatval($post_type[1]['cost_per_post']) * $en_post_count}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total Both Approve</td>
                                        <td>{{intval($post_type[2]['cost_per_post'])}}*{{$both_post_count}}</td>
                                        <td>{{floatval($post_type[2]['cost_per_post']) * $both_post_count}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total </td>
                                        <td></td>
                                        <td>{{(floatval($post_type[0]['cost_per_post']) * $bn_post_count) + (floatval($post_type[1]['cost_per_post']) * $en_post_count) + (floatval($post_type[2]['cost_per_post']) * $both_post_count)}} </td>
                                    </tr>

                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
       


    </div>
@else
    <div class = "content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Own Wallet</h4>
                        </div>

                        <div class="card-body">
                            <div class="material-datatables">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                  <tbody>
                                    <tr>
                                        <td>Total Earning By Post</td>
                                        <td> {{(floatval($post_type[0]['cost_per_post']) * $bn_post_count) + (floatval($post_type[1]['cost_per_post']) * $en_post_count) + (floatval($post_type[2]['cost_per_post']) * $both_post_count)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Bonus</td>
                                        <td>{{ $Totalbonus}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total Earning </td>
                                        <td>{{ (floatval($post_type[0]['cost_per_post']) * $bn_post_count) + (floatval($post_type[1]['cost_per_post']) * $en_post_count) + (floatval($post_type[2]['cost_per_post']) * $both_post_count) + $Totalbonus}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total Withdraw</td>
                                        <td><span style="color: white; background-color: tomato; font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$total_withdraw}}</span> </td>
                                    </tr>
                                    <tr>
                                        <td>Current Balance</td>
                                        <td>
                                            <span style="color: white; background-color: rgb(73, 143, 73); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">
                                                {{ ((floatval($post_type[0]['cost_per_post']) * $bn_post_count) + (floatval($post_type[1]['cost_per_post']) * $en_post_count) + (floatval($post_type[2]['cost_per_post']) * $both_post_count) + $Totalbonus)-$total_withdraw}}
                                            </span>
                                        </td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Own Approved News Details</h4>
                        </div>
                        <div class="container-fluid">
                            <div class="" style="justify-content: start; margin-left: .1rem; margin-bottom: 1rem">
                                <div class="row btn-group">
                                    <button type="button" id="week" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">This Week</button>
                                    <button type="button" id="month" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info  date_range">This Month</button>
                                    <button type="button" id="year" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">This Year</button>
                                    <button type="button" id="all" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">All</button>
                                    <button type="button" id="custom_date" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">Custom Date</button>
                                </div>
                                <div class = "from-control" id="date" Style="display:none">

                                        <div class="row">
                                            <div class = "col-md-4 form-group">
                                                <label for="start_date">Start Date</label>
                                                <input type="date" class="form-control " name="start_date"
                                                    id="start_date" value="" >
                                            </div>
                                            <div class = "col-md-4 form-group">
                                                <label for="end_date">End Date</label>
                                                <input type="date" class="form-control " name="end_date"
                                                    id="end_date" placeholder = ""value="" >
                                            </div>
                                            <div class = "col-md-4 form-group">
                                                <button type="button" id="find" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info custom">Find</button>
                                                <button type="button" id="close" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-danger custom">Close</button>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        <div class="card-body wallet_detail">
                            <div class="material-datatables">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                  <tbody>
                                    <tr>
                                        <td>Total Approve News</td>
                                        <td></td>
                                        {{-- <td>(({{intval($post_type[0]['cost_per_post'])}}*{{$bn_post_count}})+({{intval($post_type[1]['cost_per_post'])}}*{{$en_post_count}}) +({{intval($post_type[2]['cost_per_post'])}}*{{$both_post_count}}))</td> --}}
                                        <td>{{ ($bn_post_count) + ( $en_post_count) + ( $both_post_count)}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total Bangla Approved News</td>
                                        <td>{{intval($post_type[0]['cost_per_post'])}}*{{$bn_post_count}}</td>
                                        <td>{{floatval($post_type[0]['cost_per_post']) * $bn_post_count}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total English Approved News</td>
                                        <td>{{intval($post_type[1]['cost_per_post'])}}*{{$en_post_count}}</td>
                                        <td>{{floatval($post_type[1]['cost_per_post']) * $en_post_count}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total Both (Bangla & English) Approve News</td>
                                        <td>{{intval($post_type[2]['cost_per_post'])}}*{{$both_post_count}}</td>
                                        <td>{{floatval($post_type[2]['cost_per_post']) * $both_post_count}} </td>
                                    </tr>
                                    <tr>
                                        <td>Total </td>
                                        <td></td>
                                        <td>{{(floatval($post_type[0]['cost_per_post']) * $bn_post_count) + (floatval($post_type[1]['cost_per_post']) * $en_post_count) + (floatval($post_type[2]['cost_per_post']) * $both_post_count)}} </td>
                                    </tr>

                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif



 <!-- Edit modal-->
 <div class="modal fade" id="edit_bonus_amount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">EDIT BONUS AMOUNT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group md-form-group is-filled">
                    <form action="{{ route('user.wallet.bonus.update') }}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                        @csrf
                        <div class="row">
                            <label class="col-md-3 col-form-label">USER NAME</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input readonly class="form-control" type="text" name="user_name" id="user_name">
                                    <input type="hidden" class="id" name="id">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">PREVIOUS BONUS</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input readonly class="form-control" type="text" name="previous_balance" id="previous_balance">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">NEW BONUS</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input  class="form-control" type="text" name="new_bonus" id="new_bonus">
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
@endsection

@push('js')
<script src="{{ asset('resources/js/count_down.js') }}"></script>
<script>
// <!--JS for Bonus Count down ! -->

    function bonus_amount_edit(id){
     $.ajax({
           'url': 'bonus/edit/'+id,
           'type': 'GET',
           'data': {},
          success:function(data){
            //   alert(123);
           // empty data
           $('#user_name').empty();
           $('#previous_balance').empty();
           $('.id').empty();
           // append data
           $('#user_name').val(data.name_en);
           $('#previous_balance').val(data.bonus_amount);
           $('.id').val(data.id);
            },
        });
    };

        $(document).ready(function(){

        $('#custom_date').click(function(){
            $('#date').css("display", '')
        })
        $('#close').click(function(){
            $('#date').css("display", 'none')
        })

        $.ajax({

            url: "{{route('get.last.bonus.date')}}",
            type: "GET",

            success: function(data){
                // b console.log(data)
                const second = 1000,
                    minute = second * 60,
                    hour = minute * 60,
                    day = hour * 24;

                let today = new Date(),
                    dd = String(today.getDate()).padStart(2, "0"),
                    mm = String(today.getMonth() + 1).padStart(2, "0"),
                    yyyy = today.getFullYear(),
                    nextYear = yyyy,
                    dayMonth = "02/16/",
                    nxt_bons_date = data;

                today = mm + "/" + dd + "/" + yyyy;
                if (today = nxt_bons_date || today > nxt_bons_date) {

                    let d = new Date(nxt_bons_date);
                     d.setDate(d.getDate() + 7);

                    let nxt_bonus_date_full = d;
                    // console.log(nxt_bonus_date_full)
                    nxt_bons_date_dd = String(nxt_bonus_date_full.getDate()).padStart(2, "0"),
                    nxt_bons_date_mm = String(nxt_bonus_date_full.getMonth() + 1).padStart(2, "0"),
                    nxt_bons_date_yyyy = nxt_bonus_date_full.getFullYear(),
                    nxt_bons_date = nxt_bons_date_mm + "/" + nxt_bons_date_dd + "/" + nxt_bons_date_yyyy;;
                    // console.log(nxt_bons_date )
                }
                //end

                const countDown = new Date(nxt_bons_date).getTime(),
                    x = setInterval(function() {

                        const now = new Date().getTime(),
                            distance = countDown - now;
                            // console.log(distance )

                        document.getElementById("days").innerText = Math.floor(distance / (day)),
                            document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                            document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                            document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                        //do something later when date is reached
                        if (distance < 0) {
                            // console.log(distance )
                            document.getElementById("headline").innerText = "Grab your Bonus !";
                            document.getElementById("countdown").style.display = "none";
                            document.getElementById("content").style.display = "block";
                            clearInterval(x);
                        }
                        //seconds
                    }, 0)

            }
        });
        $('#update_bonus').click(function(){
            $.ajax({
            'url': "{{route('update.bonus.table')}}",
            'type': 'GET',

                success:function(data){
                    // console.log(123)
                    // $('.wallet_detail').html(data);

                }
            });
            // window.open("bonus_update_users.php");
        })

        })


        $('#month').click(function(){
            // alert(123)
            $.ajax({
            'url': "{{route('filter.wallet')}}",
            'dataType': 'html',
            'data' : {
                "data":"month"
            },
            'type': 'GET',

                success:function(data){
                    console.log(data)
                    $('.wallet_detail').html(data);

                }
            });
        });
        $('#all').click(function(){
            // alert(123)
            $.ajax({
            'url': "{{route('filter.wallet')}}",
            'dataType': 'html',
            'data' : {
                "data":"all"
            },
            'type': 'GET',

                success:function(data){
                    console.log(data)
                    $('.wallet_detail').html(data);

                }
            });
        });
        $('#week').click(function(){
            // alert(123)
            $.ajax({
            'url': "{{route('filter.wallet')}}",
            'dataType': 'html',
            'data' : {
                "data":"week"
            },
            'type': 'GET',

                success:function(data){
                    $('.wallet_detail').html(data);

                }
            });
        });
        $('#year').click(function(){
            // alert(123)
            $.ajax({
            'url': "{{route('filter.wallet')}}",
            'dataType': 'html',
            'data' : {
                "data":"year"
            },
            'type': 'GET',

                success:function(data){
                    $('.wallet_detail').html(data);

                }
            });
        });
        $('#find').click(function(){
            console.log( $('#start_date').val())
            start = $('#start_date').val();
            end = $('#end_date').val();
            $.ajax({
                'url': "{{route('filter.wallet')}}",
                'dataType': 'html',
                'data' : {
                    "data":"custom",
                    "start_date_time": start,
                    "end_date": end
                },
                'type': 'GET',

                    success:function(data){
                        $('.wallet_detail').html(data);

                    }
            });

        });

        function bonus_status(id ){
        var status = $(this).prop('checked') == true ? 1 : 0;
        // alert(status);
        // alert(id);
        $.ajax({

          url: 'bonus-status/'+id,
          type: "GET",
          data: {'status': status, 'id': id},

          success: function(data){
            Swal.fire(
              'Success!',
              '',
              'success'
            )
            setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
            }, 1500);
          }
        });
    }

</script>

@endpush
