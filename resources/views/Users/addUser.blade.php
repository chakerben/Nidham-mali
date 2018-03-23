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
                <!-- BEGIN SIDEBAR -->
                    @include('common.sidebar');
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                   
                   
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title"> المستخدمين
                        <small></small>
                    </h3>
                    <div class="page-bar">
                        @include('common.breadcrumb', ['section' => 'المستخدمين', 'route' => 'allUsers', 'page' => 'إضافة مستخدم'])
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
                                        <span class="caption-subject bold uppercase">إضافة مستخدم</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                                                    
                                                
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single0">اسم المستخدم <span>*</span></label>
										<input type="text" class="form-control" placeholder=""> 
									</div>
							     </div>             
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single0">الايميل <span>*</span></label>
										<input type="text" class="form-control" placeholder=""> 
									</div>
							     </div>              
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single0">رقم الجوال <span>*</span></label>
										<input type="text" class="form-control" placeholder=""> 
									</div>
							     </div>              
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single0">كلمة المرور <span>*</span></label>
										<input type="text" class="form-control" placeholder=""> 
									</div>
							     </div>                          
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>نبذة</label>
										<textarea class="form-control" rows="5"></textarea>
									</div>
							     </div>       
                                                                                          
								 <!--<div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single3">طريقة الدفع <span>*</span></label>
										<select id="single3" class="form-control select2 ">
                                            <option></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
									</div>
							     </div>-->    
                        
  
                                
                                
                                                                                              
                                  


								<div class="col-md-10 col-md-offset-1 col-sm-12">
									<fieldset>
                                	<legend class="font-purple">الصلاحية</legend>
                                	
                                	
                                	
									<div class="form-group">
										<label class="font-purple"><h4>المشاريع</h4></label>
										<div class="input-group">
										<div class="icheck-inline">
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة </label><!--checked-->
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> حذف </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> عرض </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تحميل </label>
										</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<label class="font-purple"><h4>الخدمات</h4></label>
										<div class="input-group">
										<div class="icheck-inline">
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> حذف </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> عرض </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تحميل </label>
										</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<label class="font-purple"><h4>المدفوعات</h4></label>
										<div class="input-group">
										<div class="icheck-inline">
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> حذف </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> عرض </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تحميل سند صرف </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تحميل سند قبض </label>
										</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<label class="font-purple"><h4>المصروفات</h4></label>
										<div class="input-group">
										<div class="icheck-inline">
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> حذف </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> عرض </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تحميل سند صرف </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تحميل سند قبض </label>
										</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<label class="font-purple"><h4>الاعدادات</h4></label>
										<div class="input-group">
										<div class="icheck-inline">
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة فى عام </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل فى عام </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة فى حسابات الشركة </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل فى حسابات الشركة </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> عمل تحويل بين الحسابات </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة نسبة </label>
										</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<label class="font-purple"><h4>المستخدمين</h4></label>
										<div class="input-group">
										<div class="icheck-inline">
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة مستخدم </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة عميل </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> إضافة مقدم خدمة </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل مستخدم </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل عميل </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> تعديل مقدم خدمة </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> حذف مستخدم </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> حذف عميل </label>
											<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple"> حذف مقدم خدمة </label>
										</div>
										</div>
									</div>
										<hr>
                              	
                              	
                              	
                               	
                                	</fieldset> 
							     </div>
								
								
                                
                                
                                
                                
                                 
									
									
									<div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>صـورة</label>
										<div class="col-md-12">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="input-group input-large">
												<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
													<i class="fa fa-file fileinput-exists"></i>&nbsp;
													<span class="fileinput-filename"> </span>
												</div>
												<span class="input-group-addon btn default btn-file">
													<span class="fileinput-new"> إختر المرفق </span>
													<span class="fileinput-exists"> تغيير </span>
													<input type="file" name="..."> </span>
												<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
											</div>
										</div>
										</div>
									</div>
							     </div>                         
                                              
                                      
									
                    
                    			                
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<hr>
							     </div>
                                 
									
							                                                               
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
									
                   <button type="button" class="btn btn-lg green margin-right-10">إضافة/تعديل</button>
                   
							     </div>
                                  
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
                language: "ar"
            });
		</script>
    </body>
</html>