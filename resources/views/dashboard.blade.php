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
                    <h3 class="page-title"> الرئيسية
                        <small></small>
                    </h3>
                    <div class="page-bar">
                        @include('common.breadcrumb', ['section' => false, 'route' => false, 'page' => false])
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                       <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">مصاريف الخدمات</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue-ebonyclay icon-wallet"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">ريال</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="15650">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">مصاريف المشاريع</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple-studio icon-credit-card"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">ريال</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="15650">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">إجمالى المبالغ</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-bulb"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">ريال</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="15650">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">الإيرادات المستلمة</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green icon-present"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">ريال</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="15650">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">إجمالى المبالغ المتبقية</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue-dark icon-notebook"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">ريال</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="15650">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">صافى الربح</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon icon-calculator bg-green-seagreen"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">ريال</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="15650">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">عدد المشاريع</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon icon-layers bg-blue-madison"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">مشاريع</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="10">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">عدد الخدمات</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-yellow icon-magic-wand"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">خدمات</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="10">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">إجمالى عدد الدفعات</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green icon-basket-loaded"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">دفعات</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="15">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">إجمالى عدد الدفعات المستلمة</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple-plum icon-briefcase"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">دفعات</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="14">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">إجمالى عدد الدفعات المتبقية</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red-haze icon-handbag"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">دفعات</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">المشاريع الناجحة</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green-meadow icon-dislike"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">مشاريع</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">المشاريع الخاسرة</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red icon-like"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">مشاريع</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="10">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">المشاريع المتعادلة</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon icon-anchor bg-grey-mint"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">مشاريع</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">عدد حسابات المؤسسة</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon icon-credit-card bg-purple-medium"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">حسابات</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="2">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">إجمالى رصيد الحسابات</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon icon-calculator bg-blue-steel"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">ريال</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="252">0</span>
                                    </div>
                                <a class="more" href="javascript:;"> التفاصيل
                                    <i class="m-icon-swapleft m-icon-white"></i>
                                </a>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
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