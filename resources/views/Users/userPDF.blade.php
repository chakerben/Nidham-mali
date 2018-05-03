<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <!--<![endif]-->
    <head>
		<title>المستخدم {{ $user->id }} : {{ $user->name }}</title>
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
				<td width="25%">المستخدم رقم: {{ $user->id }}</td>
				<td width="25%">{{ $user->name }}</td>
				<td width="25%">الايميل: {{ $user->email }}</td>
				<td width="25%">رقم الجوال: {{ $user->phone }}</td>
			</tr>
			<tr>
				<td>نبذة</td>
				<td colspan="3">{{ $user->description }}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php $allPermissions = unserialize($user->permissions); ?>
                    <table cellpadding="2" cellspacing="0">
                        <tr> <td colspan="5">المشاريع</td> </tr>
                        <tr>
                            <td width="20%">إضافة: {{$allPermissions["PrjPerms"]["PrjA"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تعديل: {{$allPermissions["PrjPerms"]["PrjU"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">حذف: {{$allPermissions["PrjPerms"]["PrjD"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">عرض: {{$allPermissions["PrjPerms"]["PrjS"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تحميل: {{$allPermissions["PrjPerms"]["PrjT"] ? 'نعم' : 'لا'}}</td>
                        </tr>
                        <tr> <td colspan="5"></td> </tr>
                        <tr> <td colspan="5">الخدمات</td> </tr>
                        <tr>
                            <td width="20%">إضافة: {{$allPermissions["SrvPerms"]["SrvA"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تعديل: {{$allPermissions["SrvPerms"]["SrvU"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">حذف: {{$allPermissions["SrvPerms"]["SrvD"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">عرض: {{$allPermissions["SrvPerms"]["SrvS"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تحميل: {{$allPermissions["SrvPerms"]["SrvT"] ? 'نعم' : 'لا'}}</td>
                        </tr>
                        <tr> <td colspan="5"></td> </tr>
                        <tr> <td colspan="5">المدفوعات</td> </tr>
                        <tr>
                            <td width="20%">إضافة: {{$allPermissions["PayPerms"]["PayA"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تعديل: {{$allPermissions["PayPerms"]["PayU"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">حذف: {{$allPermissions["PayPerms"]["PayD"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">عرض: {{$allPermissions["PayPerms"]["PayS"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تحميل: {{$allPermissions["PayPerms"]["PayUp"] ? 'نعم' : 'لا'}}</td>
                        </tr>
                        <tr> <td colspan="5"></td> </tr>
                        <tr> <td colspan="5">المصروفات</td> </tr>
                        <tr>
                            <td width="20%">إضافة: {{$allPermissions["ExpPerms"]["ExpA"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تعديل: {{$allPermissions["ExpPerms"]["ExpU"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">حذف: {{$allPermissions["ExpPerms"]["ExpD"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">عرض: {{$allPermissions["ExpPerms"]["ExpS"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تحميل: {{$allPermissions["ExpPerms"]["ExpUp"] ? 'نعم' : 'لا'}}</td>
                        </tr>
                        <tr> <td colspan="5"></td> </tr>
                        <tr> <td colspan="5">الاعدادات</td> </tr>
                        <tr>
                            <td width="20%">إضافة فى عام: {{$allPermissions["SetPerms"]["SetAg"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تعديل فى عام: {{$allPermissions["SetPerms"]["SetUg"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">إضافة فى الحسابات: {{$allPermissions["SetPerms"]["SetAa"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تعديل فى الحسابات: {{$allPermissions["SetPerms"]["SetUa"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">عمل تحويل: {{$allPermissions["SetPerms"]["SetAt"] ? 'نعم' : 'لا'}}</td>
                        </tr>
                        <tr>
                            <td width="20%">إضافة نسبة: {{$allPermissions["SetPerms"]["SetAr"] ? 'نعم' : 'لا'}}</td>
                            <td colspan="4"></td>
                        </tr>
                        <tr> <td colspan="5"></td> </tr>
                        <tr> <td colspan="5">المستخدمين</td> </tr>
                        <tr>
                            <td width="20%">إضافة مستخدم: {{$allPermissions["UsrPerms"]["UsrAu"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">إضافة عميل: {{$allPermissions["UsrPerms"]["UsrAc"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">إضافة مقدم خدمة: {{$allPermissions["UsrPerms"]["UsrAe"] ? 'نعم' : 'لا'}}</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td width="20%">تعديل مستخدم: {{$allPermissions["UsrPerms"]["UsrUu"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تعديل عميل: {{$allPermissions["UsrPerms"]["UsrUc"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">تعديل مقدم خدمة: {{$allPermissions["UsrPerms"]["UsrUe"] ? 'نعم' : 'لا'}}</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td width="20%">حذف مستخدم: {{$allPermissions["UsrPerms"]["UsrDu"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">حذف عميل: {{$allPermissions["UsrPerms"]["UsrDc"] ? 'نعم' : 'لا'}}</td>
                            <td width="20%">حذف مقدم خدمة: {{$allPermissions["UsrPerms"]["UsrDe"] ? 'نعم' : 'لا'}}</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr> <td colspan="5"></td> </tr>
                    </table>
                </td>
            </tr>
		</table>
    </body>
</html>