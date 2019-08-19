<div class="row">
    <div class="form-group col-md-3">
        {!! Form::label('cat_id', 'NIP Pemilik Perangkat:') !!}
        <p>{!! ($inventory->pemilik_perangkat->nip ?? '').' - '.($inventory->pemilik_perangkat->name ?? '')!!}</p>
    </div>
    <!-- Cat Id Field -->
    <div class="form-group col-md-3">
        {!! Form::label('cat_id', 'Category/Type Device:') !!}
        <p>{!! $inventory->cat_inventory->nama_cat ?? '' !!}</p>
    </div>
    
    <!-- Pos Unit Field -->
    <div class="form-group col-md-3">
        {!! Form::label('nama_perangkat', 'Nama Perangkat:') !!}
        <p>{!! $inventory->nama_perangkat !!}</p>
    </div>
    <div class="form-group col-md-3">
            {!! Form::label('lokasi', 'Lokasi:') !!}
            <p>{!! $inventory->lokasi !!}</p>
        </div>
</div>


<div class="row">
   
<!-- Type Alat Field -->
<div class="form-group col-md-3">
    {!! Form::label('type_alat', 'Type Alat:') !!}
    <p>{!! $inventory->type_alat !!}</p>   
</div>

<!-- Sernum Field -->
<div class="form-group col-md-3">
    {!! Form::label('sernum', 'Sernum:') !!}
    <p>{!! $inventory->sernum !!}</p>
</div>

<!-- Nama Perangkat Field -->
<div class="form-group col-md-3">
    {!! Form::label('made_in', 'Made in:') !!}
    <p>{!! $inventory->made_in !!}</p>
</div>

<div class="form-group col-md-3">
    {!! Form::label('made_year', 'Made Year:') !!}
    <p>{!! $inventory->made_year !!}</p>
</div>
</div>
 

<div class="row">
    <div class="form-group col-md-3">
        {!! Form::label('condition', 'Condition:') !!}
        <p>{!! $inventory->condition !!}</p>
    </div>
    
    
    <div class="form-group col-md-3">
        {!! Form::label('nama_perangkat_full', 'Nama Perangkat Full:') !!}
        <p>{!! $inventory->nama_perangkat_full !!}</p>
    </div>
    
    <!-- Osver Field -->
    <div class="form-group col-md-3">
        {!! Form::label('join_domain', 'Join Domain:') !!}
        <p>{!! $inventory->join_domain !!}</p>
    </div>
    
    <!-- Os License Field -->
    <div class="form-group col-md-3">
        {!! Form::label('update_kasp', 'update kasp:') !!}
        <p>{!! $inventory->update_kasp !!}</p>
    </div>
</div>

<div class="row">
    <!-- Os Status Field -->
<div class="form-group col-md-3">
    {!! Form::label('ip_addr', 'IP address:') !!}
    <p>{!! $inventory->ip_addr !!}</p>
</div>

<!-- Av Type Field -->
<div class="form-group col-md-3">
    {!! Form::label('mask', 'Mask:') !!}
    <p>{!! $inventory->mask !!}</p>
</div>

<!-- Av License Field -->
<div class="form-group col-md-3">
    {!! Form::label('gateway', 'Gateway:') !!}
    <p>{!! $inventory->gateway !!}</p>
</div>

<!-- Ms Ver Field -->
<div class="form-group col-md-3">
    {!! Form::label('dns1', 'DNS 1:') !!}
    <p>{!! $inventory->dns1 !!}</p>
</div>
</div>

<div class="row">
    <!-- Ms Id Field -->
<div class="form-group col-md-3">
    {!! Form::label('dns2', 'DNS 2:') !!}
    <p>{!! $inventory->dns2 !!}</p>
</div>

<!-- Ms Status Field -->
<div class="form-group col-md-3">
    {!! Form::label('dns3', 'DNS 3:') !!}
    <p>{!! $inventory->dns3 !!}</p>
</div>

<!-- Tech Key Field -->
<div class="form-group col-md-3">
    {!! Form::label('ip_type', 'IP Type:') !!}
    <p>{!! $inventory->ip_type !!}</p>
</div>
<!-- Tech Kode Field -->
 <div class="form-group col-md-3">
    {!! Form::label('conn_type', 'Connection Type:') !!}
    <p>{!! $inventory->conn_type !!}</p>
</div>
</div>

<div class="row">
<!-- Made In Field -->
<div class="form-group col-md-3">
    {!! Form::label('mac_addr', 'Mac Address :') !!}
    <p>{!! $inventory->mac_addr !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group col-md-3">
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
<div class="form-group col-md-3">
    {!! Form::label('created_at', 'Dibuat Pada:') !!}
    <p>{!! $inventory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-md-3">
    {!! Form::label('updated_at', 'Diubah Pada:') !!}
    <p>{!! $inventory->updated_at !!}</p>
</div>

</div>
