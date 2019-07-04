<!-- Nama Uk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_uk', 'Nama Unit Kerja:') !!}
    {!! Form::text('nama_uk', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('unitKerjas.index') !!}" class="btn btn-default">Cancel</a>
</div>
