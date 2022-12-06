<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
