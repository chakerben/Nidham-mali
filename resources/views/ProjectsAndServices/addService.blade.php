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
            @include('common.pageHeader');
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
                @include('common.sidebar');
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title"> المشاريع والخدمات
                        <small></small>
                    </h3>
                    <div class="page-bar">
                        @include('common.breadcrumb', ['section' => 'المشاريع والخدمات', 'route' => 'allProjectsAndServices', 'page' => 'إضافة خدمة'])
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-layers font-dark"></i>
                                        <span class="caption-subject bold uppercase">إضافة خدمة</span>
                                    </div>
                                    
                                    <!-- <button type="button" class="btn green pull-right"><i class="icon-check"></i> إستلام الخدمة </button> -->
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    
                                    @empty($service) <form action="{{route('services.store', [], true)}}" method="POST"> @endempty
                                    @isset($service)
                                        <form action="{{route('services.update', $service->id, true)}}" method="POST"> 
                                        @method('PUT')
                                    @endisset
                                        @csrf
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label>اسم الخدمة <span>*</span></label>
                                                <div class="input-icon">
                                                    <i class="fa fa-file font-green "></i>
                                                    <input type="text" class="form-control" name="name" id="name" @isset($service->name) value="{{ $service->name }}" @endisset placeholder="اسم الخدمة"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label>التاريخ <span>*</span></label>
                                                <div class="input-group date-picker input-daterange" data-date="24-02-2018" data-date-format="dd-mm-yyyy">
                                                    <input type="text" class="form-control date col-md-6" name="begin_at" id="begin_at" @isset($service->begin_at) value="{{ $service->begin_at }}" @endisset placeholder="من تاريخ">
                                                    <span class="input-group-addon small-sp">  </span>
                                                    <input type="text" class="form-control date col-md-6" name="end_at" id="end_at" @isset($service->end_at) value="{{ $service->end_at }}" @endisset placeholder="إلى تاريخ"> 
                                                </div>
                                            </div>
                                        </div>
                                                                            
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label>التكلفة الاجمالية </label>
                                                <div class="input-icon">
                                                    <i class="fa fa-money font-green "></i>
                                                    <input type="text" class="form-control" name="cost" id="cost" @isset($service->cost) value="{{ $service->cost }}" @endisset placeholder=""> 
                                                </div>
                                            </div>
                                        </div>
                                                                            
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label>التفاصيل</label>
                                                <textarea class="form-control" name="details" id="details" rows="5"> @isset($service->details) {{ $service->details }} @endisset </textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label>مرفق</label>
                                                <div class="col-md-12">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="input-group input-large">
                                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                            <span class="fileinput-filename"> @isset($service->file) {{ $service->file }} @endisset </span>
                                                        </div>
                                                        <span class="input-group-addon btn default btn-file">
                                                            <span class="fileinput-new"> إختر المرفق </span>
                                                            <span class="fileinput-exists"> تغيير </span>
                                                            <input type="file" name="upload" @isset($service->file) value="{{ $service->file }}" @endisset> </span>
                                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>                     
                                                                            
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label>ملاحظات</label>
                                                <textarea class="form-control" name="remarques" id="remarques" rows="5">@isset($service->remarques) {{ $service->remarques }} @endisset</textarea>
                                            </div>
                                        </div>
                                                                    
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <hr>
                                        </div>
                                                                    
                                        <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
                                            <button type="submit" class="btn green pull-right margin-right-10">إضافة/تعديل</button>
                                        </div>
                                    </form>

                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
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
                language: "ar",
				format: "yyyy-mm-dd"
            });
		</script>
    </body>
</html>