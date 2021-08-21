<x-app-layout>
    <x-slot name="header">
        {{ __('Road Execution') }}
    </x-slot>

    <x-response-status />

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">

            <div class="table-responsive">
                <table class="table table-sm table-hover" id="dtable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>Road Name</th>
                        <th>Village</th>
                        <th>District</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Status</th>
                        <th>Execution</th>
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
            ajax: `{{ url('progressions/datatable') }}`,
            columns: [
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
                    data: 'execution',
                    orderable: false,
                    searchable: false,
                }
            ],
        });
    });
</script>
