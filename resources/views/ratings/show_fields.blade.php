<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $rating->id !!}</p>
</div>

<!-- Rate Field -->
<div class="form-group">
    {!! Form::label('rate', 'Rate:') !!}
    <p>{!! $rating->rate !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $rating->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $rating->updated_at !!}</p>
</div>

