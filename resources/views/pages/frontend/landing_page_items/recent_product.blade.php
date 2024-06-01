<script type="text/javascript">
    window['loaded_recent_product_ids_{{ $id }}'] = @json($products->pluck('id')->toArray());
</script>
<!-- =========================
    Recent-Product Section
============================== -->
<section id="recent-product-{{ $id }}" class="recent-product-wrapper recent-pro-2">
    <div class="container-fluid custom-width">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="recent-product-title">Most Recent Products</h2>
                <div class="d-md-flex justify-content-between m-2">
                    <div>
                        <button type="button" onclick="filterProductModal({{ $id }})" class="btn btn-info float-right m-3"><i class="fa fa-sort"></i> Filter</button>
                    </div>
                    <div>
                        <input type="search" placeholder="search product by name" class='form-control' id="recent-product-search-input-{{ $id }}">
                    </div>
                </div>
            </div>
            <div class="w-100 row" id="product-display-{{ $id }}">
                @include('include.frontend.recent_product_items', ['products' => $products, 'id' => $id])
            </div>
            <div id='load-more-{{ $id }}' class="col-12 text-center">
                <button class="btn btn-info" onclick="more_product({{ $id }})"><i class="fa fa-refresh" aria-hidden="true"></i> Load More..</button>
            </div>
        </div>
    </div>
</section>

<!-- =========================
    Add Modal
============================== -->
<div class="modal fade recent-product-filter-modal-xl" id="recent-product-filter-modal-{{ $id }}" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product filter here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="review-form" action="javascript:void(0)">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="category">Select Category :</label>
                                <select class="form-control select22" name="category_id" id="category-{{$id}}" onchange="load_subcategories({{$id}})" aria-label=".form-select-lg example">
                                    <option value="" selected>--Select--</option>
                                    @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sub_category">Select Sub-category :</label>
                                <select class="form-control select22" name="subcategory_id" id="sub_category-{{$id}}" onchange="load_brands({{$id}})" aria-label=".form-select-lg example">
                                    <option value="" selected>--Select--</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="brand">Select Brand :</label>
                                <select class="form-control select22" name="brand_id" id="brand-{{$id}}" aria-label=".form-select-lg example">
                                    <option value="" selected>--Select--</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="rating-area">
                                    <div class="d-flex justify-content-between">
                                        <p>Minimum rating :</p>
                                        <div class="rating">
                                            <a href="#"><i class="fa fa-star cat-1" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star cat-2" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star cat-3" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star cat-4" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star cat-5" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="avg-rating-range-{{$id}} mt-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button"  class="btn btn-primary" onclick="filter_product({{ $id }})">Search</button>
            </div>
        </div>
    </div>
</div>
<!-- =========================
    Offer time Section
============================== -->
<script type="text/javascript">
    // Set a debounce time of 500ms
    window['debounceTime_{{ $id }}'] = 500;

    // Define a variable to hold the timer
    window['searchTimer_{{ $id }}'] = null;

    //Filter modal open here
    function filterProductModal(id) {
        $(`#recent-product-filter-modal-${id}`).modal('show');
    }

    function filter_product(id) {
        let category_id = $(`#category-${id}`).val();
        let subcategory_id = $(`#sub_category-${id}`).val();
        let brand_id = $(`#brand-${id}`).val();
        let rating_percent = parseInt(document.querySelector(`.avg-rating-range-${id} span`).style.left);
        let min_rating = rating_percent ? rating_percent/20 : 0;

        $.ajax({
            url: '{{ route('recent-product.filter') }}',
            type: 'GET',
            data: {
             category_id,
             subcategory_id,
             brand_id,
             item : id,
             min_rating
             },
            success: function(response) {
                window[`loaded_recent_product_ids_${ id }`] = [];
                $(`#recent-product-filter-modal-${id}`).modal('hide');
                $(`#load-more-${ id }`).addClass('d-none');
                $(`#product-display-${ id }`).html(response);
                $(`#load-more-${ id }`).hide();
             }
         });
     }

    function more_product(id) {
        event.preventDefault();

        $.ajax({
            url: `{{ route('recent-product.load-more') }}?item=${id}&else=${window['loaded_recent_product_ids_{{ $id }}'].join(',')}`,
            success: function(data) {
                $(`#product-display-${ id }`).append(data);
            }
        });
    }

    window.categories = @json($categories);
    // load_subcategories();

    function load_subcategories(id) {
        let category_id = document.querySelector(`#category-${id}`).value;

        try {
            let sub_categories = window.categories.find(category => category.id == category_id).sub_categories;
            let html = `<option value="" selected>--Select--</option>`;
            sub_categories.forEach((sub_category) => {
                html += `<option value='${sub_category.id}'>${sub_category.name}</option>`
            });
            document.querySelector(`#sub_category-${id}`).innerHTML = html;
        } catch (e) {
            $(`#sub_category-${id}`).html('');
            return;
        }
        load_brands(id);
    }

    function load_brands(id) {
        let category_id = document.querySelector(`#category-${id}`).value;
        let subcategory_id = document.querySelector(`#sub_category-${id}`).value;

        try {
            let brands = window.categories.find(category => category.id == category_id)
                .sub_categories
                .find(subcategory => subcategory.id == subcategory_id)
                .brands;
            let html = `<option value="" selected>--Select--</option>`;

            brands.forEach((brand) => {
                    html += `<option value='${brand.id}'>${brand.name}</option>`
                });
            document.querySelector(`#brand-${id}`).innerHTML = html;
        } catch (e) {
            $(`#brand-${id}`).html('');
            return;
        }
    }
    document.addEventListener("DOMContentLoaded", function() {
        // Rating slider js here
        $('.avg-rating-range-{{$id}}').slider({
            value: 0,
            min: 0,
            max: 5,
            step: 1,
            slide: function (event, ui) {
                $('#slider-value').html(ui.value);
                if (ui.value == 1) {
                    $('.cat-1').addClass('active-color');
                } else {
                    $('.cat-1').removeClass('active-color');
                }
                if (ui.value == 2) {
                    $('.cat-1').addClass('active-color');
                    $('.cat-2').addClass('active-color');
                } else {
                    $('.cat-2').removeClass('active-color');
                }
                if (ui.value == 3) {
                    $('.cat-1').addClass('active-color');
                    $('.cat-2').addClass('active-color');
                    $('cat-3').addClass('active-color');
                } else {
                    $('.cat-3').removeClass('active-color');
                }
                if (ui.value == 4) {
                    $('.cat-1').addClass('active-color');
                    $('.cat-2').addClass('active-color');
                    $('.cat-3').addClass('active-color');
                    $('.cat-4').addClass('active-color');
                } else {
                    $('.cat-4').removeClass('active-color');
                }
                if (ui.value == 5) {
                    $('.cat-1').addClass('active-color');
                    $('.cat-2').addClass('active-color');
                    $('.cat-3').addClass('active-color');
                    $('.cat-4').addClass('active-color');
                    $('.cat-5').addClass('active-color');
                } else {
                    $('.cat-5').removeClass('active-color');
                }
            }
        });

        $('#recent-product-search-input-{{ $id }}').keyup( function() {
            // Clear any existing timer
            clearTimeout(window['searchTimer_{{ $id }}']);

            // Set a new timer with the debounce time
            window['searchTimer_{{ $id }}'] = setTimeout(() => {
                let name = $(this).val();
                $('#recent-product-{{ $id }} .recent-product-item').filter((i, productDiv) => {
                    $(productDiv).hide();
                    return $(productDiv)
                        .find('.recente-product-content')
                        .data('name')
                        .trim()
                        .search(name) !== -1;
                })
                .each((i, productDiv) => {
                    $(productDiv).show();
                });
            }, window['debounceTime_{{ $id }}']);
        });
    });
</script>
