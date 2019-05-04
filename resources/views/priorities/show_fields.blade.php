<!-- Prio Name Field -->
<div class="form-group">
    {!! Form::label('prio_name', 'Judul:') !!}
    <p>{!! $priority->prio_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    <p>
      @if($priority->is_active==0)
        <span class='label label-danger'>Non-Aktif</span>
      @else
        <span class='label label-success'>Aktif</span>
      @endif
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat Pada:') !!}
    <p>{!! $priority->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diubah Pada:') !!}
    <p>{!! $priority->updated_at !!}</p>
</div>
