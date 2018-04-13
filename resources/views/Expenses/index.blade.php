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
                   
                	<button type="button" class="btn blue-hoki pull-right">إضافة مصروف</button>
                   
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title"> المصروفات
                        <small></small>
                    </h3>
                    <div class="page-bar">
						@include('common.breadcrumb', ['section' => 'المصروفات', 'route' => 'expenses.index', 'page' => 'كل المصروفات'])
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
                                        <span class="caption-subject bold uppercase">كل المصروفات</span>
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
									 مصاريف المشاريع
									</label>
								</div>

								<div>
									<input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
									<label for="checkbox-3" class="checkbox-style-3-label">
									 مصاريف المدفوعات
									</label>
								</div>

								<div>
									<input id="checkbox-4" class="checkbox-style" name="checkbox-4" type="checkbox">
									<label for="checkbox-4" class="checkbox-style-3-label">
									 مصاريف الخدمات
									</label>
								</div>

								<div>
									<input id="checkbox-5" class="checkbox-style" name="checkbox-5" type="checkbox">
									<label for="checkbox-5" class="checkbox-style-3-label">
									 المصاريف التشغيلية
									</label>
								</div>

								<div>
									<input id="checkbox-6" class="checkbox-style" name="checkbox-6" type="checkbox">
									<label for="checkbox-6" class="checkbox-style-3-label">
									 مكافئات
									</label>
								  </div>

								<div>
									<input id="checkbox-7" class="checkbox-style" name="checkbox-7" type="checkbox">
									<label for="checkbox-7" class="checkbox-style-3-label">
									 عمولات
									</label>
								</div>

								<div>
									<input id="checkbox-8" class="checkbox-style" name="checkbox-8" type="checkbox">
									<label for="checkbox-8" class="checkbox-style-3-label">
									 حوافز
									</label>
								</div>

								<div class="col-md-12">
									<hr>
								</div>
								
								<div>
									<input id="checkbox-20" class="checkbox-style" name="checkbox-20" type="checkbox">
									<label for="checkbox-20" class="checkbox-style-3-label">
									 اخر اسبوع
									</label>
								</div>

								<div>
									<input id="checkbox-30" class="checkbox-style" name="checkbox-30" type="checkbox">
									<label for="checkbox-30" class="checkbox-style-3-label">
									 اخر شهر
									</label>
								</div>

								<div>
									<input id="checkbox-40" class="checkbox-style" name="checkbox-40" type="checkbox">
									<label for="checkbox-40" class="checkbox-style-3-label">
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
									 جميع مصاريف مشروع
									</label>
									<div class="col-md-12">
										<select id="single" class="form-control select2 " multiple>
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
									 جميع مصاريف عميل
									</label>
									<div class="col-md-12">
										<select id="single0" class="form-control select2 " multiple>
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

								<table class="table table-striped table-bordered table-hover dt-responsive grd_view expenses-tbl" width="100%" id="sample_1">
									<thead>
										<tr>
											<th class="desktop">م</th>
											<th class="all no-padding"></th>
											<th class="min-phone-l">اسم المشروع</th>
											<th class="desktop">النوع</th>
											<th class="min-phone-l">رقم المصروف</th>
											<th class="min-tablet">المبلغ</th>
											<th class="none">العميل</th>
											<th class="desktop">التفاصيل</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($listExp as $exp)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td class="p-relative">
													<div class="por-indicator bg-red"></div>
												</td>
												<td>{{ $exp->name }}</td>
												<td>{{ $exp->type->name }}</td>
												<td>{{ $exp->id }}</td>
												<td>{{ $exp->amount }}</td>
												
												<td> @isset($exp->Project) {{$exp->Project->client->name}} @endisset </td>
												
												<td class="text-center">
													<div class="btn-group">
														<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="{{ route('expenses.show', $exp->id) }}" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
															<li><a href="{{ route('expenses.edit', $exp->id) }}" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
															<li><a href="#basic" class="font-red" data-toggle="modal"id="{{ $exp->id }}"><i class="icon-trash font-red"></i> حـذف</a></li>
															<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
														</ul>
													</div>
												</td>
											</tr>
										@endforeach
										<!--
											<tr>
												<td>2</td>
												<td class="p-relative">
													<div class="por-indicator bg-default"></div>
												</td>
												<td>تصميم وبرمجة متجر الكترونى</td>
												<td>خدمة</td>
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
												<td>مكافئة</td>
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
												<td>عمولة</td>
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
												<td>حوافز</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
												<td>مشروع</td>
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
										-->
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
			@include('common.footer')
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
		
		@include('common.scripts')
        
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