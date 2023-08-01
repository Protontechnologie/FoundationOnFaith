@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4></div>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <div class="row">
            @if(Helper::can_view('report'))
            <div class="col-12 col-lg-12 mt-3">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12 col-sm-6 mt-3">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                            <i class="icon-basket icons card-liner-icon mt-2 text-white"></i>
                                            <div class="card-liner-content">
                                                <h2 class="card-liner-title text-white">$ {{$data['all_dues']}}</h2>
                                                <h6 class="card-liner-subtitle text-white">Total Donation ({{$data['total_order_count']}})</h6>
                                            </div>
                                        </div>
                                        <div id="apex_primary_chart_1"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-6 mt-3">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                            <i class="icon-basket icons card-liner-icon mt-2 text-white"></i>
                                            <div class="card-liner-content">
                                                <h2 class="card-liner-title text-white">$ {{$data['today_dues']}}</h2>
                                                <h6 class="card-liner-subtitle text-white">Today's Donation ({{$data['today_order_count']}})</h6>
                                            </div>
                                        </div>
                                        <div id="apex_primary_chart_2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                            <i class="icon-bag icons card-liner-icon mt-2"></i>
                                            <div class="card-liner-content">
                                                <h2 class="card-liner-title">${{$data['all_paid']}}</h2>
                                                <h6 class="card-liner-subtitle">Total Sale ({{$data['total_paid_count']}})</h6>
                                            </div>
                                        </div>
                                        <div id="apex_today_profit_1"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-6 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                            <i class="icon-bag icons card-liner-icon mt-2"></i>
                                            <div class="card-liner-content">
                                                <h2 class="card-liner-title">${{$data['today_paid']}}</h2>
                                                <h6 class="card-liner-subtitle">Today's Sale ({{$data['today_paidorder_count']}})</h6>
                                            </div>
                                        </div>
                                        <div id="apex_today_profit_2"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="apex_bar_chart_1" class="height-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            @if(Helper::can_view('users'))
            <div class="col-md-12 col-lg-12 mt-3">
                <div class="card overflow-hidden">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">New Users</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 custom-way-h">
                            <ul class="list-group list-unstyled">
                                
                                @if($all_users)
                                @foreach($all_users as $user)
                                <li class="p-2 border-bottom zoom">
                                    <div class="media d-flex w-100">
                                        <a href="#"><img src="{{asset('admin/dist/images/author1.jpg')}}" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40" /></a>
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Full Name: {{$user->name}} </span><br />
                                            <span class="mb-0 font-w-600">Username: {{$user->username}}</span><br />
                                            <p class="mb-0 font-w-500 tx-s-12">Email Address: {{$user->email}}</p>
                                        </div>
                                        <div class="ml-auto my-auto">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="icon-options icons h6 font-weight-bold"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!--<a href="" class="dropdown-item px-2 align-self-center d-flex"> <span class="icon-pencil mr-2 h6 mb-0"></span> Edit Profile</a>-->
                                                @if(Helper::can_edit('users'))
                                                <a href="{{route('user.edit',$user->id)}}" target="_blank" class="dropdown-item px-2 align-self-center d-flex"> <span class="icon-user mr-2 h6 mb-0"></span> View Profile</a>
                                                @endif
                                                <!--<a href="" class="dropdown-item px-2 text-danger align-self-center d-flex"> <span class="icon-trash mr-2 h6 mb-0"></span> Delete</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->
@endsection 
@section('css')
<style>
    .custom-way-h{
        overflow-y: scroll;
        height: 387px;
        overflow-x: hidden;
    }
</style>
@endsection
@section('js')

<script>
    var theme = "light";
    if ($("#apex_bar_chart_1").length > 0) {
        options = {
            theme: {
                mode: theme,
            },
            grid: {
                yaxis: {
                    lines: {
                        show: false,
                    },
                },
            },
            chart: {
                height: 318,
                type: "bar",
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    columnWidth: "10",
                },
            },
            dataLabels: {
                enabled: false,
            },
            colors: ["#1e3d73"],
            series: [
                {
                    data: [{{$data['months_report_amount']}}],
                },
            ],
            xaxis: {
                categories: [<?=$data['months_report_name'] ?>],
            },
        };

        var chart = new ApexCharts(document.querySelector("#apex_bar_chart_1"), options);
        chart.render();
    }

    if ($("#apex_primary_chart_1").length > 0) {
        options = {
            chart: {
                type: "line",
                height: 80,
                sparkline: {
                    enabled: true,
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: "#ef4336",
                    opacity: 0.7,
                },
            },
            series: [
                {
                    data: [{{$data['total_order_generated']}}],
                },
            ],
            stroke: {
                curve: "smooth",
                width: 2,
            },
            markers: {
                size: 0,
            },
            grid: {
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                },
            },
            colors: ["#ef4336"],
            tooltip: {
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return "";
                        },
                    },
                },
            },
            responsive: [
                {
                    breakpoint: 1351,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 0,
                            },
                        },
                    },
                },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40,
                            },
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 45,
                                bottom: 0,
                                left: 0,
                            },
                        },
                    },
                },
            ],
        };

        var chart = new ApexCharts(document.querySelector("#apex_primary_chart_1"), options);
        chart.render();
    }
    if ($("#apex_primary_chart_2").length > 0) {
        options = {
            chart: {
                type: "line",
                height: 80,
                sparkline: {
                    enabled: true,
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: "#d9f3fd",
                    opacity: 0.7,
                },
            },
            series: [
                {
                    data: [{{$data['today_order_generated']}}],
                },
            ],
            stroke: {
                curve: "smooth",
                width: 2,
            },
            markers: {
                size: 0,
            },
            grid: {
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                },
            },
            colors: ["#d9f3fd"],
            tooltip: {
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return "";
                        },
                    },
                },
            },
            responsive: [
                {
                    breakpoint: 1351,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 0,
                            },
                        },
                    },
                },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40,
                            },
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 45,
                                bottom: 0,
                                left: 0,
                            },
                        },
                    },
                },
            ],
        };

        var chart = new ApexCharts(document.querySelector("#apex_primary_chart_2"), options);
        chart.render();
    }
    if ($("#apex_today_profit_1").length > 0) {
        options = {
            chart: {
                type: "line",
                height: 80,
                sparkline: {
                    enabled: true,
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: "#f89938",
                    opacity: 0.7,
                },
            },
            series: [
                {
                    data: [{{$data['total_paid_generated']}}],
                },
            ],
            stroke: {
                curve: "smooth",
                width: 2,
            },
            markers: {
                size: 0,
            },
            grid: {
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                },
            },
            colors: ["#f89938"],
            tooltip: {
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return "";
                        },
                    },
                },
            },
            responsive: [
                {
                    breakpoint: 1351,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 0,
                            },
                        },
                    },
                },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40,
                            },
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 45,
                                bottom: 0,
                                left: 0,
                            },
                        },
                    },
                },
            ],
        };

        var chart = new ApexCharts(document.querySelector("#apex_today_profit_1"), options);
        chart.render();
    }
    if ($("#apex_today_profit_2").length > 0) {
        options = {
            chart: {
                type: "line",
                height: 80,
                sparkline: {
                    enabled: true,
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: "#ef4336",
                    opacity: 0.7,
                },
            },
            series: [
                {
                    data: [{{$data['today_paidorder_generated']}}],
                },
            ],
            stroke: {
                curve: "smooth",
                width: 2,
            },
            markers: {
                size: 0,
            },
            grid: {
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                },
            },
            colors: ["#ef4336"],
            tooltip: {
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return "";
                        },
                    },
                },
            },
            responsive: [
                {
                    breakpoint: 1351,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 0,
                            },
                        },
                    },
                },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40,
                            },
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 45,
                                bottom: 0,
                                left: 0,
                            },
                        },
                    },
                },
            ],
        };

        var chart = new ApexCharts(document.querySelector("#apex_today_profit_2"), options);
        chart.render();
    }
</script>
@endsection