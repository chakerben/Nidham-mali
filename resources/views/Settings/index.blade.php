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
            	@include('common.sidebar');
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title"> الإعدادات
                        <small></small>
                    </h3>
                    <div class="page-bar">
						@include('common.breadcrumb', ['section' => 'الإعدادات', 'route' => 'settings', 'page' => false])
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
                                        <span class="caption-subject bold uppercase">الإعدادات</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
									
									<div class="tabbable-line">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1" data-toggle="tab"> عام </a>
                                            </li>
                                            <li>
                                                <a href="#tab_2" data-toggle="tab"> حسابات الشركة </a>
                                            </li>
                                            <li>
                                                <a href="#tab_3" data-toggle="tab"> التحويلات </a>
                                            </li>
                                            <li>
                                                <a href="#tab_4" data-toggle="tab"> النسب </a>
                                            </li>
                                            <li>
                                                <a href="#tab_5" data-toggle="tab"> تقارير النسب </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                                <div class="form-horizontal form-bordered">
													<div class="form-body">
														<div class="col-md-10 col-md-offset-1 col-xs-12">
															<form action="/settings" method="POST" id="settingForm">
																@csrf
																<div class="form-group">
																	<label class="control-label col-md-2">شعار الموقع</label>
																	<div class="col-md-8">
																		<div class="fileinput fileinput-new" data-provides="fileinput">
																			<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																				<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
																			</div>
																			<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
																			<div>
																				<span class="btn default btn-file">
																					<span class="fileinput-new"> إختر صورة الشعار </span>
																					<span class="fileinput-exists"> تغيير </span>
																					<input type="file" name="logo" id="logo">
																				</span>
																				<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="control-label col-md-2">عنوان النظام</label>
																	<div class="col-md-10">
																		<div class="input-icon">
																			<i class="fa fa-dashboard font-green "></i>
																			<input type="text" class="form-control" name="system_name" id="system_name" @isset($settings['system_name']) value="{{ $settings['system_name'] }}" @endisset placeholder=""> 
																		</div>
																	</div>
																</div>
															
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-4">المنطقة الزمنية</label>
																		<div class="col-md-8">
																			<select class="form-control select2 " name="tyme_zone" id="tyme_zone">
																				<option></option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																			</select>
																		</div>
																	</div>
																</div>
															
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-4">صيغة التاريخ</label>
																		<div class="col-md-8">
																			<select class="form-control select2 select-hide" name="date_format" id="date_format">
																				<option>-- إختر --</option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																			</select>
																		</div>
																	</div>
																</div>
															
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-4">تنسيق الوقت</label>
																		<div class="col-md-8">
																			<select class="form-control select2 select-hide" name="time_format" id="time_format">
																				<option>-- إختر --</option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																			</select>
																		</div>
																	</div>
																</div>
															
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-4">العملة</label>
																		<div class="col-md-8">
																			<select class="form-control select2 select-hide" name="currency" id="currency">
																				<option>-- إختر --</option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																			</select>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
													<!-- مهام مقدمين الخدمة -->
													<div class="col-md-4 col-sm-12">
														<fieldset>
															<legend class="font-purple">مهام مقدمين الخدمة</legend>

															<form action="/settings/createrole" method="POST">
																@csrf
																<div class="form-group">
																	<label>اسم المهمة </label>
																	<div class="input-icon">
																		<i class="fa fa-tasks font-green "></i>
																		<input type="text" class="form-control" name="newRole" id="newRole" placeholder=""> 
																	</div>
																</div>
																
																<div class="col-md-12">
																	<div class="form-group text-center">
																		<button type="submit" class="btn green margin-right-10">إضافة</button>
																	</div>
																</div>
															</form>
															
														   	<div class="col-md-12">
																<div class="form-group">
																	<div class="table-responsive">
																		<table class="table">
																			<thead>
																				<tr>
																					<th> # </th>
																					<th> اسم المهمة </th>
																				</tr>
																			</thead>
																			<tbody>
																				@foreach ($roles as $role)
																					<tr>
																						<td> {{$role->id}} </td>
																						<td> {{$role->name}} </td>
																					</tr>
																					<!--
																						<tr>
																							<td> 2 </td>
																							<td> محلل </td>
																						</tr>
																					-->
																				@endforeach
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</fieldset> 
													</div>
													<!-- نوع المصروف -->
													<div class="col-md-4 col-sm-12">
														<fieldset>
															<legend class="font-purple">نوع المصروف</legend>

															<form action="/settings/createxpensetype" method="POST">
																@csrf
																<div class="form-group">
																	<label>نوع المصروف </label>
																	<div class="input-icon">
																		<i class="fa fa-money font-green "></i>
																		<input type="text" class="form-control" name="newType" id="newType" placeholder=""> 
																	</div>
																</div>

																<div class="col-md-12">
																	<div class="form-group text-center">
																		<button type="submit" class="btn green margin-right-10">إضافة</button>
																	</div>
																</div>
															</form>
															
														   	<div class="col-md-12">
																<div class="form-group">
																	<div class="table-responsive">
																		<table class="table">
																			<thead>
																				<tr>
																					<th> # </th>
																					<th> نوع المصروف </th>
																				</tr>
																			</thead>
																			<tbody>
																				@foreach ($expenseTypes as $type)
																					<tr>
																						<td> {{$type->id}} </td>
																						<td> {{$type->name}} </td>
																					</tr>
																					<!--
																						<tr>
																							<td> 2 </td>
																							<td> محلل </td>
																						</tr>
																					-->
																				@endforeach
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</fieldset> 
													</div>
													<!-- طرق التحويل -->
													<div class="col-md-4 col-sm-12">
														<fieldset>
															<legend class="font-purple">طرق التحويل</legend>
															
															<form action="/settings/createtransfermethode" method="POST">
																@csrf
																<div class="form-group">
																	<label>طريقة تحويل </label>
																	<div class="input-icon">
																		<i class="fa fa-random font-green "></i>
																		<input type="text" name="newMethode" id="newMethode" class="form-control" placeholder=""> 
																	</div>
																</div>
																
																<div class="col-md-12">
																	<div class="form-group text-center">
																		<button type="submit" class="btn green margin-right-10">إضافة</button>
																	</div>
																</div>
															</form>

														   	<div class="col-md-12">
																<div class="form-group">
																	<div class="table-responsive">
																		<table class="table">
																			<thead>
																				<tr>
																					<th> # </th>
																					<th> طريقة التحويل </th>
																				</tr>
																			</thead>
																			<tbody>
																				@foreach ($transferMethodes as $method)
																					<tr>
																						<td> {{$method->id}} </td>
																						<td> {{$method->name}} </td>
																					</tr>
																					<!--
																						<tr>
																							<td> 2 </td>
																							<td> محلل </td>
																						</tr>
																					-->
																				@endforeach
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</fieldset> 
													</div>

													<div class="col-md-6 col-md-offset-3 col-sm-12"> <hr> </div>

													<div class="form-actions">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<a href="javascript:;" id="formSubmit" class="btn btn-lg green">
																	<i class="fa fa-check"></i> موافـق
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											
                                            <div class="tab-pane" id="tab_2">
												<div class="form-horizontal form-bordered">
													<div class="form-body">
														<div class="col-md-12">
															<form id="acountForm" action="/settings/createbankacount" method="POST">
																@csrf
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-3">اسم البنك</label>
																		<div class="col-md-9">
																			<div class="input-icon">
																				<i class="fa fa-bank font-green "></i>
																				<input type="text" class="form-control" name="bank_name" id="bank_name" placeholder=""> 
																			</div>
																		</div>
																	</div>
																</div>

																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-3">رقم الحساب</label>
																		<div class="col-md-9">
																			<div class="input-icon">
																				<i class="fa fa-barcode font-green "></i>
																				<input type="text" class="form-control" name="count_num" id="count_num" placeholder=""> 
																			</div>
																		</div>
																	</div>
																</div>

																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-3">الرصيدالافتتاحى</label>
																		<div class="col-md-9">
																			<div class="input-icon">
																				<i class="fa fa-money font-green "></i>
																				<input type="text" class="form-control" name="init_amount" id="init_amount" placeholder=""> 
																			</div>
																		</div>
																	</div>
																</div>

																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-3">رقم الأيبان</label>
																		<div class="col-md-9">
																			<div class="input-icon">
																				<i class="fa fa-asterisk font-green "></i>
																				<input type="text" class="form-control" name="iban" id="iban" placeholder=""> 
																			</div>
																		</div>
																	</div>
																</div>

																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-3">اسم النسبة</label>
																		<div class="col-md-9">
																			<div class="input-icon">
																				<i class="fa fa-bar-chart font-green "></i>
																				<input type="text" class="form-control" name="percent_name" id="percent_name" placeholder=""> 
																			</div>
																		</div>
																	</div>
																</div>

																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="control-label col-md-3">قيمة النسبة</label>
																		<div class="col-md-9">
																			<div class="input-icon">
																				<i class="fa fa-money font-green "></i>
																				<input type="text" class="form-control" name="percent_valu" id="percent_valu" placeholder=""> 
																			</div>
																		</div>
																	</div>	
																</div>
															</form>
														</div>
													</div>
													 
													<div class="form-actions">
														<div class="row">
															<div class="col-md-12 text-center">
																<a href="javascript:;" id="acountFormSubmit" class="btn btn-lg green">
																	<i class="fa fa-check"></i> موافـق</a>
															</div>
														</div>
													</div>
												</div>

												<hr>
												
												@isset($acounts)
													<div class="row margin-top-40">
														@foreach ($acounts as $acount)
															<div class="col-md-4">
																<div class="portlet mt-element-ribbon bg-grey-steel portlet-fit ">
																	<div class="ribbon ribbon-right ribbon-shadow ribbon-color-success">
																		<div class="ribbon-sub ribbon-right"></div>
																		{{ $acount->count_num }} 
																	</div>
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-bank font-green"></i>
																			<span class="caption-subject font-green bold uppercase">{{ $acount->bank_name }}</span>
																		</div>
																	</div>
																	<div class="portlet-body bnk"> {{ $acount->total_amount }} ريال </div>
																	<a class="more" href="javascript:;"> التفاصيل
																		<i class="m-icon-swapleft m-icon-dark"></i>
																	</a>
																</div>
															</div>
														@endforeach
														<!--
															<div class="col-md-4">
																<div class="portlet mt-element-ribbon bg-grey-steel portlet-fit ">
																	<div class="ribbon ribbon-right ribbon-shadow ribbon-color-success">
																		<div class="ribbon-sub ribbon-right"></div>
																		562-525-251 
																	</div>
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-bank font-green"></i>
																			<span class="caption-subject font-green bold uppercase">بنك مصـر</span>
																		</div>
																	</div>
																	<div class="portlet-body bnk"> 10000 ريال </div>
																	<a class="more" href="javascript:;"> التفاصيل
																		<i class="m-icon-swapleft m-icon-dark"></i>
																	</a>
																</div>
															</div>

															<div class="col-md-4">
																<div class="portlet mt-element-ribbon bg-grey-steel portlet-fit ">
																	<div class="ribbon ribbon-right ribbon-shadow ribbon-color-success">
																		<div class="ribbon-sub ribbon-right"></div>
																		562-525-251 
																	</div>
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-bank font-green"></i>
																			<span class="caption-subject font-green bold uppercase">بنك مصـر</span>
																		</div>
																	</div>
																	<div class="portlet-body bnk"> 10000 ريال </div>
																	<a class="more" href="javascript:;"> التفاصيل
																		<i class="m-icon-swapleft m-icon-dark"></i>
																	</a>
																</div>
															</div>
														-->
													</div>
												@endisset
											</div>
											
											<div class="tab-pane" id="tab_3">
												@isset($transferToEdit)
													<form action="/transfer/{{$transferToEdit->id}}" method="POST" id="transfersForm">
														@method('PUT')
												@endisset
												@empty($transferToEdit)
													<form action="/transfer" method="POST" id="transfersForm">
												@endempty
													@csrf
													<div class="row">
														<div class="col-md-10 col-md-offset-1 col-xs-12">
															<div class="col-md-6 col-xs-12">
																<div class="form-group">
																	<label class="control-label col-md-3 no-margin margin-top-5">حول من بنك <span>*</span></label>
																	<div class="col-md-9">
																		<select class="form-control select2" name="banc_from" id="banc_from">
																			<option></option>
																			@foreach ($banks as $bank)
																				<option value="{{ $bank->bank_name }}" @isset($transferToEdit) {{ $transferToEdit->bankFromMatch($bank->bank_name) ? 'selected="selected"' : '' }} @endisset>{{ $bank->bank_name }}</option>
																			@endforeach
																		</select>
																	</div>
																	<div class="clearfix"></div>
																</div>
															</div>
															<div class="col-md-6 col-xs-12">
																<div class="form-group">
																	<label class="control-label col-md-3 no-margin margin-top-5">الى بنك <span>*</span></label>
																	<div class="col-md-9">
																		<select class="form-control select2 " name="banc_to" id="banc_to">
																			<option></option>
																			@foreach ($banks as $bank)
																				<option value="{{ $bank->bank_name }}" @isset($transferToEdit) {{ $transferToEdit->bankToMatch($bank->bank_name) ? 'selected="selected"' : '' }} @endisset>{{ $bank->bank_name }}</option>
																			@endforeach
																		</select>
																	</div>
																	<div class="clearfix"></div>
																</div>
															</div>
														</div>
													</div>
													
													<div class="row">
														<div class="col-md-10 col-md-offset-1 col-xs-12">
															<div class="col-md-6 col-xs-12">
																<div class="form-group">
																	<label class="control-label col-md-3 no-margin margin-top-5">رقم حسابه <span>*</span></label>
																	<div class="col-md-9">
																		<select class="form-control select2" name="banc_acount_from_id" id="banc_acount_from_id">
																			<option></option>
																			@foreach ($acounts as $acount)
																				<option value="{{ $acount->id }}" bank="{{ $acount->bank_name }}" @isset($transferToEdit) {{ $transferToEdit->bankAcountFromMatch($acount->id) ? 'selected="selected"' : '' }} @endisset>{{ $acount->count_num }}</option>
																			@endforeach
																		</select>
																	</div>
																	<div class="clearfix"></div>
																</div>
															</div>
															<div class="col-md-6 col-xs-12">
																<div class="form-group">
																	<label class="control-label col-md-3 no-margin margin-top-5">رقم حسابه <span>*</span></label>
																	<div class="col-md-9">
																		<select class="form-control select2" name="banc_acount_to_id" id="banc_acount_to_id">
																			<option></option>
																			@foreach ($acounts as $acount)
																				<option value="{{ $acount->id }}" bank="{{ $acount->bank_name }}" @isset($transferToEdit) {{ $transferToEdit->bankAcountToMatch($acount->id) ? 'selected="selected"' : '' }} @endisset>{{ $acount->count_num }}</option>
																			@endforeach
																		</select>
																	</div>
																	<div class="clearfix"></div>
																</div>
															</div>
														</div>
													</div>
													
													<div class="row">
														<div class="col-md-6 col-md-offset-3 col-xs-12">
															<hr>
														</div>
													</div>
												
													<div class="row">
														<div class="col-md-10 col-md-offset-1 col-xs-12">
															<div class="col-md-4 col-xs-12">
																<div class="form-group">
																	<label class="control-label col-md-4 no-margin margin-top-5">مبلغ قدره <span>*</span></label>
																	<div class="col-md-8">
																		<div class="input-icon">
																			<i class="fa fa-money font-green "></i>
																			<input type="text" class="form-control" name="transfer_amount" id="transfer_amount" value="@isset($transferToEdit) {{ $transferToEdit->transfer_amount }} @endisset @empty($transferToEdit) 0 @endempty"> 
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>
															</div>

															<div class="col-md-4 col-xs-12">
																<div class="form-group">
																	<label class="control-label col-md-5 no-margin margin-top-5">اقتطاع نسبه </label>
																	<div class="col-md-7">
																		<select class="form-control select2 select-hide" style="width: 100%;" name="percent_id" id="percent_id">
																			<option rate="0">-- إختر --</option>
																			@foreach ($rates as $rate)
																				<option value="{{ $rate->id }}" rate="{{$rate->value}}" @isset($transferToEdit) {{ $transferToEdit->rateMatch($rate->id) ? 'selected="selected"' : '' }} @endisset>{{ $rate->name }}</option>
																			@endforeach
																		</select>
																	</div>
																<div class="clearfix"></div>
																</div>
															</div>

															<div class="col-md-4 col-xs-12">
																<div class="form-group">
																	<label class="control-label col-md-5 no-margin margin-top-5">صافى المبلغ </label>
																	<div class="col-md-7">
																		<div class="input-icon">
																			<i class="fa fa-money font-green "></i>
																			<input type="text" class="form-control" name="total_amount" id="total_amount" readonly value="@isset($transferToEdit) {{ $transferToEdit->total_amount }} @endisset @empty($transferToEdit) 0 @endempty"> 
																		</div>
																	</div>
																<div class="clearfix"></div>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-6 col-md-offset-3 col-xs-12">
															<hr>
														</div>
													</div>

													<div class="col-md-6 col-md-offset-3 col-sm-12">
														<div class="form-group">
															<label class="control-label col-md-3 no-margin margin-top-5">مرفق </label>
															<div class="col-md-9">
																<div class="fileinput fileinput-new" data-provides="fileinput">
																<div class="input-group input-large">
																	<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
																		<i class="fa fa-file fileinput-exists"></i>&nbsp;
																		<span class="fileinput-filename"> @isset($transferToEdit->file) value="{{ $transferToEdit->file }}" @endisset </span>
																	</div>
																	<span class="input-group-addon btn default btn-file">
																		<span class="fileinput-new"> إختر المرفق </span>
																		<span class="fileinput-exists"> تغيير </span>
																		<input type="file" name="upload" @isset($transferToEdit->file) value="{{ $transferToEdit->file }}" @endisset> </span>
																	<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
																</div>
																</div>
															</div>
															<div class="clearfix"></div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
															<a href="javascript:;" class="btn btn-lg green" id="transfersFormSubmit">
																<i class="fa fa-check"></i> حـول</a>
														</div>
													</div>
												</form>

												<hr>

												<h4 class="text-center font-purple margin-bottom-5 no-margin">
													التحويلات السابقة
												</h4>
											
												<div class="row">
													<div class="col-md-12 text-center"><hr style="width: 20%;margin: 5px auto 20px auto;"></div>
												</div>
											
												<div class="row">
													<div class="col-md-3">
														<div class="marketplace__content">  
															<div class="marketplace__aside">
																<div class="filters__container filters__container--vertical filters__container--collapsed">
																	@include('Settings.fltrsTransfer', ["banks" => $banks])
																</div>
															</div>
														</div>
													</div>
														
													<div class="line visible-xs-block"></div>
												
													<div class="col-md-9 clearfix">
														<div class="table-responsive">
															<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
																<thead>
																	<tr>
																		<th class="desktop no-padding">م</th>
																		<th class="min-phone-l">البنك المحول منه</th>
																		<th class="min-phone-l">البنك المحول اليه</th>
																		<th class="desktop">النسبة</th>
																		<th class="desktop">المبلغ</th>
																		<th class="desktop">التاريخ</th>
																		<th class="desktop">التفاصيل</th>
																	</tr>
																</thead>
																<tbody>
																	@foreach ($transfers as $transfer)
																	<tr>
																		<td>{{$loop->iteration}}</td>
																		<td>{{$transfer->AcountFrom->bank_name}}</td>
																		<td>{{$transfer->AcountTo->bank_name}}</td>
																		<td>{{$transfer->transfer_amount - $transfer->total_amount}} ريال</td>
																		<td>{{$transfer->total_amount}} ريال</td>
																		<td>{{$transfer->created_at}}</td>
																		<td class="text-center">
																			<div class="btn-group">
																				<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
																					<i class="fa fa-angle-down"></i>
																				</a>
																				<ul class="dropdown-menu pull-right">
																					<li><a href="{{ route('transfer.edit', $rate->id) }}" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
																					<li><a href="{{ route('transfer.edit', $rate->id) }}" class="font-blue"><i class="icon-note font-blue"></i> تعديل</a></li>
																					<li><a href="#basic" class="font-red" data-toggle="modal" id="{{ "transfer/".$transfer->id }}"><i class="icon-trash font-red"></i> حـذف</a></li>
																					<li><a href="#" class="font-green"><i class="icon-cloud-download font-green"></i> تحميل</a></li>
																				</ul>
																			</div>
																		</td>
																	</tr>
																	@endforeach
																</tbody>
															</table>
														</div>
													</div>
												
													<div class="clearfix"></div>
												</div>
											</div>

											<div class="tab-pane" id="tab_4">
												<div class="form-horizontal form-bordered">
													<div class="form-body">
														<div class="col-md-10 col-md-offset-1 col-xs-12">
															@isset($rateToEdit)
																<form action="/settings/editrate/{{$rateToEdit->id}}" method="POST" id="ratesForm">
																	@method('PUT')
															@endisset
															@empty($rateToEdit)
																<form action="/settings/createrate" method="POST" id="ratesForm">
															@endempty
																@csrf
																<div class="form-group">
																	<label class="control-label col-md-3">اسم النسبة</label>
																	<div class="col-md-6">
																		<div class="input-icon">
																			<i class="fa fa-calculator font-green "></i>
																		<input type="text" class="form-control" name="name" id="name" @isset($rateToEdit) value="{{$rateToEdit->name}}" @endisset placeholder=""> 
																		</div>
																	</div>
																</div>
																	
																<div class="form-group">
																	<label class="control-label col-md-3">القيمة</label>
																	<div class="col-md-6">
																		<div class="input-icon">
																			<i class="fa fa-money font-green "></i>
																			<input type="text" class="form-control" name="value" id="value" @isset($rateToEdit) value="{{$rateToEdit->value}}" @endisset placeholder=""> 
																		</div>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="control-label col-md-3">ملاحظات</label>
																	<div class="col-md-6">
																		<textarea class="form-control" rows="5" name="remarques" id="remarques"> @isset($rateToEdit) {{$rateToEdit->remarques}} @endisset</textarea>
																	</div>
																</div>
															</form>
														</div>
													</div>
															
													<div class="form-actions">
														<div class="row">
															<div class="col-md-offset-1 col-md-10 text-center">
																<a href="javascript:;" class="btn btn-lg green" id="ratesFormSubmit">
																<i class="fa fa-check"></i> إضـافة</a>
															</div>
														</div>
													</div>
												</div>
							
												<hr>

												@isset($rates)
													<h4 class="text-center font-purple margin-bottom-5 no-margin">
														جميع النسب
													</h4>
													
													<div class="row">
														<div class="col-md-12 text-center"><hr style="width: 20%;margin: 5px auto 20px auto;"></div>
													</div>
													
													<div class="row">
														<div class="col-md-8 col-md-offset-2 col-xs-12 clearfix">
															<div class="table-responsive">
																<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
																	<thead>
																		<tr>
																			<th class="desktop no-padding">م</th>
																			<th class="min-phone-l">اسم النسبة</th>
																			<th class="min-phone-l">قيمة النسبة</th>
																			<th class="desktop">التفاصيل</th>
																		</tr>
																	</thead>
																	<tbody>
																		@foreach ($rates as $rate)
																			<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $rate->name }}</td>
																				<td>{{ $rate->value }}%</td>
																				<td class="text-center">
																					<div class="btn-group">
																						<a class="btn green-haze btn-outline btn-sm" href="javascript:;" data-toggle="dropdown"  data-close-others="true"> إخـتر الأمـر
																							<i class="fa fa-angle-down"></i>
																						</a>
																						<ul class="dropdown-menu pull-right">
																							<li><a href="{{ route('editRate', $rate->id) }}" class="font-purple"><i class="icon-eye font-purple"></i> عـرض</a></li>
																						<li><a href="#basic" class="font-red" data-toggle="modal" id="{{ "settings/deleterate/".$rate->id }}"><i class="icon-trash font-red"></i> حـذف</a></li>
																						</ul>
																					</div>
																				</td>
																			</tr>
																		@endforeach
																	</tbody>
																</table>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
												@endisset
											</div>
											
											<div class="tab-pane" id="tab_5">
												<div class="row">
													<div class="col-md-3">
														<div class="marketplace__content">  
															<div class="marketplace__aside">
																<div class="filters__container filters__container--vertical filters__container--collapsed">
																	@include('Settings.fltrsRapports', ["banks" => $banks])
																</div>
															</div>
														</div>
													</div>
														
													<div class="line visible-xs-block"></div>
													<div class="col-md-9 clearfix">
														<div class="table-responsive margin-top-40">
															<table class="table table-striped table-bordered table-hover dt-responsive grd_view" width="100%" id="sample_1">
																<thead>
																	<tr>
																		<th class="desktop no-padding">م</th>
																		<th class="min-phone-l">اسم المشروع</th>
																		<th class="min-phone-l">اسم العميل</th>
																		<th class="desktop">نوع النسبة</th>
																		<th class="desktop">قيمة النسبة</th>
																		<th class="desktop">التفاصيل</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>1</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>2</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>3</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>4</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>5</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>6</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>7</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>8</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>9</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>10</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>11</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>12</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>13</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>14</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																	<tr>
																		<td>15</td>
																		<td>تطبيق مياه</td>
																		<td>احمد على</td>
																		<td>عمولة</td>
																		<td>100 ريال</td>
																		<td class="text-center">
																			<a class="btn btn-sm purple btn-outline" href="#"> عـرض
																				<i class="icon-eye font-purple"></i>
																			</a>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
									
                                        </div>
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
					<form action="" method="POST" id="deleteForm">
						@method('DELETE')
						@csrf
						<div class="modal-footer">
							<button type="button" class="btn dark btn-default" data-dismiss="modal">إغلاق</button>
							<button type="submit" class="btn btn-danger">حـذف</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		
		@include('common.scripts')
		
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
			//Submitting the setting form
			$( "#formSubmit" ).click(function() {
				$( "#settingForm" ).submit();
			});
			//Submitting the acounts form
			$( "#acountFormSubmit" ).click(function() {
				$( "#acountForm" ).submit();
			});
			//Submitting the rate form
			$( "#ratesFormSubmit" ).click(function() {
				$( "#ratesForm" ).submit();
			});
			//Submitting the transfer form
			$( "#transfersFormSubmit" ).click(function() {
				$( "#transfersForm" ).submit();
			});

			//update delete form on modal
			$('#basic').on('show.bs.modal', function(e) {
				var $modal = $(this),
					delUrl = e.relatedTarget.id;
				$modal.find('#deleteForm').attr('action', delUrl);
			})

			$(function() {
				var from_acounts = $('#banc_acount_from_id option').clone();
				$('#banc_from').on('change', function() {
					var val = this.value;
					$('#banc_acount_from_id').html( 
						from_acounts.filter(function() {
							if (typeof(this.attributes.bank) == "undefined")
								return false
							return this.attributes.bank.value === val; 
						})
					);
				})
				.change();
			});
			$(function() {
				var to_acounts = $('#banc_acount_to_id option').clone();
				$('#banc_to').on('change', function() {
					var val = this.value;
					$('#banc_acount_to_id').html( 
						to_acounts.filter(function() {
							if (typeof(this.attributes.bank) == "undefined")
								return false
							return this.attributes.bank.value === val; 
						})
					);
				})
				.change();
			});

			$('#transfer_amount').on('input', function(){
				var T = parseInt($(this).val());
				var R = parseInt($('#percent_id option:selected').attr('rate'));
				T -= (T/100)*R ;
				$('#total_amount').val(T).attr('value', T);
			});

			$('#percent_id').on('change', function() {
				var T = parseInt($('#transfer_amount').val());
				var R = parseInt($('#percent_id option:selected').attr('rate'));
				T -= (T/100)*R ;
				$('#total_amount').val(T).attr('value', T);
			});
		</script>
    </body>
</html>