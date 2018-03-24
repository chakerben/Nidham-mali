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
                        @include('common.breadcrumb', ['section' => 'المشاريع والخدمات', 'route' => 'allProjectsAndServices', 'page' => false])
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            @isset($project)
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-layers font-dark"></i>
                                        <span class="caption-subject bold uppercase">مشروع رقم {{$project->id}}</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                                                    
                                                
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>اسم المشروع </label>
										<div class="input-icon">
											<i class="fa fa-file font-green "></i>
											<input type="text" class="form-control" value="{{$project->name}}" disabled> 
										</div>
									</div>
							     </div>
                                                                      
							     <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>التاريخ </label>
										<div class="input-group date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control date col-md-6" name="begin_at" value="{{$project->begin_at}}" disabled>
											<span class="input-group-addon small-sp">  </span>
											<input type="text" class="form-control date col-md-6" name="end_at" value="{{$project->end_at}}" disabled> 
										</div>
									</div>
							     </div>                           
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>التفاصيل</label>
										<textarea class="form-control" rows="5" disabled>{{$project->details}}</textarea>
									</div>
							     </div>
                                                                      
							     <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>العميل </label>
										<div class="input-icon">
											<i class="fa fa-user font-green "></i>
											<input type="text" class="form-control" value="{{$project->client->name}}" disabled> 
										</div>
									</div>
							     </div>                           
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>تكلفة المشروع </label>
										<div class="input-icon">
											<i class="fa fa-money font-green "></i>
											<input type="text" class="form-control" value="{{$project->cost}} ريال" disabled> 
										</div>
									</div>
							     </div>
                                  
									
							    <div class="col-md-6 col-md-offset-3 col-sm-12">                                   
                                    <fieldset>
                                        <legend>الدفعات</legend>
                                                            
                                        <div class="form-group">
                                            <label>عدد الدفعات </label>
                                            <div class="input-icon">
                                                <i class="fa fa-money font-green "></i>
                                                @isset($project->Tranches) <input type="text" class="form-control" value="{{count($project->Tranches)}}" disabled> @endisset 
                                                @empty($project->Tranches) <input type="text" class="form-control" value="0" disabled> @endempty 
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>إجمالى المبلغ المستلم </label>
                                            <div class="input-icon">
                                                <i class="fa fa-money font-green "></i>
                                                <input type="text" class="form-control" value="4" disabled> 
                                            </div>
                                        </div>
                                        </div>   
                                                                        
                                        <div class="col-md-4 col-xs-12">
                                            <div class="form-group">
                                            <label>إجمالى المبلغ المتبقية </label>
                                            <div class="input-icon">
                                                <i class="fa fa-money font-green "></i>
                                                <input type="text" class="form-control" value="4" disabled> 
                                            </div>
                                        </div>
                                        </div>                       		
                                        
                                        <div class="col-md-4 col-xs-12">
                                            <div class="form-group">
                                                <label>إجمالى المبلغ المصروفة </label>
                                                <div class="input-icon">
                                                    <i class="fa fa-money font-green "></i>
                                                    <input type="text" class="form-control" value="4" disabled> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="mt-element-list">
                                                    <div class="mt-list-head list-simple ext-1 font-white bg-green-sharp">
                                                        <div class="list-head-title-container">
                                                            <h3 class="list-title">تفاصيل الدفعات</h3>
                                                        </div>
                                                    </div>
                                                    <div class="mt-list-container list-simple ext-1 bg-white">
                                                        <ul>
                                                            @foreach ($project->Tranches as $tranche)
                                                            <li class="mt-list-item done">
                                                                <div class="list-icon-container">
                                                                    <i class="icon-check"></i>
                                                                </div>
                                                                <div class="list-datetime"> {{$tranche->date_tranche}} </div>
                                                                <div class="list-item-content">
                                                                    <h3 class="uppercase">
                                                                        <a href="javascript:;">{{$tranche->amount}} ريال</a>
                                                                    </h3>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                            <!--
                                                                <li class="mt-list-item done">
                                                                    <div class="list-icon-container">
                                                                        <i class="icon-check"></i>
                                                                    </div>
                                                                    <div class="list-datetime"> 24/2/2018 </div>
                                                                    <div class="list-item-content">
                                                                        <h3 class="uppercase">
                                                                            <a href="javascript:;">500 ريال</a>
                                                                        </h3>
                                                                    </div>
                                                                </li>
                                                                <li class="mt-list-item done">
                                                                    <div class="list-icon-container">
                                                                        <i class="icon-check"></i>
                                                                    </div>
                                                                    <div class="list-datetime"> 24/2/2018 </div>
                                                                    <div class="list-item-content">
                                                                        <h3 class="uppercase">
                                                                            <a href="javascript:;">150 ريال</a>
                                                                        </h3>
                                                                    </div>
                                                                </li>
                                                                <li class="mt-list-item late">
                                                                    <div class="list-icon-container">
                                                                        <i class="icon-close"></i>
                                                                    </div>
                                                                    <div class="list-datetime"> 24/2/2018 </div>
                                                                    <div class="list-item-content">
                                                                        <h3 class="uppercase">
                                                                            <a href="javascript:;">100 ريال</a>
                                                                        </h3>
                                                                    </div>
                                                                </li>
                                                                <li class="mt-list-item wait">
                                                                    <div class="list-icon-container">
                                                                        <i class="icon-close"></i>
                                                                    </div>
                                                                    <div class="list-datetime"> 24/2/2018 </div>
                                                                    <div class="list-item-content">
                                                                        <h3 class="uppercase">
                                                                            <a href="javascript:;">250 ريال</a>
                                                                        </h3>
                                                                    </div>
                                                                </li>
                                                            -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-center">
                                            <ul class="pay-indicator">
                                                <li>
                                                    <span class="pay-status done"></span> تم الدفع
                                                </li>
                                                <li>
                                                    <span class="pay-status late"></span> متأخر عن تاريخ الدفع
                                                </li>
                                                <li>
                                                    <span class="pay-status wait"></span> لم يتم الدفع
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </fieldset>
							    </div>    
                                  
									              
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>ملاحظات</label>
										<textarea class="form-control" rows="5" disabled>{{$project->remarques}}</textarea>
									</div>
							     </div>
                                 
                                                      
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<hr>
							     </div>
                                 
                                                      
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>صافى الربح</label>
										<div class="col-md-12">
										
											<input type="text" class="form-control" value="{{$project->benefis}} ريال" disabled>
											
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