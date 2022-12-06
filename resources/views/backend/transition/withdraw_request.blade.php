@extends('backend.layouts.app')

@section('content')

<style>
    .withdraw .form-group select{
        font-size: 14px;
        padding: 0 8px;
        background: #17a2b8 linear-gradient( 180deg , #3ab0c3, #17a2b8) repeat-x;
        border: none;
        color: #fff;
        border-radius: 2px;
        cursor: pointer;
    }
    .withdraw .form-group select:focus{
        outline: none;
    }
    .withdraw .form-group select:hover{
        background: #17a2b8 linear-gradient( 180deg , #3ab0c3, #066b7a) repeat-x;
    }
</style>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                        {{-- <div class="card-header">
                            <h4 class="card-title">Filter</h4>
                        </div> --}}

                            <div class = "row withdraw">
                                <div class="modal-dialog" style="width: 700px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">WITHDRAWAL REQUEST</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group md-form-group is-filled">
                                                <form action="{{ route('user.withdraw.request.store') }}" method="POST" class="form-horizontal" autocomplete="off">
                                                    @csrf
                                                    <div class="col-md-9 p-0">
                                                        <div class="form-group has-default">
                                                            <h4>Total Amount :</h4><span><p id="total_amount">{{$own_wallet}}</p></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label">User Name</label>
                                                        <div class="col-md-9">
                                                            <div class="form-group has-default">
                                                                <input readonly  class="form-control" type="text" name="user_name" id="user_name" value ="{{ Auth::user()->name_en }}">
                                                                <input type="hidden" class="id" name="id" value={{ Auth::user()->id }}>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label">Withdraw Amount</label>
                                                        <div class="col-md-9">
                                                            <div class="form-group has-default">
                                                                <input class="form-control" type="number" name="amount" id="amount">
                                                            </div>
                                                            <div class="form-group has-default">
                                                                <p style="color: red" id="err_msg"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label">Transition Medium</label>
                                                        <select name="transition_medium" id="transition_medium">
                                                            <option disable value="">Choose One</option>
                                                            <option value="bank">Bank</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="bKash">bKash</option>
                                                            <option value="Nagad">Nagad</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label">Account Number</label>
                                                        <div class="col-md-9">
                                                            <div class="form-group has-default">
                                                                <input  class="form-control" type="number" name="Account_number" id="Account_number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row bank" style="display:none">
                                                        <label class="col-md-3 col-form-label">Bank Name</label>
                                                        <div class="col-md-9">
                                                            <div class="form-group has-default">
                                                                <input  class="form-control" type="text" name="bank_name" id="bank_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row bank" style="display:none">
                                                        <label class="col-md-3 col-form-label">Branch Name</label>
                                                        <div class="col-md-9">
                                                            <div class="form-group has-default">
                                                                <input  class="form-control" type="text" name="branch_name" id="branch_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label">You Will Recieve</label>
                                                        <div class="col-md-9">
                                                            <div class="form-group has-default">
                                                                <input readonly class="form-control" type="number" name="net_amount" id="net_amount">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" id="btnSubmit" type="submit">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                </div>
            </div>
        </div>
   </div>

   <!-- withdrawal request-->





@endsection

@push('js')

<script>

    function bonus_amount_edit(id){
     $.ajax({
           'url': 'withdraw-request/'+id,
           'type': 'GET',
           'data': {},
          success:function(data){
              alert(123);
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
$('#amount').change(function(){
    withdraw_Amount = parseFloat($('#amount').val())
    total_Amount =  parseFloat("{{$own_wallet}}")
    // alert(total_Amount , withdraw_Amount)
    if(total_Amount < withdraw_Amount){
        // alert(123)

        $('#err_msg').html('You can not withdraw more than your total balence')
        $("#btnSubmit").attr("disabled", true);

    }else{
        if(withdraw_Amount<1000){
            $('#err_msg').html('You can not withdraw less than 1000.00')
            $("#btnSubmit").attr("disabled", true);
        }
        else $("#btnSubmit").attr("disabled", false);
    }
    // alert(123)

})
$('#transition_medium').change(function(){
    withdraw_Amount = parseFloat($('#amount').val())
    if(this.value == 'bank'){
        // alert(123)
        $('.bank').css("display" , '')
    }
    else{
        if(this.value == 'bKash'){
            $('.bank').css("display" , 'none')
            $('#net_amount').val(withdraw_Amount-20)
        }
        else if(this.value == 'Nagad'){
            $('.bank').css("display" , 'none')
            $('#net_amount').val(withdraw_Amount-10)
        }
        else if(this.value == 'cash'){
            $('.bank').css("display" , 'none')
            $('#net_amount').val(withdraw_Amount)

        }
    }

})


</script>

@endpush


