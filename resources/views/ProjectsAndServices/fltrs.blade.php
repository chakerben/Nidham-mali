<form action="{{route('fltrProjectsAndServices', [], true)}}" method="POST" class="filters__form nomargin">
    @csrf
    <h3 class="marketplace__title no-margin">أدوات التصفية<i class="mdi mdi-chevron-down mdi-24px"></i></h3>
    <div class="filters filters--vertical">
        <div class="filters__section filters__section--category filters__section--vertical">
            <div class="filters__section-content">
                <div>
                    <input id="checkAll" class="checkbox-style" name="checkAll" type="checkbox" @if($fltrs["getAll"]) checked @endif>
                    <label for="checkAll" class="checkbox-style-3-label">الكل</label>
                </div>

                <div>
                    <input id="services" class="checkbox-style" name="services" type="checkbox" @if($fltrs["getSrvs"]) checked @endif>
                    <label for="services" class="checkbox-style-3-label"> الخدمات </label>
                </div>

                <div>
                    <input id="projects" class="checkbox-style" name="projects" type="checkbox" @if($fltrs["getPrjs"]) checked @endif>
                    <label for="projects" class="checkbox-style-3-label"> المشاريع </label>
                </div>

                <div>
                    <input id="projectsOk" class="checkbox-style" name="projectsOk" type="checkbox" @if($fltrs["getOk"]) checked @endif @if(!$fltrs["getPrjs"]) disabled @endif>
                    <label for="projectsOk" class="checkbox-style-3-label"> المشاريع الناجحة </label>
                </div>

                <div>
                    <input id="projectsNok" class="checkbox-style" name="projectsNok" type="checkbox" @if($fltrs["getNok"]) checked @endif @if(!$fltrs["getPrjs"]) disabled @endif>
                    <label for="projectsNok" class="checkbox-style-3-label"> المشاريع الخاسرة </label>
                </div>

                <div>
                    <input id="projectsNull" class="checkbox-style" name="projectsNull" type="checkbox" @if($fltrs["getNull"]) checked @endif @if(!$fltrs["getPrjs"]) disabled @endif>
                    <label for="projectsNull" class="checkbox-style-3-label"> المشاريع المتعادلة </label>
                </div>
                
                <div class="col-md-12"> <hr> </div>
                
                <div>
                    <input id="allTime" class="checkbox-style" name="allTime" type="checkbox" @if($fltrs["allTime"]) checked @endif>
                    <label for="allTime" class="checkbox-style-3-label"> جميع الأوقات </label>
                </div>

                <div>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" id="from" name="from" placeholder="من تاريخ" value="{{$fltrs["from"]}}" @if($fltrs["allTime"]) disabled @endif>
                    </div>
                    <div class="col-md-12"> <hr style="margin: 5px;"> </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" id="to" name="to" placeholder="إلى تاريخ" value="{{$fltrs["to"]}}" @if($fltrs["allTime"]) disabled @endif>
                    </div>
                </div>
                
                <div class="col-md-12"> <hr> </div>

                <div>
                    <input id="finished" class="checkbox-style" name="finished" type="checkbox" @if($fltrs["getFini"]) checked @endif>
                    <label for="finished" class="checkbox-style-3-label"> المنتهية </label>
                </div>

                <div>
                    <input id="inProgres" class="checkbox-style" name="inProgres" type="checkbox" @if($fltrs["getProg"]) checked @endif>
                    <label for="inProgres" class="checkbox-style-3-label"> الجارية </label>
                </div>

                <div class="clearfix"></div>
                    
                <div class="text-center margin-top-30">
                    <button type="submit" class="btn green">عـرض</button>
                </div>
            </div>
        </div>
    </div>
</form>