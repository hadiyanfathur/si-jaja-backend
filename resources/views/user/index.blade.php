<x-app-layout>
    <x-slot name="header">
        {{ __('User') }}
    </x-slot>

    <x-response-status />

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">

            <div class="table-responsive">
                <table class="table table-sm table-hover" id="dtable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>{{ __("Name") }}</th>
                        <th>{{ __("Email") }}</th>
                        <th>{{ __("Block/Unblock") }}</th>
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
            ajax: `{{ url('users/datatable') }}`,
            columns: [
                {
                    data: 'name',
                    name: 'name',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'block',
                    orderable: false,
                    searchable: false,
                }
            ],
        });
    });
</script>
