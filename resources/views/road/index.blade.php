<x-app-layout>
    <x-slot name="header">
        {{ __('Road') }}
    </x-slot>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="py-2">
                <a href="{{ route('road.create') }}"><span class="btn btn-primary text-light font-weight-bold">New Planning</span></a>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="dtable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Road Name</th>
                            <th>Village</th>
                            <th>District</th>
                            <th>Province</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    //datatable
</script>
