@extends('backend.layouts.app')

@section('content')

<style>

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

    @keyframes bake-pie {
        from {
            transform: rotate(0deg) translate3d(0,0,0);
        }
    }

    main {
        width: 400px;
        margin: 30px auto;
    }

    section {
        margin-top: 30px;
    }

    .pieID {
        display: inline-block;
        vertical-align: top;
    }

    .pie {
        height: 200px;
        width: 200px;
        position: relative;
        margin: 0 30px 30px 0;
    }

    .pie::before {
        content: "";
        display: block;
        position: absolute;
        z-index: 1;
        width: 100px;
        height: 100px;
        background: #202940;
        border-radius: 50%;
        top: 50px;
        left: 50px;
    }



    .slice {
        position: absolute;
        width: 200px;
        height: 200px;
        clip: rect(0px, 200px, 200px, 100px);
        animation: bake-pie 1s;
    }

    .slice span {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        background-color: black;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        clip: rect(0px, 200px, 200px, 100px);
    }

    .legend {
        list-style-type: none;
        padding: 0;
        margin: 0;
        background: #FFF;
        padding: 15px;
        font-size: 13px;
        box-shadow: 1px 1px 0 #DDD,
                    2px 2px 0 #BBB;

        margin-top:1rem;
    }

    .legend li {
        width: 110px;
        height: 1.25em;
        margin-bottom: 0.7em;
        padding-left: 0.5em;
        border-left: 1.25em solid black;
    }

    .legend em {
        font-style: normal;
    }

    .legend span {
        float: right;
    }
    .content .user .card-icon.main{
        background: linear-gradient(60deg, #fa8506, #fd9102);
    }

</style>
{{-- @include('backend.layouts.partial.global.alexa') --}}
<div class="content">
    <div class="content">
      <div class="container-fluid">
        <div class="" style="justify-content: start; margin-left: .1rem; margin-bottom: 1rem">
            <div class="row btn-group">
                <button type="button" id="day" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">Today</button>
                <button type="button" id="week" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">This Week</button>
                <button type="button" id="month" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info active date_range">This Month</button>
                <button type="button" id="year" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">This Year</button>
            </div>
        </div>
        @if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin' || Auth::user()->type == 'editor')
            <div class="row">

                {{-- User --}}
                <div class="col-lg-9 col-md-6 col-sm-6">
                    <div id="card-stats1" class="card card-stats user">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon main">
                                <i class="fa fa-user" style="font-size: 2.6rem"></i>
                            </div>
                            <p class="card-category">User</p>
                            <h3 class="card-title" id="total_user">0</h3>
                        </div>

                        <div class="card-footer row">

                            <div class="stats col-lg-2">
                            </div>

                            <div class="stats col-lg-2">
                                <div class="card-icon" style="margin-right: 4px">
                                    <i class="fa fa-check" aria-hidden="true" style=""></i>Super Admin:
                                </div>
                                <span id="total_super_admin">0</span>
                            </div>

                            <div class="stats col-lg-2">
                                <div class="card-icon" style="margin-right: 4px">
                                    <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Admin:
                                </div>
                                <span id="total_admin">0</span>
                            </div>

                            <div class="stats col-lg-2">
                                <div class="card-icon" style="margin-right: 4px">
                                    <i class="fa fa-history" aria-hidden="true" style="margin-right: 4px"></i>Editor:
                                </div>
                                <span  id="total_editor">0</span>
                            </div>

                            <div class="stats col-lg-2">
                                <div class="card-icon" style="margin-right: 4px">
                                    <i class="fa fa-history" aria-hidden="true" style="margin-right: 4px"></i>Sub Editor:
                                </div>
                                <span  id="total_sub_editor">0</span>
                            </div>

                            <div class="stats col-lg-2">
                                <div class="card-icon" style="margin-right: 4px">
                                    <i class="fa fa-history" aria-hidden="true" style="margin-right: 4px"></i>Reporter:
                                </div>
                                <span  id="total_reporter">0</span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- ADs --}}
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div id="card-stats2" class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p class="card-category">Ads</p>
                            <h3 class="card-title" id="total_ad">0</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                {{-- @if(Auth::user()->type == 'reporter' || Auth::user()->type == 'sub_editor') --}}
                {{-- post --}}
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div id="card-stats3" class="card card-stats">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            </div>
                            <p class="card-category">Post</p>
                            <h3 class="card-title" id="total_post">0</h3>
                        </div>

                        <div class="card-footer row">
                            <div class="stats col-lg-4">
                                <div class="card-icon" style="margin-right: 4px">
                                    <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Published Post:
                                </div>
                                {{-- <p class="card-category">Published Post</p> --}}
                                <span id="total_post_published">0</span>
                            </div>

                            <div class="stats col-lg-4">
                                <div class="card-icon" style="margin-right: 4px">
                                    <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Pending Post:
                                </div>
                                {{-- <p class="card-category">Published Post</p> --}}
                                <span id="total_post_pending">0</span>
                            </div>

                            <div class="stats col-lg-4">
                                <div class="card-icon" style="margin-right: 4px">
                                    <i class="fa fa-history" aria-hidden="true" style="margin-right: 4px"></i>Correction Post:
                                </div>
                                {{-- <p class="card-category">Pending Post</p> --}}
                                <span  id="total_post_correction">0</span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Blog --}}
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div id="card-stats4" class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">summarize</i>
                        </div>
                        <p class="card-category">Blog</p>
                        <h3 class="card-title" id="total_BlogPost">0</h3>
                    </div>
                    <div class="card-footer row">
                        <div class="stats col-lg-4">
                            <div class="card-icon" style="margin-right: 4px">
                                <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Published Blog:
                            </div>
                            {{-- <p class="card-category">Published Post</p> --}}
                            <span id="total_blog_published">0</span>
                        </div>

                        <div class="stats col-lg-4">
                            <div class="card-icon" style="margin-right: 4px">
                                <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Pending Blog:
                            </div>
                            {{-- <p class="card-category">Published Post</p> --}}
                            <span id="total_blog_pending">0</span>
                        </div>

                        <div class="stats col-lg-4">
                            <div class="card-icon" style="margin-right: 4px">
                                <i class="fa fa-history" aria-hidden="true" style="margin-right: 4px"></i>Correction Blog:
                            </div>
                            {{-- <p class="card-category">Pending Post</p> --}}
                            <span  id="total_blog_correction">0</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif


       @if(Auth::user()->type == 'reporter' || Auth::user()->type == 'sub_editor')
        <div class="row">

            {{-- post --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div id="card-stats5" class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                </div>
                <p class="card-category">Post</p>
                <h3 class="card-title" id="total_post">0</h3>
                </div>

                <div class="card-footer row">
                    <div class="stats col-lg-4">
                        <div class="card-icon" style="margin-right: 4px">
                            <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Published Post:
                        </div>
                        {{-- <p class="card-category">Published Post</p> --}}
                        <span id="total_post_published">0</span>
                    </div>

                    <div class="stats col-lg-4">
                        <div class="card-icon" style="margin-right: 4px">
                            <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Pending Post:
                        </div>
                        {{-- <p class="card-category">Published Post</p> --}}
                        <span id="total_post_pending">0</span>
                    </div>

                    <div class="stats col-lg-4">
                        <div class="card-icon" style="margin-right: 4px">
                            <i class="fa fa-history" aria-hidden="true" style="margin-right: 4px"></i>Correction Post:
                        </div>
                        {{-- <p class="card-category">Pending Post</p> --}}
                        <span  id="total_post_correction">0</span>
                    </div>
                </div>

            </div>
            </div>

            {{-- Blog --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div id="card-stats6" class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">summarize</i>
                    </div>
                    <p class="card-category">Blog</p>
                    <h3 class="card-title" id="total_BlogPost">0</h3>
                </div>
                <div class="card-footer row">
                    <div class="stats col-lg-4">
                        <div class="card-icon" style="margin-right: 4px">
                            <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Published Blog:
                        </div>
                        {{-- <p class="card-category">Published Post</p> --}}
                        <span id="total_blog_published">0</span>
                    </div>

                    <div class="stats col-lg-4">
                        <div class="card-icon" style="margin-right: 4px">
                            <i class="fa fa-check" aria-hidden="true" style="margin-right: 4px"></i>Pending Blog:
                        </div>
                        {{-- <p class="card-category">Published Post</p> --}}
                        <span id="total_blog_pending">0</span>
                    </div>

                    <div class="stats col-lg-4">
                        <div class="card-icon" style="margin-right: 4px">
                            <i class="fa fa-history" aria-hidden="true" style="margin-right: 4px"></i>Correction Blog:
                        </div>
                        {{-- <p class="card-category">Pending Post</p> --}}
                        <span  id="total_blog_correction">0</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif


        <div class="row">
            {{-- post --}}
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-primary" data-header-animation="false">
                <div class="ct-chart" id="websiteViewsChart"></div>
              </div>
              <div class="card-body">
                <div class="card-actions">
                  <button type="button" class="btn text-danger btn-link fix-broken-card">

                  </button>
                  <button type="button" class="btn text-info btn-link" data-toggle="tooltip" data-placement="bottom" title="Refresh">
                    <i class="material-icons">refresh</i>
                  </button>
                  <button type="button" class="btn text-default btn-link" data-toggle="tooltip" data-placement="bottom" title="Change Date">
                    <i class="material-icons">edit</i>
                  </button>
                </div>
                <h4 class="card-title">Post Per Month For All</h4>
                {{-- <p class="card-category">Last Campaign Performance</p> --}}
              </div>
              {{-- <div class="card-footer">
                <div class="stats">
                   <i class="material-icons">access_time</i> 2
                </div>
              </div> --}}
            </div>
          </div>
          {{-- visitor --}}
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-warning" data-header-animation="false">
                <div class="ct-chart" id="dailySalesChart"></div>
              </div>
              <div class="card-body">
                <div class="card-actions">
                  <button type="button" class="btn text-danger btn-link fix-broken-card">

                  </button>
                  <button type="button" class="btn text-info btn-link" data-toggle="tooltip" data-placement="bottom" title="Refresh">
                    <i class="material-icons">refresh</i>
                  </button>
                  <button type="button" class="btn text-default btn-link" data-toggle="tooltip" data-placement="bottom" title="Change Date">
                    <i class="material-icons">edit</i>
                  </button>
                </div>
                <h4 class="card-title">Visitor Per Week For All</h4>
                <p class="card-category">
                  {{-- <span class="text-warning"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p> --}}
              </div>
              {{-- <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="pull-right" style="justify-content: start; margin-left: .1rem; margin-bottom: 1rem">
            <div class="row btn-group">
                <button type="button" id="allc" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">All</button>
                <button type="button" id="weekc" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">This Week</button>
                <button type="button" id="monthc" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info active date_range">This Month</button>
                <button type="button" id="yearc" class="col-lg-3 col-md-3 col-sm-6 col-6 btn btn-info date_range">This Year</button>
            </div>
        </div>
        <div style="clear:right"></div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card " style="">

                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
                        </div>
                        <h4 class="card-title">Own Category Post</h4>
                    </div>

                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        {{-- <p class="highcharts-description">
                            This pie chart shows how the chart legend can be used to provide
                            information about the individual slices.
                        </p> --}}
                    </figure>

                    <style>

                    </style>

                    {{-- <hr style="background-color:rgba(181, 181, 181, 0.1); margin-left:1rem; margin-right:1rem" > --}}


                    <div class="row mt-5">
                        <div class="col-lg-3"></div>
                        <!-- <div class="col-lg-6 text-center text-light" id="donut"></div> -->
                        <div class="col-lg-3"></div>
                        <style>

                            .highcharts-figure,
                            .highcharts-data-table table {
                            min-width: 320px;
                            max-width: 660px;
                            margin: 1em auto;
                            }

                            .highcharts-data-table table {
                            font-family: Verdana, sans-serif;
                            border-collapse: collapse;
                            border: 1px solid #ebebeb;
                            margin: 10px auto;
                            text-align: center;
                            width: 100%;
                            max-width: 500px;
                            }

                            .highcharts-data-table caption {
                            padding: 1em 0;
                            font-size: 1.2em;
                            color: #fff;
                            }

                            .highcharts-data-table th {
                            font-weight: 600;
                            padding: 0.5em;
                            }

                            .highcharts-data-table td,
                            .highcharts-data-table th,
                            .highcharts-data-table caption {
                            padding: 0.5em;
                            }

                            .highcharts-data-table thead tr,
                            .highcharts-data-table tr:nth-child(even) {
                            background: #f8f8f8;
                            }

                            .highcharts-data-table tr:hover {
                            background: #f1f7ff;
                            }
                            rect.highcharts-background {
                                fill: none;
                            }
                            .wrapper figure g.highcharts-legend-item text {
                                stroke: #b3b3b3;
                                font-weight: 300 !important;
                            }
                            rect.highcharts-button-box {
                                fill: none;
                            }
                            path.highcharts-button-symbol {
                                stroke: #fff;
                            }
                            .wrapper figure text.highcharts-credits {
                                stroke: #202940;
                            }
                            .weekly-chart .highcharts-figure svg.highcharts-root{
                                width: 280px;
                                margin-left: 1.5rem;
                                margin-top: -22px;
                            }
                        </style>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-6 daywisechart">
                <div class="card weekly-chart " style="padding-bottom: 1.8rem;">

                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
                        </div>
                        <h4 class="card-title">Own Daywise Post</h4>
                    </div>

                    <figure class="highcharts-figure">
                        <div id="Pie_Chart_daywise"></div>
                        <p class="highcharts-description"></p>
                    </figure>


                </div>

            </div>

        </div>

    </div>

    <br>




    </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@push('js')

<script>

    // UPDATED BY TOUSIF

    // FOR DISPLAYING LOGIN NOTIFICATION

    @if(Session::has('login_notification'))

        systemNotification('top', 'right', 'success', "{{ Session::get('login_notification') }}");

    @endif


    $(document).ready(function(){

        let date = "month";

        dynamicDataByDate("month");
        dynamicGraph();

        $('.date_range').click(function(){

            $('#month').removeClass('active')
            $(this.id).addClass('active');
            dynamicDataByDate(this.id);

        })

        function dynamicDataByDate(date){

            $.ajax({
                url : "{{ route('admin.home') }}",
                type : 'GET',
                data: { date: date },
                datatype : 'json'
            })

            .done(function(data){

                let object = JSON.parse(data);

                $('#total_user').html(object.total_user);
                $('#total_super_admin').html(object.total_super_admin);
                $('#total_admin').html(object.total_admin);
                $('#total_editor').html(object.total_editor);
                $('#total_sub_editor').html(object.total_sub_editor);
                $('#total_reporter').html(object.total_reporter);
                $('#total_post').html(object.total_post);
                $('#total_BlogPost').html(object.total_BlogPost);
                $('#total_ad').html(object.total_ad);
                $('#total_post_published').html(object.total_post_published);
                $('#total_post_pending').html(object.total_post_pending);
                $('#total_post_correction').html(object.total_post_correction);
                $('#total_blog_published').html(object.total_blog_published);
                $('#total_blog_pending').html(object.total_blog_pending);
                $('#total_blog_correction').html(object.total_blog_correction);
            })

            .fail(function(){
                alert('error');
            })

        }

        function dynamicGraph(){


            $.ajax({
                url : "{{ route('post.graph') }}",
                type : 'GET',
                dataType : 'json'
            })

            .done(function(data){
                md.initDashboardPageCharts(data);

            })

            // .fail(function(){
            //     alert('error');
            // });

        }


    })

</script>

<script>

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

</script>

<script>

    $('#datatables1').DataTable({

        responsive: true,
        lengthMenu: [5],
        dom: "<'row'<'col-sm-12'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p>>",
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });

    //var table = $('#datatables').DataTable();


</script>


<script>

    $('#datatables2').DataTable({

        responsive: true,
        lengthMenu: [5],
        dom: "<'row'<'col-sm-12'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p>>",
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });

    //var table = $('#datatables2').DataTable();


</script>

<script>

    $('#datatables3').DataTable({

        responsive: true,
        lengthMenu: [5],
        dom: "<'row'<'col-sm-12'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p>>",
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });

    //var table = $('#datatables2').DataTable();


</script>


{{-- pie chart --}}

<script>

$( document ).ready(function() {

    $.ajax({
        url: "{{ route('post.pie_chart') }}",
        method: "get",
        data: {},
        success: function(data) {
            console.log(data);
            let data_val = [] ;
            let Total = 0;
            let index1=0;
            for (let k in data) {

                Total = Total + data[k],
                index1++
            }
            let index=0;
            for (let key in data) {

                data_val[index] = {
                "y": ((data[key]/Total)*100),
                "name":key
                }
                index++
            }

            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: "#202940",
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                    valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data:data_val

                }]
            });
        }

    });
    getpostbyday('all')
    $('#allc').click(function(){
        getpostbyday('all')
        
    });
    $('#monthc').click(function(){
        getpostbyday('month')
    });
    $('#weekc').click(function(){
        getpostbyday('week')
    });
    $('#yearc').click(function(){
        getpostbyday('year')
    });
    
});
function getpostbyday(value){
    // alert(value)
    $.ajax({
        url: "{{ route('weekly.pie_chart') }}",
        method: "get",
        data: {key:value},
        success: function(data) {
            // console.log(123);
            let data_val = [] ;

            let index=0;
            for (let key in data) {

                data_val[index] = {
                "y": data[key],
                "name":key
                }
                index++
            }
            // console.log(data_val)
                Highcharts.chart('Pie_Chart_daywise', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ' '
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    // point: {
                    //     valueSuffix: '%'
                    // }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: data_val
                }]
            });
        }
    });
}
</script>
<script>



</script>
@endpush
