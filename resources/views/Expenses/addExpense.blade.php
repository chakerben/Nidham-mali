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
									
									@empty($expense) <form action="/expenses" method="POST" id="expenseForm"> @endempty
									@isset($expense)
										<form action="/expenses/{{ $expense->id }}" method="POST" id="expenseForm"> 
										@method('PUT')
									@endisset
										@csrf

									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label for="name">اسم المصروف <span>*</span></label>
										<input type="text" name="name" id="name" class="form-control" @isset($expense) value="{{ $expense->name }}" @endisset placeholder=""> 
										</div>
									</div>     
																							
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label for="type_id">النوع <span>*</span></label>
											<select name="type_id" id="type_id" class="form-control select2 select-hide">
												<option>-- إختر --</option>
												@isset($expenseTypes)
													@foreach ($expenseTypes as $expenseType)
														<option value="{{ $expenseType->id }}"@isset($expense) {{ $expense->typeMatch($expenseType->id) ? 'selected="selected"' : '' }} @endisset>{{ $expenseType->name }}</option>
													@endforeach
												@endisset
											</select>
										</div>
									</div>                           
																		
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>التفاصيل</label>
											<textarea name="details" id="details" class="form-control" rows="5">@isset($expense) {{$expense->details}} @endisset</textarea>
										</div>
									</div>
									
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label for="reference_id">اسم المشروع/الخدمة <span>*</span></label>
											<select name="reference_id" id="reference_id" class="form-control select2 select-hide">
												<option>-- إختر --</option>
												@foreach ($projects as $project)
													<option type="2" value="{{ $project->id }}" @isset($expense) {{ $expense->prjMatch($project->id) ? 'selected="selected"' : '' }} @endisset>{{ $project->name }}</option>
												@endforeach
												@foreach ($services as $service)
													<option type="3" value="{{ $service->id }}" @isset($expense) {{ $expense->srvMatch($service->id) ? 'selected="selected"' : '' }} @endisset>{{ $service->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<div class="input-group">
											<label for="prop_id">صاحب المصروف <span>*</span></label>
											<select name="prop_id" id="prop_id" class="form-control select2 ">
												<option></option>
												@isset($listProp)
													@foreach ($listProp as $employee)
														<option value="{{ $employee->id }}" @isset($expense) {{ $expense->empMatch($employee->id) ? 'selected="selected"' : '' }} @endisset>{{ $employee->name }}</option>
													@endforeach
												@endisset
											</select>
											<span class="input-group-btn btn-addon">
												<button type="button" class="btn green" data-toggle="modal" data-target="#exampleModal">عرض البيانات</button>
											</span>
											</div>
										</div>
									</div>
									
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label for="compte_id">الحساب المحول منه <span>*</span></label>
											<select name="compte_id" id="compte_id" class="form-control select2 select-hide">
												<option>-- إختر --</option>
												@isset($bancAcounts)
													@foreach ($bancAcounts as $bancAcount)
														<option value="{{ $bancAcount->id }}" @isset($expense) {{ $expense->acountMatch($bancAcount->id) ? 'selected="selected"' : '' }} @endisset>
															{{ $bancAcount->bank_name }} - {{ $bancAcount->count_num }}
														</option>
													@endforeach
												@endisset
											</select>
										</div>
									</div>
									
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label for="methode_transfert_id">طريقة التحويل <span>*</span></label>
											<select name="methode_transfert_id" id="methode_transfert_id" class="form-control select2 select-hide">
												<option>-- إختر --</option>
												@isset($transferMethodes)
													@foreach ($transferMethodes as $transferMethode)
														<option value="{{ $transferMethode->id }}" @isset($expense) {{ $expense->mTransMatch($transferMethode->id) ? 'selected="selected"' : '' }} @endisset>{{ $transferMethode->name }}</option>
													@endforeach
												@endisset
											</select>
										</div>
									</div>       
																							
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label for="amount">الميلغ <span>*</span></label>
											<select name="amount" id="amount" class="form-control select2 select-hide">
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
											<select id="single10" class="form-control select2 " name="expense_rates[]" id="expense_rates[]" multiple="multiple">
												<option>-- إختر --</option>
												@isset($rates)
													@foreach ($rates as $rate)
														<option value="{{ $rate->id }}" @isset($expense) {{ (in_array($rate->id, $selected)) ? ' selected="selected"' : '' }} @endisset>{{ $rate->name }}</option>
													@endforeach
												@endisset
											</select>
										</div>
									</div>
																		
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>إجمالى المبلغ مع النسبة <span>*</span></label>
											<div class="input-icon">
												<i class="fa fa-money font-green "></i>
												<input type="text" name="total_amount" id="total_amount" class="form-control" placeholder="" disabled> 
											</div>
										</div>
									</div>
									
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label for="single">التاريخ <span>*</span></label>
											<div class="input-icon">
												<i class="fa fa-calendar font-green "></i>
												<input type="text" class="form-control date" name="expense_date" id="expense_date" @isset($expense) value="{{ $expense->expense_date }}" @endisset placeholder="">
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
															<span class="fileinput-filename"> @isset($expense->file) {{ $expense->file }} @endisset </span>
														</div>
														<span class="input-group-addon btn default btn-file">
															<span class="fileinput-new"> إختر المرفق </span>
															<span class="fileinput-exists"> تغيير </span>
															<input type="file" name="..." @isset($expense->file) value="{{ $expense->file }}" @endisset> </span>
														<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
													</div>
												</div>
											</div>
										</div>
								 	</div>
								 
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>ملاحظات</label>
											<textarea name="remarques" id="remarques" class="form-control" rows="5">@isset($expense) {{ $expense->remarques }} @endisset</textarea>
										</div>
									</div>
									
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<hr>
									</div>
								 
									<div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
										<button type="submit" class="btn btn-lg green pull-right margin-right-10">إضافة/تعديل</button>
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
				language: "ar",
				format: "yyyy-mm-dd"
			});
			
			$(function() {
				var reference_id = $('#reference_id option').clone();
				$('#type_id').on('change', function() {
					var val = this.value;

					$('#reference_id').html( 
						reference_id.filter(function() {
							if (typeof(this.attributes.type) == "undefined")
								return false;
							if(val < 4)
								return this.attributes.type.value == val;
							return true;
						})
					);
				})
				.change();
			});
			(function($) {
				$(document).ready(function() {
					$('select#reference_id').bind('change', function() {
					// Fetch selected item's data element value
					var optionId = $(this).children(':selected').attr('type');
					
					// Remove any existing hidden input
					$('input[name="hiden_type"').remove();
					
					// Append new hidden input element
					$('<input>').attr({
						type: 'hidden',
						id: 'hiden_type',
						name: 'hiden_type',
						value: optionId
					}).appendTo('form#expenseForm');
					});
				});
			})(jQuery);
		</script>
    </body>
</html>