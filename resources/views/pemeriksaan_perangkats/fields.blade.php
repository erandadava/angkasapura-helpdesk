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
    <div class="input-group clockpicker" data-align="top" data-autoclose="true">
        <input type="text" name="mulai_jam_pengecekan" class="form-control">
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
        </span>
    </div>
</div>

<!-- Selesai Jam Pengecekan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('selesai_jam_pengecekan', 'Jam Selesai Pengecekan:') !!}
    <div class="input-group clockpicker" data-align="top" data-autoclose="true">
        <input type="text" name="selesai_jam_pengecekan" class="form-control">
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
        </span>
    </div>
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
    {!! Form::label('ttd_it_senior', 'Ttd IT Senior: (Optional)') !!}
    @if(empty($pemeriksaanPerangkat->ttd_it_senior))
        <div id="signature_ttd_it_senior" style='border:1px solid black;'></div>
        <input type="hidden" name="ttd_it_senior" id="hdsignature_ttd_it_senior" />
    @else
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->ttd_it_senior)}}" alt="" srcset="">
    @endif
</div>

<!-- Ttd Admin Aps Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttd_admin_aps', 'Ttd Admin APS: (Optional)') !!}
    @if(empty($pemeriksaanPerangkat->ttd_admin_aps))
        <div id="signature_ttd_admin_aps" style='border:1px solid black;'></div>
        <input type="hidden" name="ttd_admin_aps" id="hdsignature_ttd_admin_aps" />
    @else
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->ttd_admin_aps)}}" alt="" srcset="">
    @endif
    
</div>

<!-- Teknisi Aps Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teknisi_aps', 'Teknisi APS: (Optional)') !!}
    
    @if(empty($pemeriksaanPerangkat->teknisi_aps))
    <div id="signature_ttd_teknisi_aps" style='border:1px solid black;'></div>
    <input type="hidden" name="ttd_teknisi_aps" id="hdsignature_ttd_teknisi_aps" />
    @else
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->teknisi_aps)}}" alt="" srcset="">
    @endif
</div>

<!-- User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user', 'User: (Optional)') !!}
    @if(empty($pemeriksaanPerangkat->user))
        <div id="signature_ttd_user" style='border:1px solid black;'></div>
        <input type="hidden" name="ttd_user" id="hdsignature_ttd_user" />
    @else
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->user)}}" alt="" srcset="">
    @endif
    
</div>

<!-- It Non Public Field -->
<div class="form-group col-sm-6">
    {!! Form::label('it_non_public', 'IT Non Public: (Optional)') !!}
    @if(empty($pemeriksaanPerangkat->it_non_public))
        <div id="signature_ttd_it_non_public" style='border:1px solid black;'></div>
        <input type="hidden" name="ttd_it_non_public" id="hdsignature_ttd_it_non_public" />
    @else
        <img src="{{asset('storage/'.$pemeriksaanPerangkat->it_non_public)}}" alt="" srcset="">
    @endif
    
</div>


@if(isset($pemeriksaanPerangkat['Foto']))
    <div class="form-group col-sm-12 col-lg-12">
    @foreach($pemeriksaanPerangkat['Foto'] as $key => $dt)
            <div class="col-6 col-md-3">
                <a href="{{'/storage/'.$dt}}"><img src="{{asset('/storage/'.$dt)}}" width="100%" alt="" srcset=""></a>
            </div>
    @endforeach
    </div>
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('ganti_doc_bpjs_tk', 'Ganti Foto:') !!}
        <input type="checkbox" id="myCheck"   name="ganti_foto" onclick="foto()">
    </div>
    <div class="form-group col-sm-12 col-lg-12">
        <input  type="file"  class="foto" name="foto[]" multiple="multiple" accept="image/png, image/jpeg" disabled="disabled">
    </div>
@else
    <!-- Doc No Bpjs Tk Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('doc_no_bpjs_tk', 'Foto:') !!}
        <input  type="file"  name="foto[]" multiple="multiple" accept="image/png, image/jpeg">
    </div>
@endif







<!-- Submit Field -->

<div class="form-group col-sm-12">
    {!! Form::button('Save', ['class' => 'btn btn-primary', 'id' => 'btn_submit']) !!}
    <a href="{!! route('pemeriksaanPerangkats.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
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

        // $("#signature_ttd_it_senior").jSignature();
        // $("#signature_ttd_admin_aps").jSignature();
        // $("#signature_ttd_teknisi_aps").jSignature();
        // $("#signature_ttd_user").jSignature();
        // $("#signature_ttd_it_non_public").jSignature();
        // console.log('halooo');
        var sigdiv = $("#signature_ttd_it_senior");
        sigdiv.jSignature();// inits the jSignature widget.

        var sigdiv2 = $("#signature_ttd_admin_aps");
        sigdiv2.jSignature();

        var sigdiv3 = $("#signature_ttd_teknisi_aps");
        sigdiv3.jSignature();

        var sigdiv4 = $("#signature_ttd_user");
        sigdiv4.jSignature();

        var sigdiv5 = $("#signature_ttd_it_non_public");
        sigdiv5.jSignature();
        
        //save data to hidden field before submiting the form
        $('#btn_submit').click(function () {
            @if(empty($pemeriksaanPerangkat->ttd_it_senior))
                if(sigdiv.jSignature('getData', 'native').length != 0){
                    var datapair = sigdiv.jSignature("getData", "image");
                    $('#hdsignature_ttd_it_senior').val(datapair[1]);
                }
            @endif
            
            @if(empty($pemeriksaanPerangkat->ttd_admin_aps))
                if(sigdiv2.jSignature('getData', 'native').length != 0){
                    var datapair2 = sigdiv2.jSignature("getData", "image");
                    $('#hdsignature_ttd_admin_aps').val(datapair2[1]);
                }
            @endif

            @if(empty($pemeriksaanPerangkat->teknisi_aps))
                if(sigdiv3.jSignature('getData', 'native').length != 0){
                    var datapair3 = sigdiv3.jSignature("getData", "image");
                    $('#hdsignature_ttd_teknisi_aps').val(datapair3[1]);
                }
            @endif

            @if(empty($pemeriksaanPerangkat->user))
                if(sigdiv4.jSignature('getData', 'native').length != 0){
                    var datapair4 = sigdiv4.jSignature("getData", "image");
                    $('#hdsignature_ttd_user').val(datapair4[1]);
                }
            @endif

            @if(empty($pemeriksaanPerangkat->it_non_public))
                if(sigdiv5.jSignature('getData', 'native').length != 0){
                    var datapair5 = sigdiv5.jSignature("getData", "image");
                    $('#hdsignature_ttd_it_non_public').val(datapair5[1]);
                }
            @endif

            //now submit form 
            $('.form-perangkat').submit();
        });
    });


    function foto(){
            $(".foto").val(null);
            $(".foto").attr('disabled', !$(".foto").attr('disabled'));
        };
    </script>
@endsection