<!-- Issue Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('issue_id', 'Issue Id:') !!}
    {!! Form::text('issue_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_id', 'Cat Id:') !!}
    {!! Form::number('cat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Prio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prio_id', 'Prio Id:') !!}
    {!! Form::number('prio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Request Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('request_id', 'Request Id:') !!}
    {!! Form::number('request_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Prob Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('prob_desc', 'Prob Desc:') !!}
    {!! Form::textarea('prob_desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('reason_desc', 'Reason Desc:') !!}
    {!! Form::textarea('reason_desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Complete By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complete_by', 'Complete By:') !!}
    {!! Form::number('complete_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Issue Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('issue_date', 'Issue Date:') !!}
    {!! Form::date('issue_date', null, ['class' => 'form-control','id'=>'issue_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#issue_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Complete Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complete_date', 'Complete Date:') !!}
    {!! Form::date('complete_date', null, ['class' => 'form-control','id'=>'complete_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#complete_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Is Archive Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_archive', 'Is Archive:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_archive', 0) !!}
        {!! Form::checkbox('is_archive', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('issues.index') !!}" class="btn btn-default">Cancel</a>
</div>
