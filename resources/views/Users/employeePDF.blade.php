<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <head>
		<title>مقدم خدمة {{ $employee->id }} : {{ $employee->name }}</title>
		<style>
			body {
				font-family: 'KFGQPC Uthman Taha Naskh';
			}
			table {
				width: 100%;
				border: 1px solid;
			}
			td {
				width: 20%;
				border: 1px solid;
			}
		</style>
	</head>
    <body>
		<table cellpadding="2" cellspacing="0">
			<tr>
				<td>مقدم خدمة رقم: {{ $employee->id }}</td>
				<td>{{ $employee->name }}</td>
				<td>مهامه: {{ $employee->Role->name }}</td>
				<td>طريقة التحويل: {{ $employee->paymentMode }}</td>
			</tr>
			<tr>
				<td>نبذة</td>
				<td colspan="3">{{ $employee->details }}</td>
            </tr>
		</table>
    </body>
</html>