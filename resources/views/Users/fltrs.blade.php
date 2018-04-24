<form class="filters__form nomargin" action="{{route('fltrUsers')}}" method="POST">
    @csrf
    <h3 class="marketplace__title no-margin">
        أدوات التصفية<i class="mdi mdi-chevron-down mdi-24px"></i>
    </h3>
    <div class="filters filters--vertical">
        <div class="filters__section filters__section--category filters__section--vertical">
            <div class="filters__section-content">
                <div>
                    <input id="checkAll" class="checkbox-style" name="checkAll" type="checkbox" @if($filtres["all"]) checked @endif>
                    <label for="checkAll" class="checkbox-style-3-label"> الكل </label>
                </div>

                <div>
                    <input id="Users" class="checkbox-style" name="Users" type="checkbox" @if($filtres["getUsers"]) checked @endif>
                    <label for="Users" class="checkbox-style-3-label"> المستخدمين </label>
                </div>

                <div>
                    <input id="Employees" class="checkbox-style" name="Employees" type="checkbox" @if($filtres["getEmployees"]) checked @endif>
                    <label for="Employees" class="checkbox-style-3-label"> مقدم خدمة </label>
                </div>

                <div>
                    <input id="Clients" class="checkbox-style" name="Clients" type="checkbox" @if($filtres["getClients"]) checked @endif>
                    <label for="Clients" class="checkbox-style-3-label"> عميل </label>
                </div>
                
                <div class="clearfix"></div>
                    
                <div class="text-center margin-top-30">
                    <button type="submit" class="btn green">عـرض</button>
                </div>
            </div>
        </div>
    </div>
</form>