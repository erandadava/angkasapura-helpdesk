{!! Form::open(['route' => ['inventories.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('inventories.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
        &nbsp;&nbsp;<input type='checkbox' name='exportid[]' id='checkexport{{$id}}' onclick = "tocheck({{$id}})">
</div>
{!! Form::close() !!}
