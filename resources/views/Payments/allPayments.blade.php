<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
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
                   
                   <button type="button" class="btn blue-hoki pull-right">إضافة دفعة</button>
                   
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title"> المدفوعات
                        <small></small>
                    </h3>
                    <div class="page-bar">
						@include('common.breadcrumb', ['section' => 'المدفوعات', 'route' => 'payments.index', 'page' => false])
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
                                        <span class="caption-subject bold uppercase">كل المدفوعات</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                   
                                   
							   <div class="col-md-3">

								<div class="marketplace__content">  
							  <div class="marketplace__aside">
							  <div class="filters__container filters__container--vertical filters__container--collapsed">
							  <form class="filters__form nomargin">
							  <h3 class="marketplace__title no-margin">
							  أدوات التصفية<i class="mdi mdi-chevron-down mdi-24px"></i>
							  </h3>
							  <div class="filters filters--vertical">
							  <div class="filters__section filters__section--category filters__section--vertical">
							  
							  <div class="filters__label filters__label--vertical">
							  <input id="checkbox-0" class="checkbox-style" name="checkbox-0" type="checkbox" checked>
							  <label for="checkbox-0" class="checkbox-style-3-label">
							   إختر الكل
							  </label>
							  </div>
							  
							  <div class="filters__section-content">

								<div>
									<input id="checkbox-1" class="checkbox-style" name="checkbox-1" type="checkbox" checked>
									<label for="checkbox-1" class="checkbox-style-3-label">
									 الكل
									</label>
								</div>

								<div>
									<input id="checkbox-2" class="checkbox-style" name="checkbox-2" type="checkbox">
									<label for="checkbox-2" class="checkbox-style-3-label">
									 اخر اسبوع
									</label>
								</div>

								<div>
									<input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
									<label for="checkbox-3" class="checkbox-style-3-label">
									 اخر شهر
									</label>
								</div>

								<div>
									<input id="checkbox-4" class="checkbox-style" name="checkbox-4" type="checkbox">
									<label for="checkbox-4" class="checkbox-style-3-label">
									 اخر سنة
									</label>
								</div>

								<div class="col-md-12">
									<hr>
								</div>

								<div>
									<input id="checkbox-10" class="checkbox-style" name="checkbox-10" type="checkbox">
									<label for="checkbox-10" class="checkbox-style-3-label">
									 فترة محددة
									</label>
									<div class="col-md-12">
										<input type="text" class="form-control date" name="from" placeholder="من تاريخ">
									</div>
									<hr>
									<div class="col-md-12">
										<input type="text" class="form-control date" name="to" placeholder="إلى تاريخ">
									</div>
								</div>

							
								<div class="col-md-12">
									<hr>
								</div>
								
								<div>
									<input id="checkbox-11" class="checkbox-style" name="checkbox-11" type="checkbox">
									<label for="checkbox-11" class="checkbox-style-3-label">
									 جميع مدفوعات مشروع
									</label>
									<div class="col-md-12">
										<select id="single" class="form-control select2 ">
                                            <option></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
									</div>
								</div>

							
								<div class="col-md-12">
									<hr>
								</div>
								
								<div>
									<input id="checkbox-12" class="checkbox-style" name="checkbox-12" type="checkbox">
									<label for="checkbox-12" class="checkbox-style-3-label">
									 جميع مدفوعات عميل
									</label>
									<div class="col-md-12">
										<select id="single0" class="form-control select2 ">
                                            <option></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
                                        </select>
									</div>
								</div>
								

								<div class="clearfix"></div>
									
								<div class="text-center margin-top-30">
									<button type="button" class="btn green">عـرض</button>
								</div>

							  </div>
							  </div>

							  </div></form></div></div>
								</div>

									</div>
                                  
                                  
								<div class="line visible-xs-block"></div>

                                   
							   <div class="col-md-9 clearfix">

								<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
									<thead>
										<tr>
											<th class="desktop">م</th>
											<th class="all no-padding"></th>
											<th class="min-phone-l">اسم المشروع</th>
											<th class="min-phone-l">رقم المدفوع</th>
											<th class="min-tablet">المبلغ</th>
											<th class="none">العميل</th>
											<th class="desktop">التفاصيل</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td class="p-relative">
												<div class="por-indicator bg-red"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td class="p-relative">
												<div class="por-indicator bg-default"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td class="p-relative">
												<div class="por-indicator bg-default"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td class="p-relative">
												<div class="por-indicator bg-red"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td class="p-relative">
												<div class="por-indicator bg-default"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>6</td>
											<td class="p-relative">
												<div class="por-indicator bg-red"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>7</td>
											<td class="p-relative">
												<div class="por-indicator bg-default"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>8</td>
											<td class="p-relative">
												<div class="por-indicator bg-default"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>9</td>
											<td class="p-relative">
												<div class="por-indicator bg-red"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>10</td>
											<td class="p-relative">
												<div class="por-indicator bg-red"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>11</td>
											<td class="p-relative">
												<div class="por-indicator bg-red"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>12</td>
											<td class="p-relative">
												<div class="por-indicator bg-default"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>13</td>
											<td class="p-relative">
												<div class="por-indicator bg-red"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>14</td>
											<td class="p-relative">
												<div class="por-indicator bg-default"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>15</td>
											<td class="p-relative">
												<div class="por-indicator bg-red"></div>
											</td>
											<td>تصميم وبرمجة متجر الكترونى</td>
											<td>2512412</td>
											<td>2510</td>
											<td>اسم العميل طالب الخدمة</td>
											<td class="text-center">
												<div class="btn-group">
													<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
														<li><a href="#" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
														<li><a href="#basic" class="font-red" data-toggle="modal"><i class="icon-trash font-red"></i> حـذف</a></li>
														<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
													</ul>
												</div>
											</td>
										</tr>
									</tbody>
								</table>

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
        
        
        
        
        
        <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content del-modal font-white">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body text-center">
					<h3>
						<i class="fa fa-3x fa-trash"></i>
					</h3>
					 متأكد إنك تريد الحذف؟ 
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
						<button type="button" class="btn btn-danger">حـذف</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
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
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/table-datatables-responsive.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
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


		$(".marketplace__title").click(function(){
			$(".filters__container--collapsed .filters").toggleClass("show__sbar");
		})

		</script>
        
    </body>

</html>