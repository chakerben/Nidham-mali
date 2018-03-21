<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{ route('home') }}">الرئيسية</a>
    @if (!$section)
        </li>
    @else
        <i class="fa fa-angle-left"></i>
        </li>
        <li>
        <a href="{{ route($route) }}">{{$section}}</a>
    @endif
    @if(!$page)
        </li>
    @else
        <i class="fa fa-angle-left"></i>
        </li>
        <li class="active">
            <span>{{$page}}</span>
        </li>
    @endif
</ul>