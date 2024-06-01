<!-- Sidemenu Area -->
<div class="ecaps-sidemenu-area">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="{{ url('/dashboard') }}"><img class="desktop-logo" src="{{ asset('img/core-img/logo.png') }}" alt="Desktop Logo"> <img class="small-logo" src="{{ asset('img/core-img/small-logo.png') }}" alt="Mobile Logo"></a>
    </div>

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="active"><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home"></i> <span>Dashboard</span></a></li>
                    @if(can('Manage Role'))
                    <li class="treeview {{ request_has('/role') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-shield-check"></i> <span>Authorization</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/role') ? 'display:block;' : '' }}">
                            @if(can('Create Role'))
                            <li><a style="{{ request_is('backend.role.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.role.create') }}">- Add Role</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.role.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.role.index') }}">- Roles</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage User'))
                    <li class="treeview {{ request_has('/user') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-account"></i> <span>Users</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/user') ? 'display:block;' : '' }}">
                            @if(can('Create User'))
                            <li><a style="{{ request_is('backend.user.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.user.create') }}">- Add User</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.user.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.user.index') }}">- Users</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Contact-Us'))
                    <li class="treeview {{ request_has('/contact-us') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class=" zmdi zmdi-phone-msg"></i> <span>Contact us</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/contact-us') ? 'display:block;' : '' }}">
                            <li><a style="{{ request_is('backend.contact-us.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.contact-us.create') }}">- Contact Info</a></li>
                            <li><a style="{{ request_is('backend.contact-us.messageList') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.contact-us.messageList') }}">- Message List</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Slider'))
                    <li class="treeview {{ request_has('/slider') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class=" zmdi zmdi-collection-plus"></i> <span>Slider</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/slider') ? 'display:block;' : '' }}">
                            @if(can('Create Slider'))
                            <li><a style="{{ request_is('backend.slider.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.slider.create') }}">- Add Slider</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.slider.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.slider.index') }}">- Sliders</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Ads'))
                    <li class="treeview {{ request_has('/ads') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class=" zmdi zmdi-collection-item"></i> <span>Advertise</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/ads') ? 'display:block;' : '' }}">
                            @if(can('Create Ads'))
                            <li><a style="{{ request_is('backend.ads.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.ads.create') }}">- Add Advertise</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.ads.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.ads.index') }}">- Advertises</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Landing-Page-Item'))
                    <li><a href="{{ route('backend.landing-page-item.index') }}"><i class="zmdi zmdi-view-compact"></i> <span>Landing page items</span></a></li>
                    @endif
                    @if(can('Manage Category'))
                    <li class="treeview {{ request_has('/category') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class=" zmdi zmdi-markunread-mailbox"></i> <span>Category</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/category') ? 'display:block;' : '' }}">
                            @if(can('Create Category'))
                            <li><a style="{{ request_is('backend.category.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.category.create') }}">- Add Category</a></li>
                            @endif
                            @if(can('Approve Category'))
                            <li><a style="{{ request_is('backend.category.pending') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.category.pending') }}">- Pending Category</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.category.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.category.index') }}">- Categories</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Sub-Category'))
                    <li class="treeview {{ request_has('/sub-category') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class=" zmdi zmdi-label"></i> <span>Sub-category</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/sub-category') ? 'display:block;' : '' }}">
                            @if(can('Create Sub-Category'))
                            <li><a style="{{ request_is('backend.sub-category.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.sub-category.create') }}">- Add Sub-category</a></li>
                            @endif
                            @if(can('Approve Sub-Category'))
                            <li><a style="{{ request_is('backend.sub-category.pending') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.sub-category.pending') }}">- Pending Sub-category</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.sub-category.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.sub-category.index') }}">- Sub-categories</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Brand'))
                    <li class="treeview {{ request_has('/brand') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class=" zmdi zmdi-ticket-star"></i> <span>Brand</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/brand') ? 'display:block;' : '' }}">
                            @if(can('Create Brand'))
                            <li><a style="{{ request_is('backend.brand.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.brand.create') }}">- Add Brand</a></li>
                            @endif
                            @if(can('Approve Brand'))
                            <li><a style="{{ request_is('backend.brand.pending') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.brand.pending') }}">- Pending Brands</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.brand.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.brand.index') }}">- Brands</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Product'))
                    <li class="treeview {{ request_has('/product') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class=" zmdi zmdi-card-giftcard"></i> <span>Product</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/product') ? 'display:block;' : '' }}">
                            @if(can('Create Product'))
                            <li><a style="{{ request_is('backend.product.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.product.create') }}">- Add Product</a></li>
                            @endif
                            @if(can('Approve Product'))
                            <li><a style="{{ request_is('backend.product.pending') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.product.pending') }}">- Pending Products</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.product.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.product.index') }}">- Products</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Review'))
                    <li class="treeview {{ request_has('/review') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class=" zmdi zmdi-folder-star-alt"></i> <span>Reviews</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/review') ? 'display:block;' : '' }}">
                            @if(can('Create Review'))
                            <li><a style="{{ request_is('backend.review.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.review.create') }}">- Add Review</a></li>
                            @endif
                            @if(can('Approve Review'))
                            <li><a style="{{ request_is('backend.review.pending') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.review.pending') }}">- Pending Reviews</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.review.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.review.index') }}">- Reviews</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage Blog'))
                    <li class="treeview {{ request_has('/blog') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-blogger"></i> <span>Blogs</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu" style="{{ request_has('/blog') ? 'display:block;' : '' }}">
                            @if(can('Create Blog'))
                            <li><a style="{{ request_is('backend.blog.create') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.blog.create') }}">- Add Blog</a></li>
                            @endif
                            <li><a style="{{ request_is('backend.blog.index') ? 'color:#6e00ff;' : '' }}" href="{{ route('backend.blog.index') }}">- Blogs</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(can('Manage General-Settings'))
                    <li><a href="{{ route('backend.general-settings.create') }}"><i class="zmdi zmdi-wrench"></i> <span>General settings</span></a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
