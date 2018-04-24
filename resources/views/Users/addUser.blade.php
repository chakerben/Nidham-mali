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
									@empty($user) <form action="{{route('users.store', [], true)}}" method="POST" id="formUser"> @endempty
									@isset($user)
										<form action="{{route('users.update', $user->id, true)}}" method="POST" id="formUser"> 
										@method('PUT')
									@endisset
										@csrf
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label for="single0">اسم المستخدم <span>*</span></label>
												<input type="text" class="form-control" name="name" id="name" @isset($user) value="{{$user->name}}" @endisset> 
											</div>
										</div>             
																							
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label for="single0">الايميل <span>*</span></label>
												<input type="email" class="form-control" name="email" id="email" @isset($user) value="{{$user->email}}" @endisset> 
											</div>
										</div>              
																							
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label for="single0">رقم الجوال <span>*</span></label>
												<input type="text" class="form-control" name="phone" id="phone" @isset($user) value="{{$user->phone}}" @endisset> 
											</div>
										</div>
										
										@empty($user)
											<div class="col-md-6 col-md-offset-3 col-sm-12">
												<div class="form-group">
													<label for="single0">كلمة المرور <span>*</span></label>
													<input type="password" class="form-control" name="password" id="password"> 
												</div>
											</div>
										@endempty
																			
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label>نبذة</label>
												<textarea class="form-control" rows="5" name="description" id="description">@isset($user) {{$user->description}} @endisset</textarea>
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
										@isset($user) <?php $allPermissions = unserialize($user->permissions); ?> @endisset
										<div class="col-md-10 col-md-offset-1 col-sm-12">
											<fieldset>
												<legend class="font-purple">الصلاحية</legend>
												<div class="form-group">
													<label class="font-purple"><h4>المشاريع</h4></label>
													<div class="input-group">
														<div class="icheck-inline">
															<!--@foreach($allPermissions["PrjPerms"] as $key => $val)
																<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="{{$key}}" id="{{$key}}" {{$val ? 'checked' : ''}}> تعديل </label>
															@endforeach-->
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PrjA" id="PrjA" {{$allPermissions["PrjPerms"]["PrjA"] ? 'checked' : ''}}> إضافة </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PrjU" id="PrjU" {{$allPermissions["PrjPerms"]["PrjU"] ? 'checked' : ''}}> تعديل </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PrjD" id="PrjD" {{$allPermissions["PrjPerms"]["PrjD"] ? 'checked' : ''}}> حذف </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PrjS" id="PrjS" {{$allPermissions["PrjPerms"]["PrjS"] ? 'checked' : ''}}> عرض </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PrjT" id="PrjT" {{$allPermissions["PrjPerms"]["PrjT"] ? 'checked' : ''}}> تحميل </label>
														</div>
													</div>
												</div>
												<hr>
												<div class="form-group">
													<label class="font-purple"><h4>الخدمات</h4></label>
													<div class="input-group">
														<div class="icheck-inline">
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SrvA" id="SrvA" {{$allPermissions["SrvPerms"]["SrvA"] ? 'checked' : ''}}> إضافة </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SrvU" id="SrvU" {{$allPermissions["SrvPerms"]["SrvU"] ? 'checked' : ''}}> تعديل </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SrvD" id="SrvD" {{$allPermissions["SrvPerms"]["SrvD"] ? 'checked' : ''}}> حذف </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SrvS" id="SrvS" {{$allPermissions["SrvPerms"]["SrvS"] ? 'checked' : ''}}> عرض </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SrvT" id="SrvT" {{$allPermissions["SrvPerms"]["SrvT"] ? 'checked' : ''}}> تحميل </label>
														</div>
													</div>
												</div>
												<hr>
												<div class="form-group">
													<label class="font-purple"><h4>المدفوعات</h4></label>
													<div class="input-group">
														<div class="icheck-inline">
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PayA" id="PayA" {{$allPermissions["PayPerms"]["PayA"] ? 'checked' : ''}}> إضافة </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PayU" id="PayU" {{$allPermissions["PayPerms"]["PayU"] ? 'checked' : ''}}> تعديل </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PayD" id="PayD" {{$allPermissions["PayPerms"]["PayD"] ? 'checked' : ''}}> حذف </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PayS" id="PayS" {{$allPermissions["PayPerms"]["PayS"] ? 'checked' : ''}}> عرض </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PayU1" id="PayU1" {{$allPermissions["PayPerms"]["PayU1"] ? 'checked' : ''}}> تحميل سند صرف </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="PayU2" id="PayU2" {{$allPermissions["PayPerms"]["PayU2"] ? 'checked' : ''}}> تحميل سند قبض </label>
														</div>
													</div>
												</div>
												<hr>
												<div class="form-group">
													<label class="font-purple"><h4>المصروفات</h4></label>
													<div class="input-group">
														<div class="icheck-inline">
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="ExpA"  id="ExpA"  {{$allPermissions["ExpPerms"]["ExpA"]  ? 'checked' : ''}}> إضافة </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="ExpU"  id="ExpU"  {{$allPermissions["ExpPerms"]["ExpU"]  ? 'checked' : ''}}> تعديل </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="ExpD"  id="ExpD"  {{$allPermissions["ExpPerms"]["ExpD"]  ? 'checked' : ''}}> حذف </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="ExpS"  id="ExpS"  {{$allPermissions["ExpPerms"]["ExpS"]  ? 'checked' : ''}}> عرض </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="ExpU1" id="ExpU1" {{$allPermissions["ExpPerms"]["ExpU1"] ? 'checked' : ''}}> تحميل سند صرف </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="ExpU2" id="ExpU2" {{$allPermissions["ExpPerms"]["ExpU2"] ? 'checked' : ''}}> تحميل سند قبض </label>
														</div>
													</div>
												</div>
												<hr>
												<div class="form-group">
													<label class="font-purple"><h4>الاعدادات</h4></label>
													<div class="input-group">
														<div class="icheck-inline">
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SetAg" id="SetAg" {{$allPermissions["SetPerms"]["SetAg"] ? 'checked' : ''}}> إضافة فى عام </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SetUg" id="SetUg" {{$allPermissions["SetPerms"]["SetUg"] ? 'checked' : ''}}> تعديل فى عام </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SetAa" id="SetAa" {{$allPermissions["SetPerms"]["SetAa"] ? 'checked' : ''}}> إضافة فى حسابات الشركة </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SetUa" id="SetUa" {{$allPermissions["SetPerms"]["SetUa"] ? 'checked' : ''}}> تعديل فى حسابات الشركة </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SetAt" id="SetAt" {{$allPermissions["SetPerms"]["SetAt"] ? 'checked' : ''}}> عمل تحويل بين الحسابات </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="SetAr" id="SetAr" {{$allPermissions["SetPerms"]["SetAr"] ? 'checked' : ''}}> إضافة نسبة </label>
														</div>
													</div>
												</div>
												<hr>
												<div class="form-group">
													<label class="font-purple"><h4>المستخدمين</h4></label>
													<div class="input-group">
														<div class="icheck-inline">
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrAu" id="UsrAu" {{$allPermissions["UsrPerms"]["UsrAu"] ? 'checked' : ''}}> إضافة مستخدم </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrAc" id="UsrAc" {{$allPermissions["UsrPerms"]["UsrAc"] ? 'checked' : ''}}> إضافة عميل </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrAe" id="UsrAe" {{$allPermissions["UsrPerms"]["UsrAe"] ? 'checked' : ''}}> إضافة مقدم خدمة </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrUu" id="UsrUu" {{$allPermissions["UsrPerms"]["UsrUu"] ? 'checked' : ''}}> تعديل مستخدم </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrUc" id="UsrUc" {{$allPermissions["UsrPerms"]["UsrUc"] ? 'checked' : ''}}> تعديل عميل </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrUe" id="UsrUe" {{$allPermissions["UsrPerms"]["UsrUe"] ? 'checked' : ''}}> تعديل مقدم خدمة </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrDu" id="UsrDu" {{$allPermissions["UsrPerms"]["UsrDu"] ? 'checked' : ''}}> حذف مستخدم </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrDc" id="UsrDc" {{$allPermissions["UsrPerms"]["UsrDc"] ? 'checked' : ''}}> حذف عميل </label>
															<label><input type="checkbox" class="icheck" data-checkbox="icheckbox_square-purple" name="UsrDe" id="UsrDe" {{$allPermissions["UsrPerms"]["UsrDe"] ? 'checked' : ''}}> حذف مقدم خدمة </label>
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
																<span class="fileinput-filename"> @isset($user->photo) {{ $user->photo }} @endisset </span>
															</div>
															<span class="input-group-addon btn default btn-file">
																<span class="fileinput-new"> إختر المرفق </span>
																<span class="fileinput-exists"> تغيير </span>
																<input type="file" name="photo" @isset($user->photo) value="{{ $user->photo }}" @endisset> </span>
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
											<button type="submit" class="btn btn-lg green margin-right-10">إضافة/تعديل</button>
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
                language: "ar"
            });
		</script>
    </body>
</html>