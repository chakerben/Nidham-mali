<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
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
                    <h3 class="page-title"> المستخدمين
                        <small></small>
                    </h3>
                    <div class="page-bar">
                        @include('common.breadcrumb', ['section' => 'عنوان القسم', 'route' => 'allUsers', 'page' => 'إضافة عميل'])
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
                                        <span class="caption-subject bold uppercase">إضافة عميل</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                                                    
                                    @empty($client) <form action="/clients" method="POST"> @endempty
										@isset($client)
											<form action="/clients/{{ $client->id }}" method="POST"> 
											@method('PUT')
										@endisset
											@csrf                
                                                                                          
								<div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single0"> الاسم <span>*</span></label>
										<input type="text" class="form-control" name="name" id="name" @isset($client->name) value="{{ $client->name }}" @endisset placeholder="الاسم"> 
									</div>
							     </div>     
                                                                                          
								 <div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label for="single3">طريقة الدفع <span>*</span></label>
										<select id="single3" name="paymentMode" class="form-control select2 select-hide">
                                            <option>-- إختر --</option>
											<option value="1" @isset($client->paymentMode) {{ $client->paymentMode == 1 ? 'selected="selected"' : '' }} @endisset>1</option>
											<option value="2" @isset($client->paymentMode) {{ $client->paymentMode == 2 ? 'selected="selected"' : '' }} @endisset>2</option>
											<option value="3" @isset($client->paymentMode) {{ $client->paymentMode == 3 ? 'selected="selected"' : '' }} @endisset>3</option>
											<option value="4" @isset($client->paymentMode) {{ $client->paymentMode == 4 ? 'selected="selected"' : '' }} @endisset>4</option>
                                        </select>
									</div>
							    </div>                          
                                                                     
								<div class="col-md-6 col-md-offset-3 col-sm-12">
									<div class="form-group">
										<label>نبذة</label>
										<textarea name="details" id="details" class="form-control" rows="5">@isset($client->details) {{ $client->details }} @endisset</textarea>
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
													<span class="fileinput-filename"> @isset($project->file) {{ $project->file }} @endisset </span>
												</div>
												<span class="input-group-addon btn default btn-file">
													<span class="fileinput-new"> إختر المرفق </span>
													<span class="fileinput-exists"> تغيير </span>
													<input type="file" name="..." @isset($project->file) value="{{ $project->file }}" @endisset> </span>
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
									
                   <button type="submit" class="btn btn-lg green pull-right margin-right-10">إضافة/تعديل</button>
                   
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
                
                //Date Pickers
                $('.date').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    language: "ar"
                });
            });
		</script>
        
    </body>

</html>