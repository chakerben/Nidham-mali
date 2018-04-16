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

    <body class="page-container-bg-solid page-md">
        <div class="page-content">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">تسجيل الدخول إلى حسابك</span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                            placeholder="البريد الإلكتروني" required autofocus>
                                    </div>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <div class="form-group">
                                        </span>
                                        <input type="password" name="password" class="form-control" placeholder="كلمة المرور"
                                            required>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <div class="form-group">
                                        <div class="checkboxicheck ">
                                            <label>
                                                <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span>تذكرني</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <button type="submit" class="btn btn-primary p-x-2"><i class="icon-login"></i> دخول
                                        </button>
                                    </div>
                                    <div class="col-xs-6 text-xs-right">
                                        <a href="{{ route('password.request') }}" class="btn btn-link p-x-0">نسيت كلمة السر
                                            ؟</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="card-block">
                <h1>دخول</h1>
                <p class="text-muted">تسجيل الدخول إلى حسابك</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group m-b-1">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="البريد الإلكتروني" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <div class="input-group m-b-2">
                        <span class="input-group-addon"><i class="fa fa-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="كلمة المرور"
                                required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                    @endif
                    <div class="input-group m-b-2">
                        <div class="checkboxicheck ">
                                <label>
                                    <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span>تذكرني</span>
                                </label>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary p-x-2"><i class="icon-login"></i> دخول
                            </button>
                        </div>
                        <div class="col-xs-6 text-xs-right">
                            <a href="{{ route('password.request') }}" class="btn btn-link p-x-0">نسيت كلمة السر
                                ؟</a>
                        </div>
                    </div>
                </form>
            </div>-->
        </div>
        <!-- BEGIN FOOTER -->
            @include('common.footer')
        <!-- END FOOTER -->
        
        @include('common.scripts')
        
        <script>
            function verticalAlignMiddle() {
                var bodyHeight = $(window).height();
                var formHeight = $('.vamiddle').height();
                var marginTop = (bodyHeight / 2) - (formHeight / 2);
                if (marginTop > 0) {
                    $('.vamiddle').css('margin-top', marginTop);
                }
            }
            $(document).ready(function () {
                verticalAlignMiddle();
            });
            $(window).bind('resize', verticalAlignMiddle);
            
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>

        <style>
            .input-group{
                margin-bottom: 5px !important;
                margin-top: 15px;
            }
            .invalid-feedback{
                color: red;
            }
        </style>
    </body>
</html>