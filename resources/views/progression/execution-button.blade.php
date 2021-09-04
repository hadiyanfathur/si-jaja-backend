@if(isset($execution_url))
    <span class="action-show">
        <a href='{{ $execution_url }}' class='btn btn-sm btn-default text-teal shadow' ><i class='fa fa-pen'></i> {{ __("Create")}}</a>
    </span>
@endif
