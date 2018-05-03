<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <head>
		<title>المشروع {{ $project->id }} : {{ $project->name }}</title>
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
				<td>المشروع رقم: {{ $project->id }}</td>
				<td>{{ $project->name }}</td>
				<td>العميل</td>
				<td>{{ $project->client->name }}</td>
			</tr>
			<tr>
				<td>من تاريخ</td>
				<td>{{ $project->begin_at }}</td>
				<td>إلى تاريخ</td>
				<td>{{ $project->end_at }}</td>
			</tr>
			<tr>
				<td>التفاصيل</td>
				<td colspan="3">{{ $project->details }}</td>
			</tr>
			<tr>
				<td>عدد الدفعات: {{count($project->Tranches)}}</td>
				<td>إجمالى المبلغ المستلم: {{$project->payd}}</td>
				<td>إجمالى المبلغ المتبقية: {{$project->cost - $project->payd}}</td>
				<td>إجمالى المبلغ المصروفة: {{$project->dept}}</td>
			</tr>
			<tr>
				<td colspan="4" style="padding: 10px;">
					<table cellpadding="2" cellspacing="0">
						<tr>
							<td colspan="4" style="text-align: center;">تفاصيل الدفعات</td>
						</tr>
						@foreach ($project->Tranches as $tranche)
						<tr>
							<td style="text-align: center;">{{ $loop->iteration }}</td>
							<td>@if($tranche->payed) تم الدفع @elseif($tranche->isLate()) متأخر عن تاريخ الدفع @else لم يتم الدفع @endif</td>
							<td>{{$tranche->amount}} ريال</td>
							<td>{{ \Carbon\Carbon::parse($tranche->date_tranche)->format('d/m/Y') }}</td>
						</tr>
						@endforeach
					</table>
				</td>
			</tr>
			<tr>
				<td>ملاحظات</td>
				<td colspan="3">{{ $project->remarques }}</td>
			</tr>
			<tr>
				<td>تكلفة المشروع</td>
				<td>{{ $project->cost }} ريال</td>
				<td>صافى الربح</td>
				<td>{{ $project->benefis }} ريال</td>
			</tr>
		</table>
    </body>
</html>