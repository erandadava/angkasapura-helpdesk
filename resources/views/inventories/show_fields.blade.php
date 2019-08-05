<!-- Cat Id Field -->
<div class="form-group">
    {!! Form::label('cat_id', 'Category/Type Device:') !!}
    <p>{!! $inventory->cat_inventory->nama_cat ?? '' !!}</p>
</div>

<!-- Pos Unit Field -->
<div class="form-group">
    {!! Form::label('pos_unit', 'Posisi Unit Device:') !!}
    <p>{!! $inventory->pos_unit !!}</p>
</div>

<!-- Lokasi Field -->
<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi Device:') !!}
    <p>{!! $inventory->lokasi !!}</p>
</div>

<!-- Nama User Field -->
<div class="form-group">
    {!! Form::label('nama_user', 'Nama User:') !!}
    <p>{!! $inventory->nama_user !!}</p>
</div>

<!-- Nama Perangkat Field -->
<div class="form-group">
    {!! Form::label('nama_perangkat', 'Nama Perangkat:') !!}
    <p>{!! $inventory->nama_perangkat !!}</p>
</div>

<!-- Merk Field -->
<div class="form-group">
    {!! Form::label('merk', 'Merk:') !!}
    <p>{!! $inventory->merk !!}</p>
</div>

<!-- <div class="form-group">
    {!! Form::label('tgl_pembelian', 'Tanggal Pembelian:') !!}
    <p>{!! $inventory->tgl_pembelian !!}</p>
</div> -->

<div class="form-group">
    {!! Form::label('tgl_penyerahan', 'Tanggal Penyerahan:') !!}
    <p>{!! $inventory->tgl_penyerahan !!}</p>
</div>

<!-- Type Alat Field -->
<!-- <div class="form-group">
    {!! Form::label('type_alat', 'Type Alat:') !!}
    <p>{!! $inventory->type_alat !!}</p>
</div> -->

<!-- Sernum Field -->
<div class="form-group">
    {!! Form::label('sernum', 'Sernum:') !!}
    <p>{!! $inventory->sernum !!}</p>
</div>

<!-- Osver Field -->
<div class="form-group">
    {!! Form::label('osver', 'OS Version:') !!}
    <p>{!! $inventory->osver !!}</p>
</div>

<!-- Os License Field -->
<div class="form-group">
    {!! Form::label('os_license', 'OS License:') !!}
    <p>{!! $inventory->os_license !!}</p>
</div>

<!-- Os Status Field -->
<div class="form-group">
    {!! Form::label('os_status', 'OS Status:') !!}
    <p>{!! $inventory->os_status !!}</p>
</div>

<!-- Av Type Field -->
<div class="form-group">
    {!! Form::label('av_type', 'Antivirus Type:') !!}
    <p>{!! $inventory->av_type !!}</p>
</div>

<!-- Av License Field -->
<div class="form-group">
    {!! Form::label('av_license', 'Antivirus License:') !!}
    <p>{!! $inventory->av_license !!}</p>
</div>

<!-- Ms Ver Field -->
<div class="form-group">
    {!! Form::label('ms_ver', 'MS Office Version:') !!}
    <p>{!! $inventory->ms_ver !!}</p>
</div>

<!-- Ms Id Field -->
<div class="form-group">
    {!! Form::label('ms_id', 'MS Office Product ID:') !!}
    <p>{!! $inventory->ms_id !!}</p>
</div>

<!-- Ms Status Field -->
<div class="form-group">
    {!! Form::label('ms_status', 'MS Office Status:') !!}
    <p>{!! $inventory->ms_status !!}</p>
</div>

<!-- Tech Key Field -->
<!-- <div class="form-group">
    {!! Form::label('tech_key', 'Data Teknis Key:') !!}
    <p>{!! $inventory->tech_key !!}</p>
</div> -->

<!-- Tech Kode Field --><!-- 
<div class="form-group">
    {!! Form::label('tech_kode', 'Data Teknis Kode:') !!}
    <p>{!! $inventory->tech_kode !!}</p>
</div> -->

<!-- Made In Field -->
<div class="form-group">
    {!! Form::label('made_in', 'Made In:') !!}
    <p>{!! $inventory->made_in !!}</p>
</div>

<!-- Made Year Field -->
<div class="form-group">
    {!! Form::label('made_year', 'Made Year:') !!}
    <p>{!! $inventory->made_year !!}</p>
</div>

<!-- Vendor Name Field -->
<!-- <div class="form-group">
    {!! Form::label('vendor_name', 'Vendor Name:') !!}
    <p>{!! $inventory->vendor_name !!}</p>
</div> -->

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    <p>
      @if($inventory->is_active==0)
        <span class='label label-danger'>Non-Aktif</span>
      @else
        <span class='label label-success'>Aktif</span>
      @endif
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat Pada:') !!}
    <p>{!! $inventory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diubah Pada:') !!}
    <p>{!! $inventory->updated_at !!}</p>
</div>
