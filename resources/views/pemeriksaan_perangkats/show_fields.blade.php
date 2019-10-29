
<div class="row">
    <!-- Nama Pengguna Pc Field -->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('nama_pengguna_pc', 'Nama Pengguna Pc:') !!}
            {!! $pemeriksaanPerangkat->nama_pengguna_pc !!}
        </div>
    </div>


    <!-- Lokasi Field -->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('lokasi', 'Lokasi:') !!}
            {!! $pemeriksaanPerangkat->lokasi !!}
        </div>
    </div>

    <!-- Serial Number Field -->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('serial_number', 'Serial Number:') !!}
            {!! $pemeriksaanPerangkat->serial_number !!}
        </div>
    </div>

    <!-- Tanggal Pengecekan Field -->
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('tanggal_pengecekan', 'Tanggal Pengecekan:') !!}
            {!! $pemeriksaanPerangkat->tanggal_pengecekan !!}
        </div>
    </div>

    <!-- Mulai Jam Pengecekan Field -->
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('mulai_jam_pengecekan', 'Mulai Jam Pengecekan:') !!}
            {!! $pemeriksaanPerangkat->mulai_jam_pengecekan !!}
        </div>
        
    </div>

    <!-- Selesai Jam Pengecekan Field -->
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('selesai_jam_pengecekan', 'Selesai Pengecekan:') !!}
            {!! $pemeriksaanPerangkat->selesai_jam_pengecekan !!}
        </div>
    </div>
</div>

<hr>

<div class="row">


    <!-- Full Computer Name Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('full_computer_name', 'Full Computer Name:') !!}
        {!! $pemeriksaanPerangkat->full_computer_name !!}
    </div>
</div>

    <!-- Join Domain Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('join_domain', 'Join Domain:') !!}
        @if ($pemeriksaanPerangkat->join_domain == 1)
            Yes
        @else
           No 
        @endif
    </div>
</div>

</div>
<div class="row">
     <!-- Update Kaspersky Field -->
    <div class="col-md-12">
     <div class="form-group">
        {!! Form::label('update_kaspersky', 'Update Kaspersky:') !!}
        @if ($pemeriksaanPerangkat->update_kaspersky == 1)
            Yes
        @else
           No 
        @endif
    </div>
</div>

    <!-- Tanggal Update Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('tanggal_update', 'Tanggal Update:') !!}
        {!! $pemeriksaanPerangkat->tanggal_update !!}
    </div>
</div>

    <!-- Tipe Koneksi Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('tipe_koneksi', 'Tipe Koneksi:') !!}
        {!! $pemeriksaanPerangkat->tipe_koneksi !!}>
    </div>
</div>

    <!-- Tipe Ip Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('tipe_ip', 'Tipe Ip:') !!}
        {!! $pemeriksaanPerangkat->tipe_ip !!}
    </div>
</div>
</div>

<div class="row">
    <!-- Mac Address Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('mac_address', 'Mac Address:') !!}
        {!! $pemeriksaanPerangkat->mac_address !!}
    </div>
</div>

    <!-- Ip Address Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('ip_address', 'Ip Address:') !!}
        {!! $pemeriksaanPerangkat->ip_address !!}
    </div>
</div>

    <!-- Subnet Mask Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('subnet_mask', 'Subnet Mask:') !!}
        {!! $pemeriksaanPerangkat->subnet_mask !!}
    </div>
</div>

    <!-- Gateway Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('gateway', 'Gateway:') !!}
        {!! $pemeriksaanPerangkat->gateway !!}
    </div>
</div>

</div>
<div class="row">
    <!-- Dns1 Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('dns1', 'Dns1:') !!}
        {!! $pemeriksaanPerangkat->dns1 !!}
    </div>
</div>

    <!-- Dns2 Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('dns2', 'Dns2:') !!}
        {!! $pemeriksaanPerangkat->dns2 !!}
    </div>
</div>

    <!-- Dns3 Field -->
    <div class="col-md-12">
    <div class="form-group">
        {!! Form::label('dns3', 'Dns3:') !!}
        {!! $pemeriksaanPerangkat->dns3 !!}
    </div>
</div>
</div>

<div class="row">
    <!-- Ttd It Senior Field -->
    <div class="col-md-3" >
    <div class="form-group">
        {!! Form::label('ttd_it_senior', 'Ttd It Senior:') !!}
        </br>
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->ttd_it_senior)}}" alt="" srcset="" class="col-sm-12">
    </div>
</div>

    <!-- Ttd Admin Aps Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('ttd_admin_aps', 'Ttd Admin Aps:') !!}
        </br>
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->ttd_admin_aps)}}" alt="" srcset="" class="col-sm-12">
    </div>
</div>

<!-- Teknisi Aps Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('teknisi_aps', 'Teknisi Aps:') !!}
        </br>
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->teknisi_aps )}}" alt="" srcset="" class="col-sm-12">
    </div>
</div>

<!-- User Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('user', 'User:') !!}
        </br>
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->user )}}" alt="" srcset="" class="col-sm-12">
    </div>
</div>

</div>

<div class="row">
    
<!-- It Non Public Field -->
    <div class="col-md-3">
    <div class="form-group">
        {!! Form::label('it_non_public', 'It Non Public:') !!}
        </br>
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->it_non_public )}}" alt="" srcset=""  class="col-sm-12">
    </div>
</div>

</div>

<div class="row">
    
    

<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('foto', 'Foto:') !!}
        </br>
        <div class="row">
            @if(isset($pemeriksaanPerangkat['Foto']))
                @foreach($pemeriksaanPerangkat['Foto'] as $key => $dt)
                        <div class="col-md-6">
                            <a href="{{'/storage/'.$dt}}"><img src="{{asset('/storage/'.$dt)}}" width="100%" alt="" srcset=""></a>
                        </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
</div>


<div class="row">
    <!-- Created At Field -->
    <div class="col-md-3">
    <div class="form-group">
        {!! Form::label('created_at', 'Dibuat Pada:') !!}
        <p>{!! $pemeriksaanPerangkat->created_at !!}</p>
    </div>
</div>

    <!-- Updated At Field -->
    <div class="col-md-3">
    <div class="form-group">
        {!! Form::label('updated_at', 'Diubah Pada:') !!}
        <p>{!! $pemeriksaanPerangkat->updated_at !!}</p>
    </div>
</div>
</div>


