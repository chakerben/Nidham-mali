<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <head>
		<title>المصروف {{ $expense->id }} : {{ $expense->name }}</title>
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
				<td>رقم المصروف: {{ $expense->id }}</td>
				<td>{{ $expense->name }}</td>
				<td>النوع</td>
				<td>{{ $expense->type->name }}</td>
			</tr>
			<tr>
				<td>صاحب المصروف</td>
				<td>{{ $expense->employee->name }}</td>
				<td>التاريخ</td>
				<td>{{ $expense->expense_date }}</td>
			</tr>
			<tr>
				<td>التفاصيل</td>
				<td colspan="3">{{ $expense->details }}</td>
            </tr>
			<tr>
				<td>الحساب المحول منه</td>
				<td>{{ $expense->bancAcount->bank_name }} - {{ $expense->bancAcount->count_num }}</td>
				<td>طريقة التحويل</td>
				<td>{{ $expense->transferMethode->name }}</td>
			</tr>
			<tr>
				<td colspan="2">مبلغ المصروف</td>
				<td colspan="2">{{ $expense->amount }} ريال</td>
			</tr>
			<tr>
				<td >المبلغ المدفوع</td>
                <td colspan="3">
                    @foreach ($expense->Rates as $rate)
                        <span style="margin: 0px 5px;">({{ $rate->value }}){{ $rate->name }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
				<td colspan="2">إجمالى المبلغ مع النسبة</td>
				<td colspan="2">{{ $expense->amount - $expense->amount }} ريال</td>
            </tr>
			<tr>
				<td>ملاحظات</td>
				<td colspan="3">{{ $expense->details }}</td>
            </tr>
		</table>
    </body>
</html>