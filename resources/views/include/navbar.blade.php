            <!-- Top Header Area -->
            <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo mr-3 mr-sm-4">
                        <a href="index.html"><img src="/img/core-img/small-logo.png" alt="Mobile Logo"></a>
                    </div>

                    <!-- Triggers -->
                    <div class="ecaps-triggers mr-1 mr-sm-3">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>

                    <div class="mr-3 mr-sm-4">
                        <a class="btn btn-sm btn-outline-primary" href="{{ url('/') }}" target="_blank"><i class="zmdi zmdi-globe profile-icon" aria-hidden="true"></i> Visit Website</a>
                    </div>
                    <div class="mr-3 mr-sm-4">
                        <a class="btn btn-sm btn-outline-primary" style="{{ request_is('backend.home') ? 'display:none;' : 'display:block;' }}" href="{{ url('/dashboard') }}"><i class="zmdi zmdi-home profile-icon" aria-hidden="true"></i>Jump to Dashboard</a>
                    </div>
                </div>

                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class="fa fa-reorder"></i>
                    </div>

                    <!-- Top Bar Nav -->
                    <ul class="right-side-content d-flex align-items-center">
                        <!-- Left Side Nav -->
                        <li class="hide-phone app-search">
                            <form role="search" class=""><input type="text" placeholder="Search..." class="form-control"> <button type="submit" class="mr-0"><i class="fa fa-search"></i></button></form>
                        </li>

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- Top Message Area -->
                                <div class="top-message-area">
                                    <!-- Heading -->
                                    <div class="top-message-heading">
                                        <div class="heading-title">
                                            <h6>Messages</h6>
                                        </div>
                                        <span>01 New</span>
                                    </div>
                                    <div class="message-box" id="messageBox">
                                        <span class="message-heading">Hot Messages</span>
                                        <a href="#" class="dropdown-item">
                                            <img src="/img/member-img/5.png" alt="">
                                            <span class="message-text">
                                                <span>New comment: ecaps Template</span>
                                                <span>2 days ago</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="active-status"></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- Top Notifications Area -->
                                <div class="top-notifications-area">
                                    <!-- Heading -->
                                    <div class="notifications-heading">
                                        <div class="heading-title">
                                            <h6>Notifications</h6>
                                        </div>
                                    </div>

                                    <div class="notifications-box" id="notificationsBox">
                                        <a href="#" class="dropdown-item">
                                            <img src="/img/member-img/5.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ authProfilePhoto() }}" alt=""></button>
                            <div class="dropdown-menu header-profile dropdown-menu-right">
                                <!-- User Profile Area -->
                                <div class="user-profile-area">
                                    <a href="{{ url('/') }}" target="_blank" class="dropdown-item"><i class="zmdi zmdi-home profile-icon" aria-hidden="true"></i>Go website</a>
                                    <a href="{{ route('my.profile') }}" target="_blank" class="dropdown-item"><i class="zmdi zmdi-account profile-icon" aria-hidden="true"></i> My profile</a>
                                    <a href="{{ route('backend.contact-us.messageList') }}" class="dropdown-item"><i class="zmdi zmdi-email-open profile-icon" aria-hidden="true"></i> Messages</a>
                                    <a href="{{ route('backend.general-settings.create') }}" class="dropdown-item"><i class="zmdi zmdi-brightness-7 profile-icon" aria-hidden="true"></i> General settings</a>
                                    <a href="{{ route('logout') }}" class="dropdown-item"><i class="ti-unlink profile-icon" aria-hidden="true"></i> Sign-out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
