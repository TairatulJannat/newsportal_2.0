@extends('backend.layouts.app')
<style>
    .myDropDown
    {
       height: 50px;
       overflow: auto;
    }
    .user-transition select {
        border: none;
        /* background-color: #2dabbf; */
        background: #17a2b8 linear-gradient( 180deg , #3ab0c3, #17a2b8) repeat-x;
        padding: 7px 17px;    
        width: 185px;
        border-radius: 3px;
        color: #f4fbfc;
        cursor: pointer;
        font-size: 13px;
        margin-right: 10px;
        margin-bottom: 1rem;
    }
    .user-transition select:focus{
        outline: none;
    }
    .user-transition select:hover{
        background: #17a2b8 linear-gradient( 180deg , #3ab0c3, #066b7a) repeat-x;
    }
    .user-transition select option{
        background: #ddd !important;
        color: #444 !important;
    }
    .user-transition select[name="datatables_length"] {
        background: transparent;
    }

</style>
@section('content')
@if (Auth::user()->type == 'super_admin' || Auth::user()->type == 'admin')
    <div class="content user-transition">
        <div class = "row ml-1 select-row">
            <div class = "p-0 m-0">
                <select name="transition_type" id="transition_type">
                    <option disable value="">Chose Transition Type</option>
                    <option value="Credited">Credited</option>
                    <option value="Debited">Debited</option>
                    <option value="Debit-request">Debit-Request</option>
                </select>
            </div>
            <div class = "p-0 m-0">
                <select name="user_type" id="user_type">
                    <option disable value="">Chose User Type</option>
                    <option value="reporter">Reporter</option>
                    <option value="sub_editor">Sub-Editor</option>
                    <option value="editor">Editor</option>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>
            <div class = "p-0 m-0">
                <select class="" name="user_id" id="user_id" >
                    <option disable value="">Chose User Name</option>
                    @foreach ($users as $item)
                        <option value="{{$item->id}}">{{$item->name_en}}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="" style="justify-content: start; margin-left: .1rem; margin-bottom: 1rem">
            <div class="row transition_tab">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">USER TRANSITION DETAILS</h4>
                        </div>
                        {{-- <br> --}}
                        <div class="material-datatables mt-3">
                            <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center">User Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Account Number</th>
                                        <th class="text-center">TxnID</th>
                                        <th class="text-center">Transition Medium</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Date</th>
                                        @if (Auth::user()->type == 'admin')
                                            <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($transitions)
                                        @foreach($transitions as $key=>$transition)

                                            <tr>
                                                <td class="text-center align-top">{{ ++$key }}</td>
                                                <td class="text-center align-top"> {{ $transition->user->name_en }}</td>
                                                {{-- <td class="text-center align-top"> {{ $transition->amount }}</td> --}}
                                                <td class="text-center align-top">
                                                    @if($transition->status == 'Credited')
                                                        <span style="color: white; background-color: rgb(39, 92, 25); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                    @elseif($transition->status == 'Debited')
                                                        <span style="color: white; background-color: rgb(175, 64, 64); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                    @else
                                                        <span style="color: white; background-color: rgb(177, 175, 44); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-top">@isset($transition->Account_number){{$transition->Account_number}}@endisset</td>
                                                <td class="text-center align-top">@isset($transition->TxnID){{$transition->TxnID}}@endisset</td>
                                                <td class="text-center align-top">@isset($transition->transition_medium){{$transition->transition_medium}}@endisset</td>
                                                <td class="text-center align-top">@isset($transition->amount){{$transition->amount}}@endisset</td>
                                                <td class="text-center align-top"> @isset($transition->amount){{$transition->date}}@endisset</td>
                                                {{-- <td></td> --}}
                                                <td class="text-center align-top">
                                                    @if (Auth::user()->type == 'admin')
                                                        @if ($transition->status == 'Debit-Request')
                                                            <a onclick="edit_transition({{$transition->id}})" data-target="#edit_transition" data-toggle="modal" class="btn btn-link text-success">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                        @endif
                                                    @endif
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

        <div class="row transition_tab">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">OWN TRANSITION DETAILS</h4>
                    </div>
                    <div class="toolbar">
                        <button class="btn btn-primary ml-3" id = "debit_request_btn"> Debit Request</button>
                    </div>
                    {{-- <br> --}}
                    <div class="row-md-6 btn-group">
                        <button type="button" id="credit" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-3">Credit</button>
                        <button type="button" id="debit" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-1">Debit</button>
                        <button type="button" id="debit_request" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-1">Debit Request</button>
                     </div>
                    <div class="material-datatables mt-3">
                        <div class = 'owntransition'>
                            <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center">User Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Account Number</th>
                                        <th class="text-center">TxnID</th>
                                        <th class="text-center">Transition Medium</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($own_transition)
                                        @foreach($own_transition as $key=>$transition)

                                            <tr>
                                                <td class="text-center align-top">{{ ++$key }}</td>
                                                <td class="text-center align-top"> {{ $transition->user->name_en }}</td>
                                                {{-- <td class="text-center align-top"> {{ $transition->amount }}</td> --}}
                                                <td class="text-center align-top">
                                                    @if($transition->status == 'Credited')
                                                        <span style="color: white; background-color: rgb(39, 92, 25); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                    @elseif($transition->status == 'Debited')
                                                        <span style="color: white; background-color: rgb(175, 64, 64); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                    @else
                                                        <span style="color: white; background-color: rgb(177, 175, 44); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-top">@isset($transition->Account_number){{$transition->Account_number}}@endisset</td>
                                                <td class="text-center align-top">@isset($transition->TxnID){{$transition->TxnID}}@endisset</td>
                                                <td class="text-center align-top">@isset($transition->transition_medium){{$transition->transition_medium}}@endisset</td>
                                                <td class="text-center align-top">@isset($transition->amount){{$transition->amount}}@endisset</td>
                                                <td> @isset($transition->amount){{$transition->date}}@endisset</td>

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
@else
    <div class="content">
        <div class="row transition_tab">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">OWN TRANSITION DETAILS</h4>
                    </div>
                    <div class="toolbar">
                        <button class="btn btn-primary" id = "debit_request_btn"> Debit Request</button>
                    </div>
                    {{-- <br> --}}
                    <div class="card-body">
                        <div class="material-datatables mt-3">
                            <div class="row-md-6 btn-group">
                                <button type="button" id="credit" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info user_role">Credit</button>
                                <button type="button" id="debit" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info user_role">Debit</button>
                                <button type="button" id="debit_request" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info user_role">Debit Request</button>
                            </div>
                            <div class = 'owntransition'>
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">User Name</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Account Number</th>
                                            <th class="text-center">TxnID</th>
                                            <th class="text-center">Transition Medium</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($own_transition)
                                            @foreach($own_transition as $key=>$transition)

                                                <tr>
                                                    <td class="text-center align-top">{{ ++$key }}</td>
                                                    <td class="text-center align-top"> {{ $transition->user->name_en }}</td>
                                                    {{-- <td class="text-center align-top"> {{ $transition->amount }}</td> --}}
                                                    <td class="text-center align-top">
                                                        @if($transition->status == 'Credited')
                                                            <span style="color: white; background-color: rgb(39, 92, 25); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                        @elseif($transition->status == 'Debited')
                                                            <span style="color: white; background-color: rgb(175, 64, 64); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                        @else
                                                            <span style="color: white; background-color: rgb(177, 175, 44); font-weight: 700; font-size: 12px; padding: 3px; border-radius: 4px;">{{$transition->status}}</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center align-top">@isset($transition->Account_number){{$transition->Account_number}}@endisset</td>
                                                    <td class="text-center align-top">@isset($transition->TxnID){{$transition->TxnID}}@endisset</td>
                                                    <td class="text-center align-top">@isset($transition->transition_medium){{$transition->transition_medium}}@endisset</td>
                                                    <td class="text-center align-top">@isset($transition->amount){{$transition->amount}}@endisset</td>
                                                    <td> @isset($transition->amount){{$transition->date}}@endisset</td>

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
    </div>

@endif



 <!-- Edit modal-->
 <div class="modal fade" id="edit_transition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">EDIT TRANSITION</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group md-form-group is-filled">
                    <form action="{{ route('user.transition.status.update') }}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                        @csrf
                        <div class="row">
                            <label class="col-md-3 col-form-label">USER NAME</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input type="hidden" class="user_id" name="user_id">
                                    <input readonly class="form-control" type="text" name="user_name" id="user_name">
                                    <input type="hidden" class="id" name="id">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Transition Medium</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input readonly class="form-control" type="text" name="tersition_medium" id="tersition_medium" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Transition Amount</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input readonly class="form-control" type="text" name="amount" id="amount" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Account Number</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input readonly class="form-control" type="text" name="acc_num" id="acc_num" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Txn ID</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input class="form-control" type="text" name="txn_id" id="txn_id" >
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script>
   function edit_transition(id){
    //    alert(id)
       $.ajax({
            'url': "{{route('transition.status.change')}}",
            'data' : {
                "id":id
            },
            'type': 'GET',

                success:function(data){
                    // console.log(data)
                    $('#user_name').empty();
                    $('#tersition_medium').empty();
                    $('#amount').empty();
                    $('#acc_num').empty();
                    $('#txn_id').empty();
                    $('.id').empty();
                    $('.user_id').empty();
                    // append data
                    $('#user_name').val(data['name'].name_en);
                    $('#tersition_medium').val(data['transition'].transition_medium);
                    $('#amount').val(data['transition'].amount);
                    $('#acc_num').val(data['transition'].Account_number);
                    $('#txn_id').val(data['transition'].TxnID);
                    $('.id').val(data['transition'].id);
                    $('.user_id').val(data['name'].id);

                    // $('.wallet_detail').html(data);

                }
         });

   }



    $(document).ready(function(){
        $('#transition_type').change(function(){
            transition_type = $('#transition_type').val()
            user_type = $('#user_type').val()
            user_id = $('#user_id').val();
            $.ajax({
                'url': "{{route('user.transion.filter')}}",
                'dataType': 'html',
                'data' : {
                    "transition_type":transition_type,
                    "user_type": user_type,
                    "user_id": user_id
                },
                'type': 'GET',

                    success:function(data){
                        $('.transition_tab').html(data);

                    }
            });

        })
        $('#user_type').change(function(){
            transition_type = $('#transition_type').val()
            user_type = $('#user_type').val()
            // alert(user_type)
            user_id = $('#user_id').val();
           changeTranjectionTab();
            $.ajax({
                'url': "{{route('get.user.by.id')}}",
                'data' : {
                    "user_type": user_type,
                },
                'type': 'GET',

                success:function(data){
                    // $('.transition_tab').html(data);
                    $('#user_id').html(null);
                    $('#user_id').append($('<option >', {
                        value: '',
                        text: 'Choose User Name',
                    }));
                    for (var i = 0; i < data.length; i++) {
                        $('#user_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].name_en
                        }));
                    }

                }
            });
        })
        $('#user_id').change(function(){
            changeTranjectionTab();
        })
        $('#credit').click(function(){
            // alert(456)
            getOwntranjection('Credited');
        })
        $('#debit').click(function(){
            getOwntranjection('Debited');
        })
        $('#debit_request').click(function(){
            getOwntranjection('Debit-Request');
        })
        $('#debit_request_btn').click(function(){
            // getOwntranjection('Debit-Request');
            if("{{$own_wallet}}" >= 0){
                window.location.replace("{{route('user.withdraw.request')}}")
            }

        })
    })

    function changeTranjectionTab(){

        transition_type = $('#transition_type').val()
        user_type = $('#user_type').val()
        user_id = $('#user_id').val();
        $.ajax({
            'url': "{{route('user.transion.filter')}}",
            'dataType': 'html',
            'data' : {
                "transition_type":transition_type,
                "user_type": user_type,
                "user_id": user_id
            },
            'type': 'GET',

                success:function(data){
                    $('.transition_tab').html(data);

                }
        });
    }

    function getOwntranjection(txnType){
        $.ajax({
            'url': "{{route('own.transion')}}",
            'dataType': 'html',
            'data' : {
               type:txnType
            },
            'type': 'GET',

                success:function(data){
                    $('.owntransition').html(data);

                }
        });
    }



</script>

@endpush
