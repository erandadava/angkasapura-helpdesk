<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $users->name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    <p>{!! $users->username !!}</p>
</div>


<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $users->email !!}</p>
</div>

@if($users->model_has_roles->roles->name == 'IT Support' || $users->model_has_roles->roles->name == 'IT Operasional')
<div class="form-group">
    {!! Form::label('ratebulan', 'Avg Rating Tahun Ini:') !!}
    <p><span class='glyphicon glyphicon-star' style='color:orange'></span> {!! $users->ratetahun !!}</p>
</div>

<div class="form-group">
    {!! Form::label('ratebulan', 'Avg Rating Bulan Ini:') !!}
    <p><span class='glyphicon glyphicon-star' style='color:orange'></span> {!! $users->ratebulan !!}</p>
</div>
@endif

@hasrole('Admin')
<div class="form-group">
    {!! Form::label('roles', 'Tugas:') !!}
    <p>{!! $users->model_has_roles->roles->name !!}</p>
</div>
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $users->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $users->updated_at !!}</p>
</div>
@endhasrole


