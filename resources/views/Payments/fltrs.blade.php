<form class="filters__form nomargin">
	<h3 class="marketplace__title no-margin">
        أدوات التصفية
        <i class="mdi mdi-chevron-down mdi-24px"></i>
    </h3>
	<div class="filters filters--vertical">
		<div class="filters__section filters__section--category filters__section--vertical">
            <div class="filters__section-content">
                <div>
                    <input id="checkbox-1" class="checkbox-style" name="checkbox-1" type="checkbox" checked>
                    <label for="checkbox-1" class="checkbox-style-3-label"> الكل </label>
                </div>

                <div>
                    <input id="checkbox-2" class="checkbox-style" name="checkbox-2" type="checkbox">
                    <label for="checkbox-2" class="checkbox-style-3-label"> اخر اسبوع </label>
                </div>

                <div>
                    <input id="checkbox-3" class="checkbox-style" name="checkbox-3" type="checkbox">
                    <label for="checkbox-3" class="checkbox-style-3-label"> اخر شهر </label>
                </div>

                <div>
                    <input id="checkbox-4" class="checkbox-style" name="checkbox-4" type="checkbox">
                    <label for="checkbox-4" class="checkbox-style-3-label"> اخر سنة </label>
                </div>

                <div>
                    <input id="checkbox-10" class="checkbox-style" name="checkbox-10" type="checkbox">
                    <label for="checkbox-10" class="checkbox-style-3-label"> فترة محددة </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" name="from" placeholder="من تاريخ">
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" name="to" placeholder="إلى تاريخ">
                    </div>
                </div>

                <div class="col-md-12"> <hr> </div>
                
                <div>
                    <input id="checkbox-11" class="checkbox-style" name="checkbox-11" type="checkbox">
                    <label for="checkbox-11" class="checkbox-style-3-label"> جميع مدفوعات مشروع </label>
                    <div class="col-md-12">
                        <select id="single" class="form-control select2 ">
                            <option>-- إختر --</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-12"> <hr> </div>
                
                <div>
                    <input id="checkbox-12" class="checkbox-style" name="checkbox-12" type="checkbox">
                    <label for="checkbox-12" class="checkbox-style-3-label"> جميع مدفوعات عميل </label>
                    <div class="col-md-12">
                        <select id="single0" class="form-control select2 ">
                            <option>-- إختر --</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
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