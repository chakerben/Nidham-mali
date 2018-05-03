<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <head>
		<title>التحويل رقم: {{ $transfer->id }}</title>
		<style>
			body {
				font-family: 'KFGQPC Uthman Taha Naskh';
			}
			table {
				width: 100%;
				border: 1px solid;
			}
			td {
				border: 1px solid;
			}
		</style>
	</head>
    <body>
		<table cellpadding="2" cellspacing="0">
			<tr>
				<td width="25%">من بنك</td>
				<td width="25%">{{ $transfer->AcountFrom->bank_name }}</td>
				<td width="25%">رقم حسابه</td>
				<td width="25%">{{ $transfer->AcountFrom->count_num }}</td>
            </tr>
			<tr>
				<td>الى بنك</td>
				<td>{{ $transfer->AcountTo->bank_name }}</td>
				<td>رقم حسابه</td>
				<td>{{ $transfer->AcountTo->count_num }}</td>
			</tr>
			<tr>
				<td>مبلغ قدره</td>
				<td>{{ $transfer->transfer_amount }}</td>
				<td>اقتطاع نسبه</td>
				<td>{{ $transfer->Rate->name }}</td>
            </tr>
            <tr>
                <td colspan="2">صافى المبلغ</td>
                <td colspan="2">{{ $transfer->total_amount }}</td>
            </tr>
		</table>
    </body>
</html>