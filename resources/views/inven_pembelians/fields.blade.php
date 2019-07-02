{{-- <!-- Id Inventory Fk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_inventory_fk', 'Id Inventory Fk:') !!}
    {!! Form::number('id_inventory_fk', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Nama Perangkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_perangkat', 'Nama Perangkat:') !!}
    {!! Form::text('nama_perangkat', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Kerja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_kerja', 'Unit Kerja:') !!}
    {!! Form::text('unit_kerja', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Alat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_alat', 'Nama Alat:') !!}
    {!! Form::text('nama_alat', null, ['class' => 'form-control']) !!}
</div>

<!-- Keperluan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keperluan', 'Keperluan:') !!}
    {!! Form::textarea('keperluan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Pembelian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_pembelian', 'Tgl Pembelian:') !!}
    {!! Form::date('tgl_pembelian', null, ['class' => 'form-control','id'=>'tgl_pembelian']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tgl_pembelian').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Tgl Penyerahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_penyerahan', 'Tgl Penyerahan:') !!}
    {!! Form::date('tgl_penyerahan', null, ['class' => 'form-control','id'=>'tgl_penyerahan']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tgl_penyerahan').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('invenPembelians.index') !!}" class="btn btn-default">Cancel</a>
</div>
