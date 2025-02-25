@extends('layout.backend')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 col-xl-4">
            <div class="card box-margin">
                <div class="card-body">
                    <div class="float-right"><i class="fa fa-id-badge text-primary font-30"></i></div><span class="badge badge-primary">Sessions</span>
                    <h4 class="my-3">226k</h4>
                    <p class="mb-0"><span class="text-success"><i class="fa fa-level-up mr-1" aria-hidden="true"></i>7.5%</span>New Sessions Today</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-md-6 col-xl-4">
            <div class="card box-margin">
                <div class="card-body">
                    <div class="float-right"><i class="fa fa-bar-chart-o font-30"></i></div><span class="badge badge-secondary">Avg.Sessions</span>
                    <h4 class="my-3">00:28</h4>
                    <p class="mb-0"><span class="text-danger"><i class="fa fa-level-down mr-1" aria-hidden="true"></i>1.4%</span> Weekly Avg.Sessions</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-4">
            <div class="card box-margin">
                <div class="card-body">
                    <div class="float-right"><i class="fa fa-codiepie text-warning font-30"></i></div><span class="badge badge-warning">Bounce Rate</span>
                    <h4 class="my-3">$2500</h4>
                    <p class="mb-0"><span class="text-danger"><i class="fa fa-level-down mr-1" aria-hidden="true"></i>45%</span> Bounce Rate Weekly</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-8 box-margin height-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Monthly sales</h4>
                    <!--  Chart -->
                    <div class="dashboard-area">
                        <div id="apexChartD"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card mb-30">
                <div class="card-body bg-gradient-dark">
                    <img class="mb-20" src="img/bg-img/icon-6.png" alt="">
                    <p class="text-danger font-weight-bold font-17 mb-10">Solutions</p>
                    <h2 class="text-success font-28">Work Process.</h2>
                    <p class="mb-0 text-white">We put your ideas and thus your wishes in the form of a unique web project.</p>
                    <a class="btn btn-light btn-sm mt-20" href="#">Contac Us</a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 box-margin height-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Web Analytics</h5>
                    <div class="transaction-area">
                        <div class="d-flex flex-row list-group-item align-items-center justify-content-between">
                            <div class="media d-flex justify-content-center align-items-center">
                                <div class="icon-section bg-primary-soft">
                                    <i class="fa fa-file-code-o"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">New Users</h6>
                                    <p class="mb-0">6 June 2019</p>
                                </div>
                            </div>

                            <div class="amount">
                                <p class="mb-0 font-weight-bold text-dark">57,0000</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row list-group-item align-items-center justify-content-between">
                            <div class="media d-flex justify-content-center align-items-center">
                                <div class="icon-section bg-danger-soft">
                                    <i class="fa fa-newspaper-o"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">Page Views</h6>
                                    <p class="mb-0">9 July 2019</p>
                                </div>
                            </div>

                            <div class="amount">
                                <p class="mb-0 font-weight-bold text-dark">79,496</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row list-group-item align-items-center justify-content-between">
                            <div class="media d-flex justify-content-center align-items-center">
                                <div class="icon-section bg-success-soft">
                                    <i class="fa fa-clone"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">Sessions</h6>
                                    <p class="mb-0">6 April 2019</p>
                                </div>
                            </div>

                            <div class="amount">
                                <p class="mb-0 font-weight-bold text-dark">47,381</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row list-group-item align-items-center justify-content-between">
                            <div class="media d-flex justify-content-center align-items-center">
                                <div class="icon-section bg-danger-soft">
                                    <i class="fa fa-newspaper-o"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">Page Views</h6>
                                    <p class="mb-0">9 July 2019</p>
                                </div>
                            </div>

                            <div class="amount">
                                <p class="mb-0 font-weight-bold text-dark">79,496</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row list-group-item align-items-center justify-content-between">
                            <div class="media d-flex justify-content-center align-items-center">
                                <div class="icon-section bg-danger-soft">
                                    <i class="icon-wallet"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">Through</h6>
                                    <p class="mb-0">22 Jan 2019</p>
                                </div>
                            </div>

                            <div class="amount">
                                <p class="mb-0 font-weight-bold text-dark">14,8294</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 box-margin height-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">New Orders</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Company</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Managed</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <img src="img/shop-img/20.jpg" class="chat-img mr-3" alt="...">
                                            <div class="media-body company-details">
                                                <h6 class="font-15 mb-1">Nte.Ltd</h6>
                                                <span class="font-13">Mysqul</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="txt-14">
                                        12.011.19
                                    </td>
                                    <td>
                                        <span class="badge badge-soft-success">
                                            Processing
                                        </span>
                                    </td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body company-details">
                                                <h6 class="font-15 mb-1">John Doe</h6>
                                                <span class="font-13">Photographer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Archive">
                                            <i class="fa fa-archive"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="media">
                                            <img src="img/shop-img/21.png" class="chat-img mr-3" alt="...">
                                            <div class="media-body company-details">
                                                <h6 class="font-15 mb-1">Dri.Ltd</h6>
                                                <span class="font-13">Mysqul</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="txt-14">
                                        14.011.19
                                    </td>
                                    <td>
                                        <span class="badge badge-soft-warning">
                                            Processing
                                        </span>
                                    </td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body company-details">
                                                <h6 class="font-15 mb-1">John Doe</h6>
                                                <span class="font-13">Devloper</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Archive">
                                            <i class="fa fa-archive"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <img src="img/shop-img/22.png" class="chat-img mr-3" alt="...">
                                            <div class="media-body company-details">
                                                <h6 class="font-15 mb-1">Sna.Ltd</h6>
                                                <span class="font-13">Mysqul</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="txt-14">
                                        18.011.19
                                    </td>
                                    <td>
                                        <span class="badge badge-soft-info">
                                            Processing
                                        </span>
                                    </td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body company-details">
                                                <h6 class="font-15 mb-1">John Doe</h6>
                                                <span class="font-13">Devloper</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Archive">
                                            <i class="fa fa-archive"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="media">
                                            <img src="img/shop-img/23.png" class="chat-img mr-3" alt="...">
                                            <div class="media-body company-details">
                                                <h6 class="font-15 mb-1">Cta.Ltd</h6>
                                                <span class="font-13">Mysqul</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="txt-14">
                                        22.011.19
                                    </td>
                                    <td>
                                        <span class="badge badge-soft-primary">
                                            Processing
                                        </span>
                                    </td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body company-details">
                                                <h6 class="font-15 mb-1">John Doe</h6>
                                                <span class="font-13">Photographer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Archive">
                                            <i class="fa fa-archive"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Revenue</h4>
                    <div class="ecommerce-chart">
                        <div id="apex2"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 box-margin height-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sessions By Channel</h4>
                    <div id="chartSummary1" class="chartSummary"></div>
                    <div class="row px-4">
                        <div class="col-4 mt-15">
                            <h6 class="font-13 mb-1">Organic Search</h6>
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">120 <small class="text-muted">25%</small></h5>
                            </div>
                        </div><!-- col -->
                        <div class="col-4 mt-15">
                            <h6 class="font-13 mb-1">Email</h6>
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">987 <small class="text-muted">20%</small></h5>
                            </div>
                        </div><!-- col -->
                        <div class="col-4 mt-15">
                            <h6 class="font-13 mb-1">Social Media</h6>
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">154 <small class="text-muted">25%</small></h5>
                            </div>
                        </div><!-- col -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 box-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sales Statement</h6>
                    <div class="crm-statement border p-4">
                        <h6 class="text-center font-weight-bold mb-30 font-24">Average</h6>
                        <div class="row">
                            <div class="col text-center mb-15">
                                <h6 class="font-14 mb-1">Daily</h6>
                                <p class="font-16 mb-0">$300</p>
                            </div>
                            <div class="col text-center mb-15">
                                <h6 class="font-14 mb-1">Weekly</h6>
                                <p class="font-16 mb-0">$1400</p>
                            </div>
                            <div class="col text-center mb-15">
                                <h6 class="font-14 mb-1">Monthly</h6>
                                <p class="font-16 mb-0">$5000</p>
                            </div>
                        </div>
                        <div class="progress h-6 mt-15 mb-10">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-4">
            <div class="card mb-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h6 class="card-title mb-0">Purpose Website</h6>
                        </div>
                        <div class="col-2 text-right">
                            <div class="actions">
                                <div class="dropdown" data-toggle="dropdown" aria-expanded="false">
                                    <a href="#" class="action-item"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(29px, 32px, 0px);">
                                        <a href="#" class="dropdown-item">Refresh</a>
                                        <a href="#" class="dropdown-item">Manage Widgets</a>
                                        <a href="#" class="dropdown-item">Settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="p-3 border border-dashed">
                        <span class="text-dark font-weight-bold font-16">Invoice #10045</span>
                        <p class="mb-0">Et consequuntur sequi placeat.</p>
                        <div class="row align-items-center mt-30">
                            <div class="col-6">
                                <h6 class="mb-0 font-18">$2500</h6>
                                <span class="text-sm text-muted">Amount</span>
                            </div>
                            <div class="col-6">
                                <h6 class="mb-0 font-18">20 Apr</h6>
                                <span class="text-sm text-muted">Due Date</span>
                            </div>
                        </div>
                    </div>
                    <div class="media mt-15 align-items-center">
                        <img alt="Image" src="img/shop-img/18.jpg" class="avatar  rounded-circle avatar-sm">
                        <div class="media-body pl-3">
                            <div class="text-sm my-0">Marta Stweart <a href="#" class="text-primary font-weight-600">@dribbble</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-4">
            <div class="card mb-30">
                <div class="card-body">
                    <h6 class="card-title">Sell Coin</h6>
                    <form action="#">
                        <div class="input-group mb-20">
                            <div class="input-group-prepend">
                                <button class="btn bg-light btn-sm input-group-text" type="button">Amount</button>
                            </div>
                            <input type="number" name="quant[1]" class="form-control" placeholder="859">
                            <div class="input-group-append">
                                <button class="btn bg-light btn-sm input-group-text pdn-x-25" type="button">BTC</button>
                            </div>
                        </div>
                        <div class="input-group mb-20">
                            <div class="input-group-prepend">
                                <button class="btn bg-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Price
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Last Trade Price</a>
                                    <a class="dropdown-item" href="#">Last Buy Price</a>
                                    <a class="dropdown-item" href="#">Last Sell Price</a>

                                </div>
                            </div>
                            <input type="number" name="quant[1]" class="form-control" placeholder="$589.00">
                            <div class="input-group-append">
                                <button class="btn bg-light btn-sm input-group-text" type="button">$ Dollar</button>
                            </div>
                        </div>
                        <div class="input-group mb-20">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button">Total</button>
                            </div>
                            <input type="number" name="quant[1]" class="form-control" placeholder="895">
                            <div class="input-group-append">
                                <button class="btn bg-light btn-sm input-group-text" type="button">$ Dollar</button>
                            </div>
                        </div>

                        <button class="btn btn-danger btn-sm">Sell Coin</button>
                    </form>
                </div>
            </div>
            <!-- ./card -->
        </div>

        <div class="col-12">
            <div class="card mb-30">
                <div class="card-body pb-0">
                    <h6 class="card-title">Transaction History</h6>
                    <div class="table-responsive table-borered">
                        <table class="table table-analytics">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Tran ID</th>
                                    <th>Acc%</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.27.2019</td>
                                    <td>02:22 PM</td>
                                    <td><span class="badge badge-soft-danger">Paused</span></td>
                                    <td>DFRASEDE</td>
                                    <td>
                                        3.9%
                                        <div class="progress mt-2 h-6">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </td>
                                    <td>$2.39</td>
                                </tr>
                                <tr>
                                    <td>2.11.2019</td>
                                    <td>12:46 AM</td>
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td>N89528GU</td>
                                    <td>
                                        6.83%
                                        <div class="progress mt-2 h-6">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 32%;" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </td>
                                    <td>$8.15</td>
                                </tr>
                                <tr>
                                    <td>3.12.2019</td>
                                    <td>05:02 AM</td>
                                    <td><span class="badge badge-soft-danger">Paused</span></td>
                                    <td>5FUA8ADN</td>
                                    <td>
                                        8.15%
                                        <div class="progress mt-2 h-6">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 26%;" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </td>
                                    <td>$6.83</td>
                                </tr>
                                <tr>
                                    <td>4.5.2019</td>
                                    <td>07:22 PM</td>
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td>N5Q559S5</td>
                                    <td>
                                        3.06%
                                        <div class="progress mt-2 h-6">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 67%;" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </td>
                                    <td>$7.15</td>
                                </tr>
                                <tr>
                                    <td>4.22.2019</td>
                                    <td>10:56 AM</td>
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td>88SFGDUD</td>
                                    <td>
                                        6.25%
                                        <div class="progress mt-2 h-6">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 63%;" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </td>
                                    <td>$6.63</td>
                                </tr>

                                <tr>
                                    <td>6.28.2019</td>
                                    <td>12:30 PM</td>
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td>D5DDNA2D</td>
                                    <td>
                                        5.14%
                                        <div class="progress mt-2 h-6">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 96%;" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </td>
                                    <td>$7.06</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ./card -->
        </div>
    </div>
</div>
                @endsection

@section('script')
<!-- These plugins only need for the run this page -->
<script type="text/javascript" src="{{ asset('js/default-assets/ammap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/radar.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/widget-page-chart-active.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/apexchart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/dashboard-active.js') }}"></script>
@endsection
