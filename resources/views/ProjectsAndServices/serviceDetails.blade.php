<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
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
                        @include('common.breadcrumb', ['section' => 'المشاريع والخدمات', 'route' => 'allProjectsAndServices', 'page' => false])
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            @isset($service)
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-layers font-dark"></i>
                                        <span class="caption-subject bold uppercase">خدمة رقم {{$service->id}}</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                                                    
                                                
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>اسم المشروع <span>*</span></label>
										<div class="input-icon">
											<i class="fa fa-file font-green "></i>
											<input type="text" class="form-control" value="{{$service->name}}" placeholder="اسم الخدمة" disabled> 
										</div>
									</div>
							     </div>
                                                                     
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>التكلفة الاجمالية </label>
										<div class="input-icon">
											<i class="fa fa-money font-green "></i>
											<input type="text" class="form-control" value="{{$service->cost}} ريال" placeholder="1000 ريال" disabled> 
										</div>
									</div>
							     </div>
                                                                    
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>التفاصيل</label>
										<textarea class="form-control" rows="5" disabled>{{$service->details}}</textarea>
									</div>
							     </div>
                                  
									                    
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>ملاحظات</label>
										<textarea class="form-control" rows="5" disabled>{{$service->remarques}}</textarea>
									</div>
							     </div>
                                 
                                                      
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<hr>
							     </div>
                                 
                                                      
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>إجمالى المبلغ المصروف</label>
										<div class="col-md-12">
										
											<input type="text" class="form-control" value="800 ريال" disabled>
											
										</div>
									</div>
							     </div> 
                                  
                                   <div class="clearfix"></div>
                                   
                                </div>
                            </div>
                            @endisset
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
                language: "ar"
            });
		</script>
    </body>
</html>