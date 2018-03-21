<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>نظام الماليات</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout2/css/font.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components-md.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins-md.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout/css/sBar.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/themes/grey.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="../dashboard/index.html">
                        <img src="../assets/layouts/layout/img/logo-default.png" alt="logo" class="logo-default" /> </a>
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
                                    <img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" />
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
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"><!-- page-sidebar-menu-hover-submenu-->
                        <li class="nav-item start ">
                            <a href="../dashboard/index.html" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">الرئيسية</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">المشاريع والخدمات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="../ProjectsAndServices/allProjectsAndServices.html" class="nav-link ">
                                        <span class="title">كل المشاريع والخدمات</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="../ProjectsAndServices/addProject.html" class="nav-link ">
                                        <span class="title">إضافة مشروع</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="../ProjectsAndServices/addService.html" class="nav-link ">
                                        <span class="title">إضافة خدمة</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item   ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">المدفوعات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="../Payments/allPayments.html" class="nav-link ">
                                        <span class="title">كل المدفوعات</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="../Payments/addPayment.html" class="nav-link ">
                                        <span class="title">إضافة دفعة</span>
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">المصروفات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="../Expenses/allExpenses.html" class="nav-link ">
                                        <span class="title">كل المصروفات</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="../Expenses/addExpense.html" class="nav-link ">
                                        <span class="title">إضافة مصروف</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="../Settings/settings.html" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">الإعدادات</span>
                            </a>
                        </li>
                        <li class="nav-item  active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">المستخدمين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="../Users/allUsers.html" class="nav-link ">
                                        <span class="title">كل المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="../Users/addClient.html" class="nav-link ">
                                        <span class="title">إضافة عميل</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="../Users/addEmployee.html" class="nav-link ">
                                        <span class="title">كل مقدم خدمة</span>
                                    </a>
                                </li>
                                <li class="nav-item  active open">
                                    <a href="../Users/addUser.html" class="nav-link ">
                                        <span class="title">إضافة مستخدم</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                                                
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
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
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="../dashboard/index.html">الرئيسية</a>
                                <i class="fa fa-angle-left"></i>
                            </li>
                            <li>
                               <a href="#">عنوان القسم</a>
                                <i class="fa fa-angle-left"></i>
                            </li>
                            <li class="active">
                                <span>عنوان الصفحة</span>
                            </li>
                        </ul>
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
        <div class="page-footer">
            <div class="page-footer-inner">
                2018 &copy; جميع الحقوق محفوظة
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        
        
        
        
        
        
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.ar.min.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
       <script src="../assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/form-icheck.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
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