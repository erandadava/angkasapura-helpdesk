    <div class='btn-group'>
        <a href="{{ route('issues.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    </div>
    @hasrole('User')
    <div class="btn-group">
    <a href="{{ route('issues.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    </div>
    @endhasrole



