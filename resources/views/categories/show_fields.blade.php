
<!-- Cat Name Field -->
<div class="form-group">
    {!! Form::label('cat_name', 'Judul:') !!}
    <p>{!! $category->cat_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    <p>
      @if($category->is_active==0)
        <span class='label label-danger'>Non-Aktif</span>
      @else
        <span class='label label-success'>Aktif</span>
      @endif
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat Pada:') !!}
    <p>{!! $category->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diubah Pada:') !!}
    <p>{!! $category->updated_at !!}</p>
</div>
