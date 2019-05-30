{!! Form::hidden('request_id', Auth::id(), ['class' => 'form-control']) !!}
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

<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dev_ser_num', 'Serial Number/Device ID:') !!}
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


<!-- Prob Desc Field -->
@hasrole('User')

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('prob_desc', 'Deskripsi Keluhan:') !!}
    {!! Form::textarea('prob_desc', null, ['class' => 'form-control', 'id' => 'editor' ]) !!}
</div>
@endrole


@hasrole('IT Support|IT Administrator|IT Operasional')

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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('issues.index') !!}" class="btn btn-default">Batal</a>
</div>
