<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <head>
		<title>الدفعة {{ $payment->id }} : {{ $payment->tranche->project->name }}</title>
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
				<td>اسم المشروع</td>
				<td>{{ $payment->tranche->project->name }}</td>
				<td>رقم الدفعة</td>
				<td>{{ $payment->tranche->id }}</td>
			</tr>
			<tr>
				<td colspan="2">مبلغ الدفعة</td>
				<td colspan="2">{{ $payment->tranche->amount }} ريال</td>
			</tr>
			<tr>
				<td colspan="2">المبلغ المدفوع</td>
                <td colspan="2">{{ $payment->amount }} ريال</td>
            </tr>
            <tr>
				<td colspan="2">الباقى</td>
				<td colspan="2">{{ $payment->tranche->amount - $payment->amount }} ريال</td>
			</tr>
			<tr>
				<td>البنك المحول اليه</td>
				<td>{{ $payment->bank_to_id }}</td>
				<td>رقم الحساب</td>
				<td>{{ $payment->bank_to_id }}</td>
			</tr>
			<tr>
				<td colspan="4"></td>
            </tr>
            @switch($payment->type)
                @case(1)
                    <tr>
                        <td colspan="4">شيك</td>
                    </tr>
                    <tr>
                        <td>اسم البنك</td>
                        <td>{{ $payment->bank_from_id }}</td>
                        <td>تاريخ</td>
                        <td>{{ $payment->date_payment}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">رقم الشيك</td>
                        <td colspan="2">{{ $payment->chek_number }}</td>
                    </tr>
                    @break

                @case(2)
                    <tr>
                        <td colspan="4">باى بال</td>
                    </tr>
                    <tr>
                        <td colspan="2">حساب الباى بال</td>
                        <td colspan="2">{{ $payment->paypal_acount }}</td>
                    </tr>
                    @break

                @case(3)
                    <tr>
                        <td colspan="4">كاش</td>
                    </tr>
                    <tr>
                        <td>اسم المحول</td>
                        <td>{{ $payment->person_transfer_id }}</td>
                        <td>تاريخ</td>
                        <td>{{ $payment->date_payment}}</td>
                    </tr>
                    @break
            @endswitch
		</table>
    </body>
</html>