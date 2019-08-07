@hasrole('IT Administrator|IT Non Public|User')
    {!! Form::hidden('request_id', Auth::id(), ['class' => 'form-control']) !!}
@endhasrole
@hasrole('IT Support')
    @if ($status_jam == 1)
        {!! Form::hidden('request_id', Auth::id(), ['class' => 'form-control']) !!}
    @endif
@endhasrole
<!-- Issue Id Field
<div class="form-group col-sm-6">
    {!! Form::label('issue_id', 'Issue Id:') !!}
    {!! Form::text('issue_id', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_id', 'Kategori:') !!}
    {!! Form::select('cat_id', $category, null, ['class' => 'form-control']) !!}
</div>

<!-- Prio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prio_id', 'Prioritas:') !!}
    {!! Form::select('prio_id', $priority, null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Lokasi:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group col-sm-6">
    {!! Form::label('other_device', 'Perangkat Lain:') !!}
    {!! Form::text('other_device', null, ['class' => 'form-control']) !!}
</div>

<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dev_ser_num', 'Serial Number/ID Perangkat:') !!}
    <select class="form-control" name="dev_ser_num">
        @foreach($sernum as $key => $val)
        <optgroup label="{{$val->nama_cat}}">
            @foreach($val->inventory as $dt)
                <option value="{{$dt->id}}">{{$dt->sernumid}}</option>
            @endforeach
        </optgroup>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('no_tlp', 'Nomor Telepon:') !!}
    {!! Form::text('no_tlp', null, ['class' => 'form-control', 'pattern' => '\d*']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('id_unit_kerja', 'Unit Kerja:') !!}
    </br>
    {!!  \Auth::user()->unit_kerja->nama_uk ?? ''!!}
    {!! Form::hidden('id_unit_kerja', \Auth::user()->id_unit_kerja, ['class' => 'uk-input', 'id'=>'form-stacked-text']) !!}
</div>
{{-- <div class="form-group col-sm-6">
    {!! Form::label('id_unit_kerja', 'Unit Kerja:') !!}
    {!! Form::select('id_unit_kerja', $data_unit, null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('prob_desc', 'Deskripsi Keluhan:') !!}
    {!! Form::textarea('prob_desc', null, ['class' => 'form-control', 'id' => 'editor' ]) !!}
</div>

@hasrole('IT Administrator|IT Non Public')
@if (isset($petugas))
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('assign_petugas', 'Assign Petugas :') !!}
        {!! Form::select('assign_petugas',$petugas, null, ['class' => 'form-control select2', 'style'=>'width:100%;']) !!}
    </div>
@endif
@endhasrole

@hasrole('IT Support')
@if (isset($petugas) && $status_jam == 1)
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('assign_petugas', 'Assign Petugas :') !!}
        {!! Form::select('assign_petugas',$petugas, null, ['class' => 'form-control select2', 'style'=>'width:100%;']) !!}
    </div>
@endif
@endhasrole






@hasrole('IT Support|IT Administrator|IT Operasional')

@if(isset($issues))
    @if($issues->status == 'ITOPS')
    <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('reason_desc', 'Deskripsi Alasan:') !!}
            {!! Form::textarea('reason_desc', null, ['class' => 'form-control', 'id' => 'editor2']) !!}
    </div>
    @elseif($issues->status == 'CLOSE')
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('solution_desc', 'Deskripsi Solusi:') !!}
        {!! Form::textarea('solution_desc', null, ['class' => 'form-control', 'id' => 'editor3']) !!}
    </div>
    @endif
@endif

@endrole

<!-- Complete By Field
<div class="form-group col-sm-6">
    {!! Form::label('complete_by', 'Complete By:') !!}
    {!! Form::number('complete_by', null, ['class' => 'form-control']) !!}
</div> -->


<!-- Is Archive Field
<div class="form-group col-sm-6">
    {!! Form::label('is_archive', 'Is Archive:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_archive', 0) !!}
        {!! Form::checkbox('is_archive', '1', null) !!} 1
    </label>
</div> -->
@if (!isset($issues))
    @hasrole('IT Support')
    @if($status_jam == 1)
    <div class="form-group col-sm-6">
        {!! Form::label('untuk_user', 'Untuk user?') !!}
        </br>
        <input type="checkbox" name="untuk_user" onclick="us();" value="1"> Ya
        </br>
        <div class="select-data-user">
                {!! Form::label('request_id_user', 'Request Oleh:') !!}
                {!! Form::select('request_id_user', $data_user, null, ['class' => 'form-control select2', 'style'=>'width:100%;']) !!}
        </div>
    </div>
    @endif
    @endhasrole
    @hasrole('IT Administrator')
    <div class="form-group col-sm-6">
        {!! Form::label('untuk_user', 'Untuk user?') !!}
        </br>
        <input type="checkbox" name="untuk_user" onclick="us();" value="1"> Ya
        </br>
        <div class="select-data-user">
                {!! Form::label('request_id_user', 'Request Oleh:') !!}
                {!! Form::select('request_id_user', $data_user, null, ['class' => 'form-control select2', 'style'=>'width:100%;']) !!}
        </div>
    </div>
    @endhasrole
@endif
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('issues.index') !!}" class="btn btn-default">Batal</a>
</div>
@section('scripts')
    <script type="text/javascript">
        var status = 0;
        $(".select-data-user").hide();
        var us = function untuk_user(){
            $(".select-data-user").val('');
            if(status == 0){
                status = 1;
                $(".select-data-user").show();
            }else{
                status = 0;
                $(".select-data-user").hide();
            }
        };
    </script>
@endsection