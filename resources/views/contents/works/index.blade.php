<div class="p-4 sm:ml-64">
    <div class="p-4  mt-14">
        @include('includes._breadcrumb')
        <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <label for="table-search-users" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>

                    <div class="flex items-center justify-between gap-5">
                        <div class="flex items-center gap-5">
                            <form method="GET" action="{{ route('works.index') }}" class="flex items-center">
                                <input type="text" name="search" id="table-search-users" class="mr-5 block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for worksheets">
                                <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded-lg">Search</button>
                            </form>

                            <a href="{{route("works.index")}}" class="px-3 py-2 bg-gray-500 text-white rounded-lg">Clear</a>
                        </div>
                    </div>

                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Client
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Operator
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Car
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last updated
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($workorders as $workorder)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path fill="currentColor" d="M8 1V0v1Zm4 0V0v1Zm2 4v1h1V5h-1ZM6 5H5v1h1V5Zm2-3h4V0H8v2Zm4 0a1 1 0 0 1 .707.293L14.121.879A3 3 0 0 0 12 0v2Zm.707.293A1 1 0 0 1 13 3h2a3 3 0 0 0-.879-2.121l-1.414 1.414ZM13 3v2h2V3h-2Zm1 1H6v2h8V4ZM7 5V3H5v2h2Zm0-2a1 1 0 0 1 .293-.707L5.879.879A3 3 0 0 0 5 3h2Zm.293-.707A1 1 0 0 1 8 2V0a3 3 0 0 0-2.121.879l1.414 1.414ZM2 6h16V4H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v12h2V6h-2Zm0 12v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V6H0v12h2ZM2 6V4a2 2 0 0 0-2 2h2Zm16.293 3.293C16.557 11.029 13.366 12 10 12c-3.366 0-6.557-.97-8.293-2.707L.293 10.707C2.557 12.971 6.366 14 10 14c3.634 0 7.444-1.03 9.707-3.293l-1.414-1.414ZM10 9v2a2 2 0 0 0 2-2h-2Zm0 0H8a2 2 0 0 0 2 2V9Zm0 0V7a2 2 0 0 0-2 2h2Zm0 0h2a2 2 0 0 0-2-2v2Z"/>
                            </svg>
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$workorder->owner->first_name}} {{$workorder->owner->last_name}}</div>
                                <div class="font-normal text-gray-500"></div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            @foreach($workorder->users as $user)
                                @if($user->role->name == 'operator')
                                    {{$user->name}}
                                @endif
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{$workorder->owner->cars[0]->make." ".$workorder->owner->cars[0]->model}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{$workorder->updated_at}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('works.show', $workorder->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">View</a>
                            @if($workorder->status != 'Finished')
                            <a href="{{route('works.edit', $workorder->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                            <form class="inline max-w-sm mx-auto" method="POST" action="{{route('works.update', $workorder->id)}}">
                                @csrf
                                @method('PUT')
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit">Finish</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="m-5">
                {{$workorders->links()}}
            </div>

        </div>
    </div>
</div>
