<!-- Cat Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_name', 'Judul:') !!}
    {!! Form::text('cat_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', ['1'=>"Aktif",'0'=>"Non-Aktif"], null,['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Batal</a>
</div>
