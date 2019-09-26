<div class="form-group col-sm-6">
    {!! Form::label('id_pemilik_perangkat', 'NIP Pemilik Perangkat:') !!}
    {!! Form::select('id_pemilik_perangkat', $pemilik, null, ['class' => 'form-control', 'placeholder' => '-']) !!}
</div>
<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_id', 'Category/Type Device:') !!}
    {!! Form::select('cat_id', $cat_inventory, null, ['class' => 'form-control']) !!}
</div>

<!-- Pos Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_perangkat', 'Nama Perangkat:') !!}
    {!! Form::text('nama_perangkat', null, ['class' => 'form-control']) !!}
</div>

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_user', 'Nama User:') !!}
    {!! Form::text('nama_user', null, ['class' => 'form-control']) !!}
</div>

<!-- Merk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merk', 'Merk:') !!}
    {!! Form::text('merk', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Type Alat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_alat', 'Tipe Alat:') !!}
    {!! Form::text('type_alat', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Sernum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sernum', 'Serial Number:') !!}
    {!! Form::text('sernum', null, ['class' => 'form-control' , 'placeholder' => 'optional']) !!}
</div>

<!-- Nama Perangkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('made_in', 'Buatan:') !!}
    {!! Form::text('made_in', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('made_year', 'Tahun Pembuatan:') !!}
    {!! Form::text('made_year', null, ['class' => 'form-control',  'id' => 'made_year']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('condition', 'Kondisi (%):') !!}
    {!! Form::text('condition', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('nama_perangkat_full', 'Nama Perangkat Full:') !!}
    {!! Form::text('nama_perangkat_full', null, ['class' => 'form-control']) !!}
</div>

<!-- Osver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('join_domain', 'Join Domain:') !!}
    {!! Form::text('join_domain', null, ['class' => 'form-control' , 'placeholder' => 'optional']) !!}
</div>

<!-- Os License Field -->
<div class="form-group col-sm-6">
    {!! Form::label('update_kasp', 'Update Kaspersky:') !!}
    {!! Form::text('update_kasp', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Os Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_addr', 'IP address:') !!}
    {!! Form::text('ip_addr', null, ['class' => 'form-control' , 'placeholder' => 'optional']) !!}
</div>

<!-- Av Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mask', 'Mask:') !!}
    {!! Form::text('mask', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Av License Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gateway', 'Gateway:') !!}
    {!! Form::text('gateway', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Ms Ver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dns1', 'DNS 1:') !!}
    {!! Form::text('dns1', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Ms Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dns2', 'DNS 2:') !!}
    {!! Form::text('dns2', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Ms Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dns3', 'DNS 3:') !!}
    {!! Form::text('dns3', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Tech Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_type', 'Tipe Ip Type:') !!}
    {!! Form::text('ip_type', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>
<!-- Tech Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('conn_type', 'Tipe Koneksi:') !!}
    {!! Form::text('conn_type', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

<!-- Made In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mac_addr', 'Mac Address :') !!}
    {!! Form::text('mac_addr', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
</div>

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
        $('#made_year').datetimepicker({
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