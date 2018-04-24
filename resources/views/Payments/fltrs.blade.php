<form action="{{route('fltrPayments')}}" method="POST" class="filters__form nomargin">
    @method('PUT')
    @csrf
	<h3 class="marketplace__title no-margin">
        أدوات التصفية
        <i class="mdi mdi-chevron-down mdi-24px"></i>
    </h3>
	<div class="filters filters--vertical">
		<div class="filters__section filters__section--category filters__section--vertical">
            <div class="filters__section-content">
                <div>
                    <input type="radio" id="checkAll" value="checkAll" class="radio-style" name="fltrPeriod" @empty($fltrs) checked @endempty @isset($fltrs) @if($fltrs["periode"]=="checkAll") checked @endif @endisset>
                    <label class="radio-style-3-label" for="checkAll"> الكل </label>
                </div>

                <div>
                    <input type="radio" id="lastWeek" value="lastWeek" class="radio-style" name="fltrPeriod" @isset($fltrs) @if($fltrs["periode"]=="lastWeek") checked @endif @endisset>
                    <label class="radio-style-3-label" for="lastWeek"> اخر اسبوع </label>
                </div>

                <div>
                    <input type="radio" id="lastMonth" value="lastMonth" class="radio-style" name="fltrPeriod" @isset($fltrs) @if($fltrs["periode"]=="lastMonth") checked @endif @endisset>
                    <label class="radio-style-3-label" for="lastMonth"> اخر شهر </label>
                </div>

                <div>
                    <input type="radio" id="lastYear" value="lastYear" class="radio-style" name="fltrPeriod" @isset($fltrs) @if($fltrs["periode"]=="lastYear") checked @endif @endisset>
                    <label class="radio-style-3-label" for="lastYear"> اخر سنة </label>
                </div>

                <div>
                    <input type="radio" id="limitedPeriod" value="limitedPeriod" class="radio-style" name="fltrPeriod" @isset($fltrs) @if($fltrs["periode"]=="limitedPeriod") checked @endif @endisset>
                    <label class="radio-style-3-label" for="limitedPeriod"> فترة محددة </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" name="from" id="from" placeholder="من تاريخ"
                            @isset($fltrs["from"]) value="{{$fltrs["from"]}}" @endisset
                            @isset($fltrs) @if(!$fltrs["from"]) disabled @endif @endisset>
                    </div>
                    <div class="col-md-12"> <hr style="margin: 5px;"> </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" name="to" id="to" placeholder="إلى تاريخ"
                            @isset($fltrs["to"]) value="{{$fltrs["to"]}}" @endisset
                            @isset($fltrs) @if(!$fltrs["to"]) disabled @endif @endisset>
                    </div>
                </div>

                <div class="col-md-12"> <hr> </div>
                
                <div>
                    <input id="singlePrj" class="checkbox-style" name="singlePrj" type="checkbox" @isset($fltrs) @if(!$fltrs["allPrjs"])checked @endif @endisset>
                    <label for="singlePrj" class="checkbox-style-3-label"> جميع مدفوعات مشروع </label>
                    <div class="col-md-12">
                        <select id="prj" name="prj" class="form-control select2" @isset($fltrs) @if($fltrs["allPrjs"]) disabled @endif @endisset>
                            <option>-- إختر --</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    @if($fltrs["prj"] && $fltrs["prj"] == $project->id)
                                    selected @endif
                                >{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-12"> <hr> </div>
                
                <div>
                    <input id="singleCli" class="checkbox-style" name="singleCli" type="checkbox" @isset($fltrs) @if(!$fltrs["allClis"])checked @endif @endisset>
                    <label for="singleCli" class="checkbox-style-3-label"> جميع مدفوعات عميل </label>
                    <div class="col-md-12">
                        <select id="cli" name="cli" class="form-control select2" @isset($fltrs) @if($fltrs["allClis"]) disabled @endif @endisset >
                            <option>-- إختر --</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}"
                                    @if($fltrs["prj"] && $fltrs["cli"] == $client->id)
                                    selected @endif
                                >{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="text-center margin-top-30">
                    <button type="submit" class="btn green">عـرض</button>
                </div>
            </div>
        </div>
    </div>
</form>