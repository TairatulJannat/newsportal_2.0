<div class="material-datatables">
    <table id="datatables2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
