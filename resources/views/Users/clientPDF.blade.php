<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <head>
		<title>العميل {{ $client->id }} : {{ $client->name }}</title>
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
				<td>رقم العميل: {{ $client->id }}</td>
				<td>{{ $client->name }}</td>
				<td>طريقة الدفع</td>
				<td>{{ $client->paymentMode }}</td>
			</tr>
			<tr>
				<td>نبذة</td>
				<td colspan="3">{{ $client->details }}</td>
            </tr>
		</table>
    </body>
</html>