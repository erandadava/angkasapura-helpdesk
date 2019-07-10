{!! Form::open(['route' => ['inventories.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('issues.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @hasrole('IT Operasional')
        &nbsp;&nbsp;<input type='checkbox' name='exportid[]' id='checkexport{{$id}}' onclick = "tocheck({{$id}})">
    @endhasrole
</div>
{!! Form::close() !!}
