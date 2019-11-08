<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('report.report')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('reports.store', ['model' => $model])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">@lang('report.title')</label>
                        <input type="text" class="form-control" placeholder="@lang('report.title')" id="title" name="title">
                        <label for="report_type_id">@lang('report.reason')</label>
                        <select name="type_id" id="report_type_id" class="form-control">
                            @foreach($reportTypes as $reportType)
                                <option value="{{$reportType->id}}">{{$reportType->getNameByLocale()}}</option>
                            @endforeach
                        </select>
                        <label for="description">@lang('report.description')</label>
                        <textarea name="description" id="description" cols="30" rows="3"
                                  class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="model_type" value="{{get_class($model)}}">
                    <input type="hidden" name="model_id" value="{{$model->id}}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('common.close')</button>
                        <button type="submit" class="btn btn-primary">@lang('common.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
