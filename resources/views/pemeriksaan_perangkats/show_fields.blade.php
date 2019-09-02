
<!-- Nama Pengguna Pc Field -->
<div class="form-group">
    {!! Form::label('nama_pengguna_pc', 'Nama Pengguna Pc:') !!}
    <p>{!! $pemeriksaanPerangkat->nama_pengguna_pc !!}</p>
</div>

<!-- Lokasi Field -->
<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    <p>{!! $pemeriksaanPerangkat->lokasi !!}</p>
</div>

<!-- Serial Number Field -->
<div class="form-group">
    {!! Form::label('serial_number', 'Serial Number:') !!}
    <p>{!! $pemeriksaanPerangkat->serial_number !!}</p>
</div>

<!-- Tanggal Pengecekan Field -->
<div class="form-group">
    {!! Form::label('tanggal_pengecekan', 'Tanggal Pengecekan:') !!}
    <p>{!! $pemeriksaanPerangkat->tanggal_pengecekan !!}</p>
</div>

<!-- Mulai Jam Pengecekan Field -->
<div class="form-group">
    {!! Form::label('mulai_jam_pengecekan', 'Mulai Jam Pengecekan:') !!}
    <p>{!! $pemeriksaanPerangkat->mulai_jam_pengecekan !!}</p>
</div>

<!-- Selesai Jam Pengecekan Field -->
<div class="form-group">
    {!! Form::label('selesai_jam_pengecekan', 'Selesai Pengecekan:') !!}
    <p>{!! $pemeriksaanPerangkat->selesai_jam_pengecekan !!}</p>
</div>

<!-- Full Computer Name Field -->
<div class="form-group">
    {!! Form::label('full_computer_name', 'Full Computer Name:') !!}
    <p>{!! $pemeriksaanPerangkat->full_computer_name !!}</p>
</div>

<!-- Join Domain Field -->
<div class="form-group">
    {!! Form::label('join_domain', 'Join Domain:') !!}
    <p>{!! $pemeriksaanPerangkat->join_domain !!}</p>
</div>

<!-- Update Kaspersky Field -->
<div class="form-group">
    {!! Form::label('update_kaspersky', 'Update Kaspersky:') !!}
    <p>{!! $pemeriksaanPerangkat->update_kaspersky !!}</p>
</div>

<!-- Tanggal Update Field -->
<div class="form-group">
    {!! Form::label('tanggal_update', 'Tanggal Update:') !!}
    <p>{!! $pemeriksaanPerangkat->tanggal_update !!}</p>
</div>

<!-- Tipe Koneksi Field -->
<div class="form-group">
    {!! Form::label('tipe_koneksi', 'Tipe Koneksi:') !!}
    <p>{!! $pemeriksaanPerangkat->tipe_koneksi !!}</p>
</div>

<!-- Tipe Ip Field -->
<div class="form-group">
    {!! Form::label('tipe_ip', 'Tipe Ip:') !!}
    <p>{!! $pemeriksaanPerangkat->tipe_ip !!}</p>
</div>

<!-- Mac Address Field -->
<div class="form-group">
    {!! Form::label('mac_address', 'Mac Address:') !!}
    <p>{!! $pemeriksaanPerangkat->mac_address !!}</p>
</div>

<!-- Ip Address Field -->
<div class="form-group">
    {!! Form::label('ip_address', 'Ip Address:') !!}
    <p>{!! $pemeriksaanPerangkat->ip_address !!}</p>
</div>

<!-- Subnet Mask Field -->
<div class="form-group">
    {!! Form::label('subnet_mask', 'Subnet Mask:') !!}
    <p>{!! $pemeriksaanPerangkat->subnet_mask !!}</p>
</div>

<!-- Gateway Field -->
<div class="form-group">
    {!! Form::label('gateway', 'Gateway:') !!}
    <p>{!! $pemeriksaanPerangkat->gateway !!}</p>
</div>

<!-- Dns1 Field -->
<div class="form-group">
    {!! Form::label('dns1', 'Dns1:') !!}
    <p>{!! $pemeriksaanPerangkat->dns1 !!}</p>
</div>

<!-- Dns2 Field -->
<div class="form-group">
    {!! Form::label('dns2', 'Dns2:') !!}
    <p>{!! $pemeriksaanPerangkat->dns2 !!}</p>
</div>

<!-- Dns3 Field -->
<div class="form-group">
    {!! Form::label('dns3', 'Dns3:') !!}
    <p>{!! $pemeriksaanPerangkat->dns3 !!}</p>
</div>

<!-- Ttd It Senior Field -->
<div class="form-group">
    {!! Form::label('ttd_it_senior', 'Ttd It Senior:') !!}
    </br>
    <img src="{{asset('storage/'.$pemeriksaanPerangkat->ttd_it_senior)}}" alt="" srcset="">
</div>

<!-- Ttd Admin Aps Field -->
<div class="form-group">
    {!! Form::label('ttd_admin_aps', 'Ttd Admin Aps:') !!}
    </br>
    <img src="{{asset('storage/'.$pemeriksaanPerangkat->ttd_admin_aps)}}" alt="" srcset="">
</div>

<!-- Teknisi Aps Field -->
<div class="form-group">
    {!! Form::label('teknisi_aps', 'Teknisi Aps:') !!}
    </br>
    <img src="{{asset('storage/'.$pemeriksaanPerangkat->teknisi_aps )}}" alt="" srcset="">
</div>

<!-- User Field -->
<div class="form-group">
    {!! Form::label('user', 'User:') !!}
    </br>
    <img src="{{asset('storage/'.$pemeriksaanPerangkat->user )}}" alt="" srcset="">
</div>

<!-- It Non Public Field -->
<div class="form-group">
    {!! Form::label('it_non_public', 'It Non Public:') !!}
    </br>
    <img src="{{asset('storage/'.$pemeriksaanPerangkat->it_non_public )}}" alt="" srcset="">
</div>

<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    </br>
    <div class="row">
        @if(isset($pemeriksaanPerangkat['Foto']))
            @foreach($pemeriksaanPerangkat['Foto'] as $key => $dt)
                    <div class="col-6 col-md-3">
                        <a href="{{'/storage/'.$dt}}"><img src="{{asset('/storage/'.$dt)}}" width="100%" alt="" srcset=""></a>
                    </div>
            @endforeach
        @endif
    </div>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pemeriksaanPerangkat->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pemeriksaanPerangkat->updated_at !!}</p>
</div>


