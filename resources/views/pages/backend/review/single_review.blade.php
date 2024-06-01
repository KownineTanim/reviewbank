@extends('layout.backend')
@section('title','View review')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title mb-4 text-center">Single Review of Product</h4>
                  <div class="row">
                      <div class="col-12 col-md-4">
                          <div class="card mb-30">
                              <h6 class="text-center mb-4">Product details</h6>
                              <img src="{{ img($review->product->thumbnail) }}" class="profile-cover-img" alt="thumb">
                              <div class="card-body text-center">
                                  <h6 class="font-20 mb-1">{{ $review->product->name }}</h6>
                                  <p class="font-13 text-dark">Brand: {{ $review->product->brand->name }}</p>
                                  <p class="description px-4">{!! $review->product->description !!}</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-12 col-md-8">
                          <div class="profile-crm-area">
                              <div class="card mb-30">
                                  <div class="card-body">
                                      <h6 class="text-center mb-4">Review details</h6>
                                      <div class="row profile-row">
                                          <div class="col-xs-5 col-sm-3">
                                              <span class="profile-cat">Description</span>
                                          </div>
                                          <div class="col-xl-7 col-sm-9">
                                              <span class="profile-info">{!! $review->description !!}</span>
                                          </div>
                                      </div>
                                      <div class="row profile-row">
                                          <div class="col-xs-5 col-sm-3">
                                              <span class="profile-cat">Status</span>
                                          </div>
                                          <div class="col-xl-7 col-sm-9">
                                              <span class="profile-info badge bg-{{ $review->status == 'active' ? 'success' : 'warning' }}" style="color:white;">{{ ucfirst($review->status) }}</span>
                                          </div>
                                      </div>
                                      <div class="row profile-row">
                                          <div class="col-xs-5 col-sm-3">
                                              <span class="profile-cat">Posted by</span>
                                          </div>
                                          <div class="col-xl-7 col-sm-9">
                                              <span class="profile-info ">{{ $review->postedBy->email }}</span>
                                          </div>
                                      </div>

                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-xl-12 height-card box-margin">
                                      <div class="card">
                                          <div class="card-body">
                                              <div class="bg-transparent d-flex align-items-center justify-content-between">
                                                  <div class="widgets-card-title">
                                                      <h5 class="card-title">Recent files</h5>
                                                  </div>
                                                  <div class="dashboard-dropdown">
                                                      <div class="dropdown">
                                                          <button class="btn dropdown-toggle" type="button" id="dashboardDropdown50" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown50">
                                                              <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i> Edit</a>
                                                              <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                                              <a class="dropdown-item" href="#"><i class="ti-eraser"></i> Remove</a>
                                                              <a class="dropdown-item" href="#"><i class="ti-trash"></i> Delete</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- Single Download File -->
                                              <div class="widget-download-file d-flex align-items-center justify-content-between mb-4">
                                                  <div class="d-flex align-items-center mr-3">
                                                      <div class="download-file-icon mr-3">
                                                          <img src="img/filemanager-img/1.png" alt="">
                                                      </div>
                                                      <div class="user-text-table">
                                                          <h6 class="d-inline-block font-15 mb-0">Documentation</h6>
                                                          <p class="mb-0">Lorem ipsum</p>
                                                      </div>
                                                  </div>
                                                  <a href="#" class="download-link badge badge-primary badge-pill">Download</a>
                                              </div>

                                              <!-- Single Download File -->
                                              <div class="widget-download-file d-flex align-items-center justify-content-between mb-4">
                                                  <div class="d-flex align-items-center mr-3">
                                                      <div class="download-file-icon mr-3">
                                                          <img src="img/filemanager-img/5.png" alt="">
                                                      </div>
                                                      <div class="user-text-table">
                                                          <h6 class="d-inline-block font-15 mb-0">Bandwidth</h6>
                                                          <p class="mb-0">Lorem ipsum</p>
                                                      </div>
                                                  </div>
                                                  <a href="#" class="download-link badge badge-info badge-pill">Download</a>
                                              </div>

                                              <!-- Single Download File -->
                                              <div class="widget-download-file d-flex align-items-center justify-content-between mb-4">
                                                  <div class="d-flex align-items-center mr-3">
                                                      <div class="download-file-icon mr-3">
                                                          <img src="img/filemanager-img/6.png" alt="">
                                                      </div>
                                                      <div class="user-text-table">
                                                          <h6 class="d-inline-block font-15 mb-0">Projects</h6>
                                                          <p class="mb-0">Lorem ipsum</p>
                                                      </div>
                                                  </div>
                                                  <a href="#" class="download-link badge badge-success badge-pill">Download</a>
                                              </div>

                                              <!-- Single Download File -->
                                              <div class="widget-download-file d-flex align-items-center justify-content-between">
                                                  <div class="d-flex align-items-center mr-3">
                                                      <div class="download-file-icon mr-3">
                                                          <img src="img/filemanager-img/7.png" alt="">
                                                      </div>
                                                      <div class="user-text-table">
                                                          <h6 class="d-inline-block font-15 mb-0">Download</h6>
                                                          <p class="mb-0">Lorem ipsum</p>
                                                      </div>
                                                  </div>
                                                  <a href="#" class="download-link badge badge-primary badge-pill">Download</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="basic-table-area col-lg-10 offset-lg-1">
                      <!--Basic Table-->
                      <div class="table-responsive">
                          <h6 class="text-center mb-4">Categories rating:</h6>
                          <table class="table table-bordered">
                              <thead class="text-uppercase">
                                  <tr>
                                      <th>Raing Type </th>
                                      <th>Rating</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  <tr>
                                      <td class="align-middle">Price</td>
                                      <td class="align-middle">
                                          {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->price_rating)) !!}
                                          {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->price_rating)) !!}
                                      </td>
                                  </tr>

                                  <tr>
                                      <td class="align-middle">Quality</td>
                                      <td class="align-middle">
                                          {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->quality_rating)) !!}
                                          {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->quality_rating)) !!}
                                      </td>
                                  </tr>

                                  <tr>
                                      <td class="align-middle">Design</td>
                                      <td class="align-middle">
                                          {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->design_rating)) !!}
                                          {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->design_rating)) !!}
                                      </td>
                                  </tr>

                                  <tr>
                                      <td class="align-middle">Durability</td>
                                      <td class="align-middle">
                                          {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->durability_rating)) !!}
                                          {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->durability_rating)) !!}
                                      </td>
                                  </tr>

                                  <tr>
                                      <td class="align-middle">service</td>
                                      <td class="align-middle">
                                          {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->service_rating)) !!}
                                          {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->service_rating)) !!}
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="align-middle">Average</td>
                                      <td class="align-middle">
                                          {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval(round(($review->price_rating + $review->quality_rating + $review->design_rating + $review->durability_rating + $review->service_rating)/5))) !!}
                                          {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval(round(($review->price_rating + $review->quality_rating + $review->design_rating + $review->durability_rating + $review->service_rating)/5))) !!}
                                      </td>
                                      </td>
                                  </tr>

                              </tbody>
                          </table>
                      </div>
                      <!--End Basic Table-->
                  </div>

              </div> <!-- end card body-->
          </div>

        </div>
    </div>
</div>
@endsection

@section('script')
  <!-- These plugins only need for the run this page -->
  <script type="text/javascript" src="{{ asset('js/default-assets/jquery.datatables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatables.bootstrap4.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatable-responsive.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/responsive.bootstrap4.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatable-button.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/button.bootstrap4.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/button.html5.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/button.flash.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/button.print.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatables.keytable.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatables.select.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/demo.datatable-init.js') }}"></script>
  <script type="text/javascript">


  </script>
@endsection
