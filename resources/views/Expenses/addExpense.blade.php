<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
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
        <link href="../assets/layouts/layout/css/font.css" rel="stylesheet" type="text/css" />
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
                    <h3 class="page-title"> المصروفات
                        <small></small>
                    </h3>
                    <div class="page-bar">
                        @include('common.breadcrumb', ['section' => 'المصروفات', 'route' => 'expenses.index', 'page' => 'إضافة مصروف'])
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
                                        <span class="caption-subject bold uppercase">إضافة مصروف</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                                                    
                                                
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single0">اسم المصروف <span>*</span></label>
										<input type="text" class="form-control" placeholder=""> 
									</div>
							     </div>     
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single1">النوع <span>*</span></label>
										<select id="single1" class="form-control select2 select-hide">
                                            <option>-- إختر --</option>
											<option value="1">مشروع</option>
											<option value="2">خدمة</option>
											<option value="3">مكافئة</option>
                                        </select>
									</div>
							     </div>                           
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>التفاصيل</label>
										<textarea class="form-control" rows="5"></textarea>
									</div>
							     </div>   
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single0">اسم المشروع/الخدمة <span>*</span></label>
										<select id="single0" class="form-control select2 select-hide">
                                            <option>-- إختر --</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
									</div>
							     </div>      
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
								 	<div class="form-group">
								 		<div class="input-group">
										<label for="single2">صاحب المصروف <span>*</span></label>
										<select id="single2" class="form-control select2 ">
                                            <option></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
                                        <span class="input-group-btn btn-addon">
                                        	<button type="button" class="btn green" data-toggle="modal" data-target="#exampleModal">عرض البيانات</button>
                                        </span>
                                        </div>
									</div>
							     </div>      
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single33">الحساب المحول منه <span>*</span></label>
										<select id="single33" class="form-control select2 select-hide">
                                            <option>-- إختر --</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
									</div>
							     </div>                      
                                              
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single3">طريقة التحويل <span>*</span></label>
										<select id="single3" class="form-control select2 select-hide">
                                            <option>-- إختر --</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
									</div>
							     </div>       
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single11">الميلغ <span>*</span></label>
										<select id="single11" class="form-control select2 select-hide">
                                            <option>-- إختر --</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
									</div>
							     </div>      
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single10">إضافة نسبة <span>*</span></label>
										<select id="single10" class="form-control select2 " multiple>
                                            <option>-- إختر --</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
									</div>
							     </div>                               
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>إجمالى المبلغ مع النسبة <span>*</span></label>
										<div class="input-icon">
											<i class="fa fa-money font-green "></i>
											<input type="text" class="form-control" placeholder="" disabled> 
										</div>
									</div>
							     </div>  
                                  	        
                                  
									
								  <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single">التاريخ <span>*</span></label>
										<div class="input-icon">
											<i class="fa fa-calendar font-green "></i>
										<input type="text" class="form-control date" name="from" placeholder="">
										</div>
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
									<div class="form-group">
										<label>ملاحظات</label>
										<textarea class="form-control" rows="5"></textarea>
									</div>
							     </div> 
                    
                    			                
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<hr>
							     </div>
                                 
									
							                                                               
                                                                     
								 <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
									
                   <button type="button" class="btn btn-lg green pull-right margin-right-10">إضافة/تعديل</button>
                   
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
        
        
        
        
        
        
        
        
        <!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title pull-left" id="exampleModalLabel">بيانات صاحب المصروف</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
						<label class="font-purple">اسم صاحب المصروف </label>
						<h4>محمد احمد محمد</h4>
					</div>
				  <div class="form-group">
						<label class="font-purple">الايميل </label>
						<h4>name@domain.com</h4>
					</div>
				  <div class="form-group">
						<label class="font-purple">الجوال </label>
						<h4>21549876</h4>
					</div>
				  
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
			  </div>
			</div>
		  </div>
		</div>
        
        
        
        
        
        
        
        
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
        <script>
			
		$(document).on('ready', function() {
			
			// Without Search
			$(".select-hide").select2({
				dir: "rtl",
				minimumResultsForSearch: Infinity
			});
					
		});
			
			//Date Pickers
			$('.date').datepicker({
				autoclose: true,
				todayHighlight: true,
				language: "ar"
			});
	 	

		</script>
        
    </body>

</html>