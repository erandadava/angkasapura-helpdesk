<!-- Nama Cat Field -->
<div class="form-group">
    {!! Form::label('nama_cat', 'Nama Category:') !!}
    <p>{!! $catInventory->nama_cat !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    <p>
      @if($catInventory->is_active==0)
        <span class='label label-danger'>Non-Aktif</span>
      @else
        <span class='label label-success'>Aktif</span>
      @endif
    </p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Dibuat Pada:') !!}
    <p>{!! $catInventory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diubah Pada:') !!}
    <p>{!! $catInventory->updated_at !!}</p>
</div>
