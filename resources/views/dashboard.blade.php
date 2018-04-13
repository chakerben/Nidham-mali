<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        @include('common.head')
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            @include('common.pageHeader')
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                @include('common.sidebar')
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title"> الرئيسية<small></small></h3>
                    <div class="page-bar">
                        @include('common.breadcrumb', ['section' => false, 'route' => false, 'page' => false])
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        @isset($dashboard)
                            @foreach($dashboard as $item)
                                <div class="col-md-3">
                                    <!-- BEGIN WIDGET THUMB -->
                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                        <h4 class="widget-thumb-heading">{{ $item["name"] }}</h4>
                                        <div class="widget-thumb-wrap">
                                            <i class="widget-thumb-icon {{ $item["color"] }} {{ $item["icone"] }}"></i>
                                            <div class="widget-thumb-body">
                                                <span class="widget-thumb-subtitle">{{ $item["unit"] }}</span>
                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $item["value"] }}">0</span>
                                            </div>
                                            <a class="more" href="javascript:;"> التفاصيل
                                                <i class="m-icon-swapleft m-icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- END WIDGET THUMB -->
                                </div>
                            @endforeach
                        @endisset
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
            @include('common.footer')
        <!-- END FOOTER -->

        @include('common.scripts')
        
        <script>
            //Date Pickers
            $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                language: "ar"
            });
		</script>
    </body>
</html>