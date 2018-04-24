<form action="{{route('settingsFltr', [], true)}}" method="POST" class="filters__form nomargin">
    @csrf
    <h3 class="marketplace__title no-margin">
        أدوات التصفية<i class="mdi mdi-chevron-down mdi-24px"></i>
    </h3>
    <div class="filters filters--vertical">
        <div class="filters__section filters__section--category filters__section--vertical">
            <div class="filters__section-content">
                <div>
                    <input id="allTime" class="checkbox-style" name="allTime" type="checkbox" @if($transFltrs["allTime"]) checked @endif>
                    <label for="allTime" class="checkbox-style-3-label"> اى وقت </label>
                </div>
                
                <div>
                    <label class="checkbox-style-3-label"> فترة محددة </label>
                    <div class="col-md-12">
                    <input type="text" class="form-control date" name="from" id="from" placeholder="من تاريخ" @if($transFltrs["allTime"]) disabled @else value="{{$transFltrs["from"]}}" @endif>
                    </div>
                    <div class="col-md-12"> <hr style="margin: 5px;"> </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control date" name="to" id="to" placeholder="إلى تاريخ" @if($transFltrs["allTime"]) disabled @else value="{{$transFltrs["to"]}}" @endif>
                    </div>
                </div>
                
                <div class="col-md-12"> <hr> </div>
                
                <div>
                    <input id="allBanc" class="checkbox-style" name="allBanc" type="checkbox" @if($transFltrs["allBanc"]) checked @endif>
                    <label for="allBanc" class="checkbox-style-3-label"> جميع البنوك </label>
                    <div class="col-md-12">
                        <select class="form-control select2 " name="bancs[]" id="bancs" multiple @if($transFltrs["allBanc"]) disabled @endif>
                            <option>-- إختر بنك --</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->bank_name }}"
                                    @if(!$transFltrs["allBanc"])
                                        @foreach($transFltrs["bancs"] as $banc)
                                            @if($bank->bank_name === $banc) selected @endif
                                        @endforeach
                                    @endif
                                >{{ $bank->bank_name }}</option>
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