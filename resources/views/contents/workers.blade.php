<div class="p-4 sm:ml-64">
    <div class="p-4  mt-14">
        @include('includes._breadcrumb')

        <div class="mt-8 relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Worker Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        State
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Works
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($workers as $worker)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$worker->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$worker->state}}
                    </td>
                    <td class="px-6 py-4">
                        {{$worker->works}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="m-5">
            {{ $workers->links() }}
        </div>
    </div>
</div>
