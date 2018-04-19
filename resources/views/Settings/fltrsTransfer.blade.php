<form class="filters__form nomargin">
    <h3 class="marketplace__title no-margin">
        أدوات التصفية<i class="mdi mdi-chevron-down mdi-24px"></i>
    </h3>
    <div class="filters filters--vertical">
        <div class="filters__section filters__section--category filters__section--vertical">
            <div class="filters__section-content">
                <div>
                    <input id="checkbox-1" class="checkbox-style" name="checkbox-1" type="checkbox" checked>
                    <label for="checkbox-1" class="checkbox-style-3-label"> اى وقت </label>
                </div>
                
                <div>
                    <input id="checkbox-10" class="checkbox-style" name="checkbox-10" type="checkbox">
                    <label for="checkbox-10" class="checkbox-style-3-label"> فترة محددة </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" name="from" placeholder="من تاريخ">
                    </div>
                    <div class="col-md-12"> <hr style="margin: 5px;"> </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" name="to" placeholder="إلى تاريخ">
                    </div>
                </div>
                
                <div class="col-md-12"> <hr> </div>
                
                <div>
                    <input id="checkbox-2" class="checkbox-style" name="checkbox-2" type="checkbox">
                    <label for="checkbox-2" class="checkbox-style-3-label"> جميع تحويلات بنك </label>
                    <div class="col-md-12">
                        <select class="form-control select2 " multiple>
                            <option>-- إختر --</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->bank_name }}">{{ $bank->bank_name }}</option>
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