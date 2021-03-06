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
                        @include('common.breadcrumb', ['section' => 'المشاريع والخدمات', 'route' => 'allProjectsAndServices', 'page' => 'إضافة مشروع'])
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
                                        <span class="caption-subject bold uppercase">إضافة مشروع</span>
                                    </div>
                                    
                   					<button type="button" class="btn green pull-right"><i class="icon-check"></i> إستلام المشروع </button>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
									@empty($project) <form action="{{route('projects.store', [], true)}}" method="POST" enctype="multipart/form-data"> @endempty
										@isset($project)
											<form action="{{route('projects.update', $project->id, true)}}" method="POST" enctype="multipart/form-data"> 
											@method('PUT')
										@endisset
											@csrf

									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>اسم المشروع <span>*</span></label>
											<div class="input-icon">
												<i class="fa fa-file font-green "></i>
												<input type="text" class="form-control" name="name" id="name" @isset($project->name) value="{{ $project->name }}" @endisset placeholder="اسم المشروع"> 
											</div>
										</div>
									</div>
																		
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>التاريخ <span>*</span></label>
											<div class="input-group date-picker input-daterange" data-date="24-02-2018" data-date-format="dd-mm-yyyy">
												<input type="text" class="form-control date col-md-6" name="begin_at" id="begin_at" @isset($project->begin_at) value="{{ $project->begin_at }}" @endisset placeholder="من تاريخ">
												<span class="input-group-addon small-sp">  </span>
												<input type="text" class="form-control date col-md-6" name="end_at" id="end_at" @isset($project->end_at) value="{{ $project->end_at }}" @endisset placeholder="إلى تاريخ"> 
											</div>
										</div>
									</div>                           
																		
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>التفاصيل</label>
											<textarea class="form-control" name="details" id="details" rows="5"> @isset($project->details) {{ $project->details }} @endisset </textarea>
										</div>
									</div>
																		
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label for="single" name="client_id">العميل <span>*</span></label>
											<select id="single" name="client_id" class="form-control select2">
												<option></option>
												@foreach ($clients as $client)
													<option value="{{$client->id}}" @isset($project) {{ $project->cliMatch($client->id) ? 'selected="selected"' : '' }} @endisset>
														{{$client->name}}
													</option>
												@endforeach
											</select>
										</div>
									</div>                           
																		
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>تكلفة المشروع <span>*</span></label>
											<div class="input-icon">
												<i class="fa fa-money font-green "></i>
												<input type="text" class="form-control" name="cost" id="cost" @isset($project->cost) value="{{ $project->cost }}" @endisset placeholder=""> 
											</div>
										</div>
									</div>
									
									<div class="col-md-6 col-md-offset-3 col-sm-12">                                   
										<fieldset>
											<legend> الدفعات </legend>
																
											<div class="form-group">
												<div class="col-md-12"> 
												<label for="payment-num">عدد الدفعات <span>*</span></label>
												<select name="payment-num" id="payment-num" class="form-control select-hide select2">
													<option value="0">-- إختر --</option>
													@for ($i = 1; $i < 5; $i++)
														<option value="{{$i}}" @isset($project->Tranches) {{count($project->Tranches) === $i ? 'selected="selected"' : '' }} @endisset>{{$i}}</option>
													@endfor
												</select>
												</div>
											</div>
											
											<div id="payment-container" style="display: none;">
												<label>تواريخ الدفعات <span>*</span></label>
												<ol id="payment-list">
													<!--<li>
														<div class="form-inline">
														<div class="form-group">
															<label class="sr-only"> </label>
															<div class="input-icon">
															<i class="fa fa-money font-green"></i>
															<input type="email" class="form-control w-100" placeholder="القيمة" > </div>
														</div>
														<div class="form-group">
															<label class="sr-only">تاريخ الدفعة</label>
															<div class="input-icon">
															<i class="fa fa-calendar-check-o font-green "></i>
															<input type="password" class="form-control date" placeholder="تاريخ الدفعة"> </div>
														</div>
														</div>
														<hr>
													</li>
													<li>
														<div class="form-inline">
														<div class="form-group">
															<label class="sr-only"> </label>
															<div class="input-icon">
															<i class="fa fa-money font-green"></i>
															<input type="email" class="form-control w-100" placeholder="القيمة" > </div>
														</div>
														<div class="form-group">
															<label class="sr-only">تاريخ الدفعة</label>
															<div class="input-icon">
															<i class="fa fa-calendar-check-o font-green "></i>
															<input type="password" class="form-control date" placeholder="تاريخ الدفعة"> </div>
														</div>
														</div>
														<hr>
													</li>-->
												</ol>
											</div>
										</fieldset> 
									</div>
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>مرفق</label>
											<div class="col-md-12">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="input-group input-large">
													<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
														<i class="fa fa-file fileinput-exists"></i>&nbsp;
														<span class="fileinput-filename"> @isset($project->file) {{ $project->file }} @endisset </span>
													</div>
													<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new"> إختر المرفق </span>
														<span class="fileinput-exists"> تغيير </span>
															<input type="file" id="upload" name="upload" @isset($project->file) value="{{ $project->file }}" @endisset>
														</span>
													<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
												</div>
											</div>
											</div>
										</div>
									</div>                     
																		
									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<div class="form-group">
											<label>ملاحظات</label>
											<textarea class="form-control" name="remarques" id="remarques" rows="5">@isset($project->remarques) {{ $project->remarques }} @endisset</textarea>
										</div>
									</div>
									

									<div class="col-md-6 col-md-offset-3 col-sm-12">
										<hr>
									</div>
									
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
			var costFirst = true;

			function calcul() {
				var cost = $("#cost").val();
				var count = $("#payment-list li").length;

				if (costFirst) {
					var rest = parseInt(cost);
					for (let i = 0; i < count-1; i++) {
						rest -= ($("#tanche_"+(i+1)+"_amount").val()) ? parseInt($("#tanche_"+(i+1)+"_amount").val()) : 0;
					}
					$("#tanche_"+count+"_amount").val(rest);
				} else {
					var total = 0;
					for (let i = 0; i < count; i++) {
						total += ($("#tanche_"+(i+1)+"_amount").val()) ? parseInt($("#tanche_"+(i+1)+"_amount").val()) : 0;
					}
					$("#cost").val(total);
				}
			}

			$(document).on('ready', function() {
				// Without Search
				$(".select-hide").select2({
					dir: "rtl",
					minimumResultsForSearch: Infinity
				});
				
				$('#payment-num').on('change', function() {
					$("#payment-container").slideDown();
					//Récupérer le nombre de tranches
					var num = $('#payment-num :selected').text();

					//Désactiver le champs du cout total du projet
					$("#cost").prop('readonly', (num != '-- إختر --'));
					costFirst = $("#cost").val() ? true : false;

					//Récupérer la liste des tranches du projet (mode édition)
					@isset($project) var trs = {!! $project->tranches !!} @endisset;
					@empty($project) var trs = []; @endempty
					//Vider la liste des tranche
					$("#payment-list li").remove();
					//Liste dynamique des tranches
					if(trs.length<num){
						for (let i = 0; i < trs.length ; i++) {
							$("#payment-list").append('<li><div class="form-inline"><div class="form-group"><label class="sr-only">القيمة</label><div class="input-icon"><i class="fa fa-money font-green"></i><input type="text" name="tranche_'+(i+1)+'_amount" id="tanche_'+(i+1)+'_amount" class="form-control w-100" value="'+trs[i].amount+'" placeholder="القيمة" oninput="calcul()" ></div></div><div class="form-group"><label class="sr-only">تاريخ الدفعة</label><div class="input-icon"><i class="fa fa-calendar-check-o font-green "></i><input type="text" name="tranche_'+(i+1)+'_date" id="tanche_'+(i+1)+'_date" class="form-control date" value="'+trs[i].date_tranche+'" placeholder="تاريخ الدفعة"></div></div></div><hr></li>');
						}
						for (i = trs.length; i < num; i++) {
							$("#payment-list").append('<li><div class="form-inline"><div class="form-group"><label class="sr-only">القيمة</label><div class="input-icon"><i class="fa fa-money font-green"></i><input type="text" name="tranche_'+(i+1)+'_amount" id="tanche_'+(i+1)+'_amount" class="form-control w-100" placeholder="القيمة" oninput="calcul()" ></div></div><div class="form-group"><label class="sr-only">تاريخ الدفعة</label><div class="input-icon"><i class="fa fa-calendar-check-o font-green "></i><input type="text" name="tranche_'+(i+1)+'_date" id="tanche_'+(i+1)+'_date" class="form-control date" placeholder="تاريخ الدفعة"></div></div></div><hr></li>');
						}
					} else {
						for (let i = 0; i < num ; i++) {
							$("#payment-list").append('<li><div class="form-inline"><div class="form-group"><label class="sr-only">القيمة</label><div class="input-icon"><i class="fa fa-money font-green"></i><input type="text" name="tranche_'+(i+1)+'_amount" id="tanche_'+(i+1)+'_amount" class="form-control w-100" value="'+trs[i].amount+'" placeholder="القيمة" oninput="calcul()" ></div></div><div class="form-group"><label class="sr-only">تاريخ الدفعة</label><div class="input-icon"><i class="fa fa-calendar-check-o font-green "></i><input type="text" name="tranche_'+(i+1)+'_date" id="tanche_'+(i+1)+'_date" class="form-control date" value="'+trs[i].date_tranche+'" placeholder="تاريخ الدفعة"></div></div></div><hr></li>');
						}
					}

					$("#tanche_" + num + "_amount").prop('readonly', costFirst).val($("#cost").val());
				});
				
				var num = $('#payment-num :selected').text();
				if (num != '-- إختر --') {
					@isset($project) var trs = {!! $project->tranches !!} @endisset;
					@empty($project) var trs = []; @endempty
					$("#payment-container").slideDown();
					$("#payment-list li").remove();
					for (i = 0; i < num; i++) {
						$("#payment-list").append('<li><div class="form-inline"><div class="form-group"><label class="sr-only">القيمة</label><div class="input-icon"><i class="fa fa-money font-green"></i><input type="text" name="tranche_'+(i+1)+'_amount" id="tanche_'+(i+1)+'_amount" class="form-control w-100" value="'+trs[i].amount+'" placeholder="القيمة" ></div></div><div class="form-group"><label class="sr-only">تاريخ الدفعة</label><div class="input-icon"><i class="fa fa-calendar-check-o font-green "></i><input type="text" name="tranche_'+(i+1)+'_date" id="tanche_'+(i+1)+'_date" class="form-control date" value="'+trs[i].date_tranche+'" placeholder="تاريخ الدفعة"></div></div></div><hr></li>');
					}
				}
				
				$("#payment-container").delegate("input[type=text].date", "focusin", function(){
					$(this).datepicker({
						autoclose: true,
						todayHighlight: true,
						language: "ar",
						format: "yyyy-mm-dd"
					});
				});
			});	
			
			//Date Pickers
			$('.date').datepicker({
				autoclose: true,
				todayHighlight: true,
				language: "ar",
				format: "yyyy-mm-dd"
			});
		</script>
    </body>
</html>