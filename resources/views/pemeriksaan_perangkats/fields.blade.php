<!-- Nama Pengguna Pc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pengguna_pc', 'Nama Pengguna Pc:') !!}
    {!! Form::text('nama_pengguna_pc', null, ['class' => 'form-control']) !!}
</div>

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Serial Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serial_number', 'Serial Number:') !!}
    {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Pengecekan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pengecekan', 'Tanggal Pengecekan:') !!}
    {!! Form::text('tanggal_pengecekan', null, ['class' => 'form-control','id'=>'tanggal_pengecekan']) !!}
</div>



<!-- Mulai Jam Pengecekan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mulai_jam_pengecekan', 'Jam Mulai Pengecekan:') !!}
    {!! Form::text('mulai_jam_pengecekan', null, ['class' => 'form-control', 'id' => 'jam_mulai']) !!}
</div>

<!-- Selesai Jam Pengecekan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('selesai_jam_pengecekan', 'Jam Selesai Pengecekan:') !!}
    {!! Form::text('selesai_jam_pengecekan', null, ['class' => 'form-control', 'id' => 'jam_selesai']) !!}
</div>

<!-- Full Computer Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_computer_name', 'Full Computer Name:') !!}
    {!! Form::text('full_computer_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Join Domain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('join_domain', 'Join Domain:') !!}
    {!! Form::select('join_domain', [0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control']) !!}
</div>

<!-- Update Kaspersky Field -->
<div class="form-group col-sm-6">
    {!! Form::label('update_kaspersky', 'Update Kaspersky:') !!}
    {!! Form::select('update_kaspersky', [0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_update', 'Tanggal Update:') !!}
    {!! Form::text('tanggal_update', null, ['class' => 'form-control','id'=>'tanggal_update']) !!}
</div>


<!-- Tipe Koneksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe_koneksi', 'Tipe Koneksi:') !!}
    {!! Form::select('tipe_koneksi', ['LAN' => 'LAN', 'WIFI' => 'WIFI', 'NONE' => 'NONE'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tipe Ip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe_ip', 'Tipe IP:') !!}
    {!! Form::text('tipe_ip', null, ['class' => 'form-control']) !!}
</div>

<!-- Mac Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mac_address', 'Mac Address:') !!}
    {!! Form::text('mac_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_address', 'IP Address:') !!}
    {!! Form::text('ip_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Subnet Mask Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subnet_mask', 'Subnet Mask:') !!}
    {!! Form::text('subnet_mask', null, ['class' => 'form-control']) !!}
</div>

<!-- Gateway Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gateway', 'Gateway:') !!}
    {!! Form::text('gateway', null, ['class' => 'form-control']) !!}
</div>

<!-- Dns1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dns1', 'Dns 1:') !!}
    {!! Form::text('dns1', null, ['class' => 'form-control']) !!}
</div>

<!-- Dns2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dns2', 'Dns 2:') !!}
    {!! Form::text('dns2', null, ['class' => 'form-control']) !!}
</div>

<!-- Dns3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dns3', 'Dns 3:') !!}
    {!! Form::text('dns3', null, ['class' => 'form-control']) !!}
</div>

<!-- Ttd It Senior Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttd_it_senior', 'Ttd It Senior:') !!}
    {!! Form::text('ttd_it_senior', null, ['class' => 'form-control']) !!}
</div>

<!-- Ttd Admin Aps Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttd_admin_aps', 'Ttd Admin Aps:') !!}
    {!! Form::text('ttd_admin_aps', null, ['class' => 'form-control']) !!}
</div>

<!-- Teknisi Aps Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teknisi_aps', 'Teknisi Aps:') !!}
    {!! Form::text('teknisi_aps', null, ['class' => 'form-control']) !!}
</div>

<!-- User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user', 'User:') !!}
    {!! Form::text('user', null, ['class' => 'form-control']) !!}
</div>

<!-- It Non Public Field -->
<div class="form-group col-sm-6">
    {!! Form::label('it_non_public', 'It Non Public:') !!}
    {!! Form::text('it_non_public', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pemeriksaanPerangkats.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tanggal_pengecekan').datetimepicker({
            format: 'Y-MM-DD',
            useCurrent: false
        });
        $('#tanggal_update').datetimepicker({
            format: 'Y-MM-DD',
            useCurrent: false
        });
        $('#jam_mulai').datetimepicker({
            format: 'hh:mm:ss',
            useCurrent: false
        });
        $('#jam_selesai').datetimepicker({
            format: 'hh:mm:ss',
            useCurrent: false
        });
    </script>
@endsection