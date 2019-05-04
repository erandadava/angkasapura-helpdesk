
<!-- Issue Id Field -->
<div class="form-group">
    {!! Form::label('issue_id', 'ID Keluhan:') !!}
    <p>{!! $issues->issue_id !!}</p>
</div>

<!-- Cat Id Field -->
<div class="form-group">
    {!! Form::label('cat_id', 'Kategoi:') !!}
    <p>{!! $issues->category->cat_name !!}</p>
</div>

<!-- Prio Id Field -->
<div class="form-group">
    {!! Form::label('prio_id', 'Prioritas:') !!}
    <p>{!! $issues->priority->prio_name !!}</p>
</div>

<!-- Request Id Field -->
<div class="form-group">
    {!! Form::label('request_id', 'Request:') !!}
    <p>{!! $issues->request->name !!}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location', 'Lokasi:') !!}
    <p>{!! $issues->location !!}</p>
</div>

<!-- Prob Desc Field -->
<div class="form-group">
    {!! Form::label('prob_desc', 'Deskripsi Keluhan:') !!}
    <p>{!! $issues->prob_desc !!}</p>
</div>

<!-- Reason Desc Field -->
<div class="form-group">
    {!! Form::label('reason_desc', 'Deskripsi Alasan:') !!}
    <p>{!! $issues->reason_desc !!}</p>
</div>

<!-- Complete By Field -->
<div class="form-group">
    {!! Form::label('complete_by', 'Selesai Oleh:') !!}
    <p>{!! $issues->complete->name ?? ''!!}</p>
</div>

<!-- Issue Date Field -->
<div class="form-group">
    {!! Form::label('issue_date', 'Waktu Keluhan:') !!}
    <p>{!! $issues->issue_date !!}</p>
</div>

<!-- Complete Date Field -->
<div class="form-group">
    {!! Form::label('complete_date', 'Waktu Selesai:') !!}
    <p>{!! $issues->complete_date !!}</p>
</div>

<!-- Is Archive Field
<div class="form-group">
    {!! Form::label('is_archive', 'Is Archive:') !!}
    <p>{!! $issues->is_archive !!}</p>
</div> -->

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat Pada:') !!}
    <p>{!! $issues->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diubah Pada:') !!}
    <p>{!! $issues->updated_at !!}</p>
</div>

