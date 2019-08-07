<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_id', 'Category/Type Device:') !!}
    {!! Form::select('cat_id', $cat_inventory, null, ['class' => 'form-control']) !!}
</div>

<!-- Pos Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pos_unit', 'Posisi Unit Device:') !!}
    {!! Form::text('pos_unit', null, ['class' => 'form-control']) !!}
</div>

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi Device:') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_user', 'Nama User:') !!}
    {!! Form::text('nama_user', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Perangkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_perangkat', 'Nama Perangkat:') !!}
    {!! Form::text('nama_perangkat', null, ['class' => 'form-control']) !!}
</div>

<!-- Merk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merk', 'Merk:') !!}
    {!! Form::text('merk', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tgl_pembelian', 'Tanggal Pembelian:') !!}
    {!! Form::text('tgl_pembelian', null, ['class' => 'form-control','id'=>'tgl_pembelian']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tgl_penyerahan', 'Tanggal Penyerahan:') !!}
    {!! Form::text('tgl_penyerahan', null, ['class' => 'form-control','id'=>'tgl_penyerahan']) !!}
</div>

<!-- Type Alat Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('type_alat', 'Type Alat:') !!}
    {!! Form::text('type_alat', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Sernum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sernum', 'Sernum:') !!}
    {!! Form::text('sernum', null, ['class' => 'form-control' , 'placeholder' => 'optional']) !!}
</div>

<!-- Osver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('osver', 'OS Version:') !!}
    {!! Form::text('osver', null, ['class' => 'form-control' , 'placeholder' => 'optional']) !!}
</div>

<!-- Os License Field -->
<div class="form-group col-sm-6">
    {!! Form::label('os_license', 'OS License:') !!}
    {!! Form::text('os_license', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Os Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('os_status', 'OS Status:') !!}
    {!! Form::text('os_status', null, ['class' => 'form-control' , 'placeholder' => 'optional']) !!}
</div>

<!-- Av Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('av_type', 'Antivirus Type:') !!}
    {!! Form::text('av_type', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Av License Field -->
<div class="form-group col-sm-6">
    {!! Form::label('av_license', 'Antivirus License:') !!}
    {!! Form::text('av_license', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Ms Ver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ms_ver', 'MS Office Version:') !!}
    {!! Form::text('ms_ver', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Ms Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ms_id', 'MS Office Product ID:') !!}
    {!! Form::text('ms_id', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Ms Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ms_status', 'MS Office Status:') !!}
    {!! Form::text('ms_status', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Tech Key Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('tech_key', 'Data Teknis Key:') !!}
    {!! Form::text('tech_key', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>
 -->
<!-- Tech Kode Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('tech_kode', 'Data Teknis Kode:') !!}
    {!! Form::text('tech_kode', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div> -->

<!-- Made In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('made_in', 'Made In:') !!}
    {!! Form::text('made_in', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Made Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('made_year', 'Made Year:') !!}
    {!! Form::text('made_year', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Vendor Name Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('vendor_name', 'Vendor Name:') !!}
    {!! Form::text('vendor_name', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div> -->

<!-- <div class="form-group col-sm-6">
    {!! Form::label('tgl_pembayaran', 'Tanggal Pembayaran:') !!}
    {!! Form::text('tgl_pembayaran', null, ['class' => 'form-control', 'placeholder' => 'optional','id'=>'tgl_pembayaran']) !!}
</div> -->


<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', ['1'=>"Aktif",'0'=>"Non-Aktif"], null,['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inventories.index') !!}" class="btn btn-default">Batal</a>
</div>


@section('scripts')
    <script type="text/javascript">
        $('#tgl_pembelian').datetimepicker({
            format: 'Y-MM-DD',
            useCurrent: false
        });
 
        $('#tgl_penyerahan').datetimepicker({
            format: 'Y-MM-DD',
            useCurrent: false
        });

        $('#tgl_pembayaran').datetimepicker({
            format: 'Y-MM-DD',
            useCurrent: false
        });
    </script>
    
@endsection