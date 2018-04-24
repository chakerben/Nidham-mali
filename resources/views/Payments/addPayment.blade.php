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
                    <h3 class="page-title"> المدفوعات <small></small> </h3>
                    <div class="page-bar">
						@include('common.breadcrumb', ['section' => 'المدفوعات', 'route' => 'payments.index', 'page' => 'إضافة دفعة'])
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
                                        <span class="caption-subject bold uppercase">إضافة دفعة</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">

									@empty($payment) <form action="{{route('payments.store', [], true)}}" method="POST"> @endempty
									@isset($payment)
										<form action="{{route('payments.update', $payment->id, true)}}" method="POST"> 
										@method('PUT')
									@endisset
										@csrf

										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label for="project">اسم المشروع <span>*</span></label>
												<select id="project" name="project" class="form-control select2 ">
													<option></option>
													@isset($projects)
														@empty($payment)
															@foreach ($projects as $project)
																<option value="{{$project->id}}">{{$project->name}}</option>
															@endforeach
														@endempty
														@isset($payment->tranche->project)
															@foreach ($projects as $project)
																<option value="{{$project->id}}" {{ $project->prjMatch($payment->tranche->project->id) ? 'selected="selected"' : '' }}>{{$project->name}}</option>
															@endforeach
														@endisset
													@endisset
												</select>
											</div>
										</div>

										<!-- tranche id -->
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label for="tranche_id">رقم الدفعة <span>*</span></label>
												<select id="tranche_id" name="tranche_id" class="form-control select2">
													@empty($payment) <option></option> @endempty
													@isset($payment->tranche->project)
														@foreach ($payment->tranche->project->Tranches()->get() as $tr)
															<option value="{{$tr->id}}" {{ ($payment->trMatch($tr->id)) ? 'selected="selected"' : '' }} >{{ $loop->iteration }}</option>
														@endforeach
													@endisset
												</select>
											</div>
										</div>
										
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label>مبلغ الدفعة <span>*</span></label>
												<div class="input-icon">
													<i class="fa fa-money font-green "></i>
													<input type="text" id="tranchAmount" class="form-control" placeholder="" @isset($payment->tranche) value="{{$payment->tranche->amount}}" @endisset disabled> 
												</div>
											</div>
										</div>
										
										<!-- payment amount -->								
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label>المبلغ المدفوع <span>*</span></label>
												<div class="input-icon">
													<i class="fa fa-money font-green "></i>
													<input name="amount" id="amount" type="text" class="form-control" @isset($payment) value="{{$payment->amount}}" @endisset placeholder=""> 
												</div>
											</div>
										</div> 
										
										<!-- payment type -->
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label for="type">نوع الدفعة <span>*</span></label>
												<select id="type" name="type" class="form-control select2 select-hide">
													<option value="0">-- إختر --</option>
													<option value="1" @isset($payment) {{($payment->type == 1) ? 'selected="selected"' : ''}} @endisset>شيك</option>
													<option value="2" @isset($payment) {{($payment->type == 2) ? 'selected="selected"' : ''}} @endisset>باى بال</option>
													<option value="3" @isset($payment) {{($payment->type == 3) ? 'selected="selected"' : ''}} @endisset>كاش</option>
												</select>
											</div>
										</div>                              
																			
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label>الباقى <span>*</span></label>
												<div class="input-icon">
													<i class="fa fa-money font-green "></i>
												<input type="text" id="restAmount" name="restAmount" class="form-control" @isset($payment) value="{{$payment->tranche->amount - $payment->amount}}" @endisset readonly> 
												</div>
											</div>
										</div>
										
										<!-- payment bank to -->
										<div class="col-md-6 col-md-offset-3 col-sm-12">                  
											<div class="form-group">
												<label for="bank_to_id">البنك المحول اليه <span>*</span></label>
												<select id="bank_to_id" name="bank_to_id" class="form-control select2 ">
													<option></option>
													<option value="1" @isset($payment) {{($payment->bank_to_id == 1) ? 'selected="selected"' : ''}} @endisset>1</option>
													<option value="2" @isset($payment) {{($payment->bank_to_id == 2) ? 'selected="selected"' : ''}} @endisset>2</option>
													<option value="3" @isset($payment) {{($payment->bank_to_id == 3) ? 'selected="selected"' : ''}} @endisset>3</option>
													<option value="4" @isset($payment) {{($payment->bank_to_id == 4) ? 'selected="selected"' : ''}} @endisset>4</option>
												</select>
											</div>
										</div>  
																				
										<div class="col-md-6 col-md-offset-3 col-sm-12">                   
											<div class="form-group">
												<label for="single">رقم الحساب </label>
												<input type="text" class="form-control" placeholder="" disabled> 
											</div>  
										</div>
										
										<div class="col-md-6 col-md-offset-3 col-sm-12"> <hr> </div>
										
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<fieldset id="check" @isset($payment) {!! ($payment->type != 1) ? 'style="display:none;"' : '' !!} @endisset @empty($payment) style="display: none;" @endempty>
												<legend class="font-purple">
													شيك
												</legend>
												
												<!-- payment bank from -->
												<div class="form-group">
													<label for="bank_from_id">اسم البنك <span>*</span></label>
													<select id="bank_from_id" name="bank_from_id" class="form-control select2 ">
														<option></option>
														<option value="1" @isset($payment) {{($payment->bank_from_id == 1) ? 'selected="selected"' : ''}} @endisset>1</option>
														<option value="2" @isset($payment) {{($payment->bank_from_id == 2) ? 'selected="selected"' : ''}} @endisset>2</option>
														<option value="3" @isset($payment) {{($payment->bank_from_id == 3) ? 'selected="selected"' : ''}} @endisset>3</option>
														<option value="4" @isset($payment) {{($payment->bank_from_id == 4) ? 'selected="selected"' : ''}} @endisset>4</option>
													</select>
												</div>
												
												<!-- chek date -->
												<div class="form-group">
													<label for="single">تاريخ <span>*</span></label>
													<div class="input-icon">
														<i class="fa fa-calendar font-green "></i>
														<input type="text" class="form-control date" name="date_payment" id="date_payment" @isset($payment) value="{{ $payment->date_payment }}" @endisset placeholder="">
													</div>
												</div>
												
												<!-- chek number -->
												<div class="form-group">
													<label for="single">رقم الشيك <span>*</span></label>
													<input type="text" name="chek_number" id="chek_number" class="form-control" @isset($payment) value="{{ $payment->chek_number }}" @endisset placeholder=""> 
												</div>
											</fieldset> 
										</div> 
										
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<fieldset id="transfer" @isset($payment) {!! ($payment->type != 3) ? 'style="display:none;"' : '' !!} @endisset @empty($payment) style="display: none;" @endempty>
												<legend class="font-purple">
													تحويل
												</legend>
												
												<!-- person transfert id -->
												<div class="form-group">
													<label for="person_transfer_id">اسم المحول <span>*</span></label>
													<select id="person_transfer_id" name="person_transfer_id" class="form-control select2 ">
														<option></option>
														<option value="1" @isset($payment) {{($payment->person_transfer_id == 1) ? 'selected="selected"' : ''}} @endisset>1</option>
														<option value="2" @isset($payment) {{($payment->person_transfer_id == 2) ? 'selected="selected"' : ''}} @endisset>2</option>
														<option value="3" @isset($payment) {{($payment->person_transfer_id == 3) ? 'selected="selected"' : ''}} @endisset>3</option>
														<option value="4" @isset($payment) {{($payment->person_transfer_id == 4) ? 'selected="selected"' : ''}} @endisset>4</option>
													</select>
												</div>
												
												<!-- chek date -->
												<div class="form-group">
													<label for="single">تاريخ <span>*</span></label>
													<div class="input-icon">
														<i class="fa fa-calendar font-green "></i>
														<input type="text" class="form-control date" name="date_payment" id="date_payment" @isset($payment) value="{{ $payment->date_payment }}" @endisset placeholder="">
													</div>
												</div>
											</fieldset>
										</div>

										<div class="col-md-6 col-md-offset-3 col-sm-12"> 
											<fieldset id="paypal" @isset($payment) {!! ($payment->type != 2) ? 'style="display:none;"' : '' !!} @endisset @empty($payment) style="display: none;" @endempty>
												<legend class="font-purple">
													باى بال
												</legend>
												
												<!-- paypal acount -->
												<div class="form-group">
													<label for="single">حساب الباى بال <span>*</span></label>
													<input type="email" name="paypal_acount" id="paypal_acount" class="form-control" @isset($payment) value="{{ $payment->paypal_acount }}" @endisset placeholder=""> 
												</div>
											</fieldset> 
										</div>
										
										<div class="col-md-6 col-md-offset-3 col-sm-12"> <hr> </div>
										
										<div class="col-md-6 col-md-offset-3 col-sm-12">
											<div class="form-group">
												<label>مرفق</label>
												<div class="col-md-12">
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="input-group input-large">
														<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
															<i class="fa fa-file fileinput-exists"></i>&nbsp;
															<span class="fileinput-filename"> @isset($payment->file) {{ $payment->file }} @endisset </span>
														</div>
														<span class="input-group-addon btn default btn-file">
															<span class="fileinput-new"> إختر المرفق </span>
															<span class="fileinput-exists"> تغيير </span>
															<input type="file" name="upload" @isset($payment->file) value="{{ $payment->file }}" @endisset> </span>
														<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
													</div>
												</div>
												</div>
											</div>
										</div>
										
										<div class="col-md-6 col-md-offset-3 col-sm-12"> <hr> </div>
																
										<div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
											<button type="submit" class="btn green pull-right margin-right-10">إضافة/تعديل</button>
										</div>
										<div class="clearfix"></div>
									</form>
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
			$(document).on('ready', function() {
				// Without Search
				$(".select-hide").select2({
					dir: "rtl",
					minimumResultsForSearch: Infinity
				});
				
				$('#type').on('change', function() {
					var vl = $("#type :selected").val();
					switch(vl) {
						case '1':
							$("#check").slideDown();
							$("#paypal").hide();
							$("#transfer").hide();
							break;
						case '2':
							$("#paypal").slideDown();
							$("#check").hide();
							$("#transfer").hide();
							break;
						case '3':
							$("#transfer").slideDown();
							$("#check").hide();
							$("#paypal").hide();
							break;
						default:
					}
				});		
			});
				
			//Date Pickers
			$('.date').datepicker({
				autoclose: true,
				todayHighlight: true,
				language: "ar",
				format: "yyyy-mm-dd"
			});

			$('#project').on('change', function(){
				var id = $(this).val();
				$.getJSON("/api/projectTranches/" + id , function(data){
					console.log(data);
					var subcat = $('#tranche_id').empty();
					$.each(data, function(key, value){
						var option = $('<option/>').val(value.id).text(key+1).attr("amount", value.amount);
            			subcat.append(option);
					});
				});
			});

			$('#tranche_id').on('change', function(){
				var trAmount = $('option:selected', this).attr('amount');
				$('#tranchAmount').val(trAmount);
				$('#restAmount').val(trAmount);
			});

			$('#amount').on('input', function(){
				var trAmount = $('#tranchAmount').val();
				var payAmount = $(this).val();
				$('#restAmount').val(trAmount-payAmount).attr('value', trAmount-payAmount);
			});
		</script>
    </body>
</html>