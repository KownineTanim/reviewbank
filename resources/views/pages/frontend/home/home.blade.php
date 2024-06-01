@extends('layout.frontend')
@section('title','Home')
@section('content')
    <!-- =========================
        Header Top Section
    ==============================  -->


    <!-- =========================
        Header Section
    ============================== -->
    @include('include.frontend.home-wd-header')

    <!-- =========================
        Header Section
    ============================== -->
    @include('include.frontend.home-wd-header-2')

    @foreach($pageItems as $item)
        @if(!empty($item->ad))
            @php
                $advertiseData = json_decode($item->ad->data);
            @endphp
            @include('pages.frontend.ads.template.'.$item->ad->template, ['advertiseData' => $advertiseData, 'id' => $item->id])
        @else
            @include('pages.frontend.landing_page_items.'.$item->type, ['id' => $item->id])
        @endif
    @endforeach

    <!-- =========================
        Service Section
    ============================== -->
    @include('include.frontend.service')
    <!-- =========================
        Blog Section
    ============================== -->
    <!-- @include('include.frontend.wd-news') -->

    <!-- =========================
        Call To Action Section
    ============================== -->


    <!-- =========================
       Partner Section
    ============================== -->


    <!-- =========================
        Footer Section
    ============================== -->
    @include('include.frontend.home-footer')
    <!-- =========================
        CopyRight
    ============================== -->
    @include('include.frontend.home-copyright')
@endsection
@section('script')
<script>
    // Set a debounce time of 500ms
    window.debounceTime = 500;

    // Define a variable to hold the timer
    window.searchTimer = null;
    //Product search here by name
    $(".category-list").click(function(){
        window.category_id = $(this).data('id');
        var category_name = $(this).html();
        $("#category-name").html(category_name);
    });

    $(document).on("click", function(event) {
        if (!$(event.target).closest("#search-wrapper").length) {
            $('#search-wrapper').addClass('d-none');
        }
    });

    $('.search-tag').keyup( function() {
        // Clear any existing timer
        clearTimeout(window.searchTimer);

        // Set a new timer with the debounce time
        window.searchTimer = setTimeout(() => {
            // Make the Ajax request here
            var category_id = window.category_id;
            var search = $(this).val();

            $.ajax({
                url: '{{ route('product.search') }}',
                type: 'GET',
                data: {
                    category_id,
                    search,
                  },
                success: function(response) {
                     if (response.status == 'success') {
                         let products = response.products;
                         console.log(products);
                         $('#search-wrapper').removeClass('d-none');
                         let html = '';

                         if (!products.length) {
                             html = `
                                <li class='text-center text-info'>No Product Found!</li>
                             `;
                             $('#search-wrapper').css('height', '50px');
                         } else {
                             if (products.length < 6) {
                                 let height = products.length * 70;
                                 $('#search-wrapper').css('height', `${height}px`);
                             } else {
                                 $('#search-wrapper').css('height', '346px');
                             }
                         }
                         products.forEach(product => {
                             html += `
                            <li tabindex="-1">
                                <span><img style="height:65px;width:65px;padding:5px;" src="/storage/${product.thumbnail}" alt=""></span>
                                <a style="position:absolute;left:80px;padding:5px;" href='${ "{{ route('product.view', ':token') }}".replace(':token', product.token) }'>
                                    ${product.name.slice(0, 50)}...
                                    <span style="position:absolute;left:5px;top:30px;">${product.category.name}</span>
                                </a>
                            </li>
                             `;
                         });
                         $('#search-result').html(html);
                         $('.search-result').html(html);
                     } else {
                         $('#search-wrapper').addClass('d-none');
                         alert('error');
                     }
                 }
             });
        }, window.debounceTime);
    });
</script>
@endsection
