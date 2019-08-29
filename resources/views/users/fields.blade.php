<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

@if(empty($users->password))

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Password Confirmation:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
@else
@hasrole('Admin|IT Administrator|IT Support|IT Operasional')
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('ubah_password', 'Ubah  Password:') !!}
        <input type="checkbox" id="myCheck"   name="ubah_password" onclick="passwordfield()">
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control password', 'disabled'=>'disabled']) !!}
    </div>
    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password_confirmation', 'Password Confirmation:') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control password-confirmation', 'disabled'=>'disabled']) !!}
    </div>
@endhasrole
@endif



@hasrole('Admin|IT Non Public')
<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('roles', 'Roles:') !!}
    {!! Form::select('roles', $role, null, ['class' => 'form-control']) !!}
</div>
@endhasrole


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
@section('scripts')
    <script type="text/javascript">

            function passwordfield(){
                $(".password").val(null);
                $(".password").attr('disabled', !$(".password").attr('disabled'));
                $(".password-confirmation").val(null);
                $(".password-confirmation").attr('disabled', !$(".password-confirmation").attr('disabled'));
            };
    </script>
@endsection