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
                        @include('common.breadcrumb', ['section' => 'المستخدمين', 'route' => 'allUsers', 'page' => 'إضافة مقدم خدمة'])
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
                                        <span class="caption-subject bold uppercase">إضافة مقدم خدمة</span>
                                    </div>
                                    
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    @empty($employee) <form action="{{route('employees.store', [], true)}}" method="POST" id="formEmployee"> @endempty
                                    @isset($employee)
                                        <form action="{{route('employees.update', $employee->id, true)}}" method="POST" id="formEmployee"> 
                                        @method('PUT')
                                    @endisset
                                        @csrf
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="single0">الاسم <span>*</span></label>
                                            <input type="text" class="form-control" name="name" id="name" @isset($employee) value="{{$employee->name}}" @endisset> 
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="single1">مهامة <span>*</span></label>
                                                <select id="single1" class="form-control select2 select-hide" name="role_id" id="role_id">
                                                    <option>-- إختر --</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{$role->id}}" @isset($employee) {{ $employee->cliMatch($role->id) ? 'selected="selected"' : '' }} @endisset>
                                                            {{$role->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>                           
                                                                            
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label>نبذة</label>
                                                <textarea class="form-control" rows="5" name="details" id="details">@isset($employee) {{$employee->details}} @endisset</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="transfer-type">طريقة التحويل <span>*</span></label>
                                                <select id="transfer-type" class="form-control select2 select-hide" name="transfer_method_id" id="transfer_method_id">
                                                    <option value="0">-- إختر --</option>
                                                    <option value="1" @isset($employee) {{ $employee->transfer_method_id == 1 ? 'selected="selected"' : '' }} @endisset>باى بال</option>
                                                    <option value="2" @isset($employee) {{ $employee->transfer_method_id == 2 ? 'selected="selected"' : '' }} @endisset>بـنـك</option>
                                                    <option value="3" @isset($employee) {{ $employee->transfer_method_id == 3 ? 'selected="selected"' : '' }} @endisset>أخــرى</option>
                                                </select>
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
                                                            <span class="fileinput-filename"> @isset($employee->file) {{ $employee->file }} @endisset </span>
                                                        </div>
                                                        <span class="input-group-addon btn default btn-file">
                                                            <span class="fileinput-new"> إختر المرفق </span>
                                                            <span class="fileinput-exists"> تغيير </span>
                                                            <input type="file" name="upload" @isset($employee->file) value="{{ $employee->file }}" @endisset> </span>
                                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        
                                        @isset($employee)
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <fieldset id="paypal" style="display: none;">
                                                <legend class="font-purple">باى بال </legend>
                                                
                                                <form action="{{route('addEmpPaypalAcount', $employee->id, true)}}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>الايميل <span>*</span></label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-envelope font-green "></i>
                                                            <input type="text" class="form-control" name="email" id="email" placeholder=""> 
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
                                                                        <th> الايميل </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($employee->PaypalAcounts as $acount)
                                                                    <tr>
                                                                        <td> {{ $acount->id }} </td>
                                                                        <td> {{ $acount->email }} </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <!--<tr>
                                                                        <td> 2 </td>
                                                                        <td> name@domain.com </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 3 </td>
                                                                        <td> name@domain.com </td>
                                                                    </tr>-->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset> 
                                        </div>
                                        
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <fieldset id="bank" style="display: none;">
                                                <legend class="font-purple">بـنـك</legend>
                                                
                                                <form action="{{route('addEmpBankAcount', $employee->id, true)}}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>اسم البنك </label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-bank font-green "></i>
                                                            <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder=""> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>رقم الحساب </label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-barcode font-green "></i>
                                                            <input type="text" class="form-control" name="acount_num" id="acount_num" placeholder=""> 
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
                                                                        <th> اسم البنك </th>
                                                                        <th> رقم الحساب </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($employee->BankAcounts as $acount)
                                                                    <tr>
                                                                        <td> {{ $acount->id }} </td>
                                                                        <td> {{ $acount->bank_name }} </td>
                                                                        <td> {{ $acount->acount_num }} </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <!--<tr>
                                                                        <td> 2 </td>
                                                                        <td> بنك مصر </td>
                                                                        <td> 562-251-215 </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 3 </td>
                                                                        <td> بنك الرجحى </td>
                                                                        <td> 562-251-215 </td>
                                                                    </tr>-->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset> 
                                        </div>
                                        
                                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                                            <fieldset id="other" style="display: none;">
                                                <legend class="font-purple">أخــرى</legend>

                                                <form action="{{route('addEmpTransferMethod', $employee->id, true)}}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>طريقة التحويل </label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-random font-green "></i>
                                                            <input type="text" class="form-control" name="name" id="name" placeholder=""> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>الرقم </label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-barcode font-green "></i>
                                                            <input type="text" class="form-control" name="acount_num" id="acount_num" placeholder=""> 
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
                                                                        <th> رقم الحساب </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($employee->OtherTransferMethods as $acount)
                                                                        <tr>
                                                                            <td> {{ $acount->id }} </td>
                                                                            <td> {{ $acount->name }} </td>
                                                                            <td> {{ $acount->acount_num }} </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <!--<tr>
                                                                        <td> 2 </td>
                                                                        <td> ويسترن </td>
                                                                        <td> 562251215 </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 3 </td>
                                                                        <td> ويسترن </td>
                                                                        <td> 562251215 </td>
                                                                    </tr>-->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset> 
                                        </div>
                                        @endisset
                                        
                                        <div class="col-md-6 col-md-offset-3 col-sm-12"> <hr> </div>
                                        
                                        <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
                                            <button type="button" id="formEmployeeSubmit" class="btn btn-lg green pull-right margin-right-10">إضافة/تعديل</button>
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
        
        @include('common.scripts')
        
        <script>
            $(document).on('ready', function() {
                // Without Search
                $(".select-hide").select2({
                    dir: "rtl",
                    minimumResultsForSearch: Infinity
                });
                
                $('#transfer-type').on('change', function() {
                    var vl = $("#transfer-type :selected").val();
                    //alert(vl);
                    switch(vl) {
                        case '1':
                            $("#paypal").slideDown();
                            $("#bank").hide();
                            $("#other").hide();
                            break;
                        case '2':
                            $("#bank").slideDown();
                            $("#paypal").hide();
                            $("#other").hide();
                            break;
                        case '3':
                            $("#other").slideDown();
                            $("#bank").hide();
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
                language: "ar"
            });
            
			//Submitting the rate form
			$( "#formEmployeeSubmit" ).click(function() {
				$( "#formEmployee" ).submit();
			});
		</script>
        
    </body>

</html>