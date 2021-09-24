<x-app-layout>
    <x-slot name="header">
        {{ __('Road') }}
    </x-slot>

    <x-response-status />

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="py-2">
                @can('planner')
                    <a href="{{ route('roads.create') }}"><span class="btn btn-primary text-light font-weight-bold">{{ __('New Planning') }}</span></a>
                @endcan
                    <form action="{{ route('roads.export') }}" target="_blank" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-success text-light font-weight-bold" type="submit">{{ __('Roads Export') }}</button>
                    </form>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="dtable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>{{__('Road Name')}}</th>
                            <th>{{__('Village')}}</th>
                            <th>{{__('District')}}</th>
                            <th>{{__('City')}}</th>
                            <th>{{__('Province')}}</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $(document).ready(function(){
        $("#dtable").DataTable({
            searching: true,
            processing: true,
            serverSide: true,
            ajax: `{{ url('roads/datatable') }}`,
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'village.name',
                    name: 'village_id',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'district.name',
                    name: 'district_id',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'city.name',
                    name: 'city_id',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'province.name',
                    name: 'province_id',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'latest_progression.status',
                    name: 'latest_progression',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                    render:function( data, type, row, meta ) {
                        let edit = document.querySelector(`#action-${row.id} .action-edit`);
                        let destroy = document.querySelector(`#action-${row.id} .action-delete`);
                        if(row.latest_progression.status != 'planning') {
                            if(edit != null)
                                edit.remove();

                            if(destroy != null)
                                destroy.remove();
                        }
                        return data;
                    }
                }
            ],
        });
    });
</script>
