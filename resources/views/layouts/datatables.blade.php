<div id="action-{{$action_id}}" class="action-column" data-id="{{$action_id}}">
    @if(isset($show_url))
        <span class="action-show">
            <a href='{{ $show_url }}' class='btn btn-sm btn-default text-teal shadow' ><i class='fa fa-eye'></i></a>
        </span>
    @endif
    @if(isset($edit_url))
        <span class="action-edit">
            <a href='{{ $edit_url }}' class='btn btn-sm btn-default text-primary shadow' ><i class='fa fa-pen'></i></a>
        </span>
    @endif
    @if(isset($delete_url))
        <span class="action-delete">
            <a class='btn btn-sm btn-default text-danger shadow btn-delete' href='javascript:deleteDialog("{{ $delete_url }}", "Are you sure want to delete?");'><i class='fa fa-trash'></i></a>
        </span>
    @endif
</div>