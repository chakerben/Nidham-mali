<div class="page-header-inner ">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/layouts/layout/img/logo-default.png') }}" alt="logo" class="logo-default" /> </a>
        <div class="menu-toggler sidebar-toggler">
        </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN PAGE TOP -->
    <div class="page-top text-center">
       
       <div class="form-group inline-block" >
            <label class="control-label pull-left mid-lbl" style="">بحث بالتاريخ </label>
            <div class="pull-left">
                <div class="input-group input-large date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
                    <input type="text" class="form-control date" name="from" placeholder="من تاريخ">
                    <span class="input-group-addon small-sp">  </span>
                    <input type="text" class="form-control date" name="to" placeholder="إلى تاريخ"> </div>
                <!-- /input-group
                <span class="help-block"> Select date range </span> -->
            </div>
        </div>
       
        <!-- BEGIN HEADER SEARCH BOX -->
        <form class="search-form search-form-expanded" action="#" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="بـحـث..." name="query">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
        <!-- END HEADER SEARCH BOX -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{ asset('assets/layouts/layout/img/avatar3_small.jpg') }}" />
                        <span class="username username-hide-on-mobile"> اسم المستخدم </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="#">
                                <i class="icon-user"></i> الصفحة الشخصية </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-settings"></i> اعدادات الحساب </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-rocket"></i> المهام
                                <span class="badge badge-success"> 7 </span>
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="#">
                                <i class="icon-lock"></i> شاشة الغلق </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-key"></i> تسجيل خروج </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END PAGE TOP -->
</div>