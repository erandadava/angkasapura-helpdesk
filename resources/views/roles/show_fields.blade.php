<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $roles->id !!}</p>
</div>

<!-- Role Name Field -->
<div class="form-group">
    {!! Form::label('role_name', 'Role Name:') !!}
    <p>{!! $roles->role_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{!! $roles->is_active !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $roles->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $roles->updated_at !!}</p>
</div>

