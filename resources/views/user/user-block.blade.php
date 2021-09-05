<div id="action-{{$id}}" class="action-column" data-id="{{$id}}">
    @if($active)
        <span class="action-delete">
            <a class='btn btn-sm btn-default text-danger shadow btn-delete' href='javascript:deleteDialog("{{ $block_url }}", "Apakah anda yakin akan melakukan Block?");'><i class='fa fa-ban'></i> Block</a>
        </span>
    @endif

    @if(!$active)
        <span class="action-delete">
        <a class='btn btn-sm btn-default text-success shadow btn-success' href='javascript:deleteDialog("{{ $block_url }}", "Apakah anda yakin akan melakukan Unblock?");'><i class='fa fa-check-circle'></i> Unblock</a>
    </span>
    @endif
</div>
