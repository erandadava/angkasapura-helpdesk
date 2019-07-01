<!-- Prio Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prio_name', 'Judul :') !!}
    {!! Form::text('prio_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('alert_time', 'Interval Alert Time:') !!}
    {!! Form::text('alert_time', null, ['class' => 'form-control', 'id' => 'interval']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', ['1'=>"Aktif",'0'=>"Non-Aktif"], null,['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('priorities.index') !!}" class="btn btn-default">Batal</a>
</div>


@section('scripts')
    <script type="text/javascript">
        $('#interval').datetimepicker({
            format: 'HH:mm:ss',
            useCurrent: false
        });
    </script>
@endsection