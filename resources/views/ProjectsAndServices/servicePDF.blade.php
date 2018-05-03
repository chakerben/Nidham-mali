<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <head>
		<title>الخدمة {{ $service->id }} : {{ $service->name }}</title>
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
				<td>الخدمة رقم: {{ $service->id }}</td>
				<td colspan="3">{{ $service->name }}</td>
			</tr>
			<tr>
				<td>من تاريخ</td>
				<td>{{ $service->begin_at }}</td>
				<td>إلى تاريخ</td>
				<td>{{ $service->end_at }}</td>
			</tr>
			<tr>
				<td>تكلفة الخدمة</td>
				<td>{{ $service->cost }} ريال</td>
				<td>إجمالى المبلغ المصروف</td>
				<td>{{ $service->totalExpens }} ريال</td>
			</tr>
			<tr>
				<td>التفاصيل</td>
				<td colspan="3">{{ $service->details }}</td>
			</tr>
			<tr>
				<td>ملاحظات</td>
				<td colspan="3">{{ $service->remarques }}</td>
			</tr>
		</table>
    </body>
</html>