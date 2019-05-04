<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $priority->id !!}</p>
</div>

<!-- Prio Name Field -->
<div class="form-group">
    {!! Form::label('prio_name', 'Prio Name:') !!}
    <p>{!! $priority->prio_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{!! $priority->is_active !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $priority->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $priority->updated_at !!}</p>
</div>

