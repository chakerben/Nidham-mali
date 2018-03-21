<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"><!-- page-sidebar-menu-hover-submenu-->
        <li class="nav-item start active">
            <a href="{{ route('home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">الرئيسية</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-layers"></i>
                <span class="title">المشاريع والخدمات</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('allProjectsAndServices') }}" class="nav-link ">
                        <span class="title">كل المشاريع والخدمات</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('projects.create') }}" class="nav-link ">
                        <span class="title">إضافة مشروع</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('services.create') }}" class="nav-link ">
                        <span class="title">إضافة خدمة</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-wallet"></i>
                <span class="title">المدفوعات</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                <a href="{{ route('payments.index') }}" class="nav-link ">
                        <span class="title">كل المدفوعات</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('payments.create') }}" class="nav-link ">
                        <span class="title">إضافة دفعة</span>
                    </a>
                </li>
            </ul>
            
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-wallet"></i>
                <span class="title">المصروفات</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('expenses.index') }}" class="nav-link ">
                        <span class="title">كل المصروفات</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('expenses.create') }}" class="nav-link ">
                        <span class="title">إضافة مصروف</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="../Settings/settings.html" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">الإعدادات</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title">المستخدمين</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="../Users/allUsers.html" class="nav-link ">
                        <span class="title">كل المستخدمين</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('clients.create') }}" class="nav-link ">
                        <span class="title">إضافة عميل</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="../Users/addEmployee.html" class="nav-link ">
                        <span class="title">كل مقدم خدمة</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="../Users/addUser.html" class="nav-link ">
                        <span class="title">إضافة مستخدم</span>
                    </a>
                </li>
            </ul>
        </li>
                                
    </ul>
    <!-- END SIDEBAR MENU -->
</div>