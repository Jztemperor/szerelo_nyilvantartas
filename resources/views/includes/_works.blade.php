
<h1 class="mb-8 text-center text-5xl font-extrabold dark:text-white">Work</h1>
<div class="flex">
    <div class="px-6 w-2/4 text-left">
        <div>Administrator: {{$administrator}}</div>
        <div>Mechanic: {{$mechanic}}</div>
    </div>
    <div class="px-6 w-2/4  text-left">
        <div>Car: {{$cardet['car']}}</div>
        <div>Owner: {{$cardet['owner']}}</div>
    </div>
</div>
<hr class="h-px mb-6 mt-2 bg-gray-200 border-0 dark:bg-gray-700">
<div class="relative overflow-x-auto ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Item
            </th>

            <th scope="col" class="px-6 py-3">
                Quantity
            </th>
            <th scope="col" class="px-6 py-3">
                Price
            </th>
        </tr>
        </thead>
        <tbody>

        @foreach($items as $item)
        @include('includes._worksheet-item', [
            'item'=> $item->name,
            'quantity'=> $item->pivot->quantity,
            'price'=> $item->price,
        ])

        @endforeach

        @foreach($tasks as $task)
        @include('includes._worksheet-item', [
            'item'=> $task->name,
            'quantity'=> $task->duration,
            'price'=> $task->duration*10000
        ])

        @endforeach
        
        </tbody>
    </table>
</div>
<div class="mt-16 flex">
    <div class="px-6 w-3/4 text-left">Total price: </div>
    <div class="px-6 w-1/4  text-left">{{$total}} Ft</div>
</div>
<hr class="h-px mt-2 bg-gray-200 border-0 dark:bg-gray-700">
<div class="mt-28 flex">
    <div class="px-6 w-2/4 text-center">
        <hr class="h-px w-2/3 bg-gray-800 border-0 dark:bg-gray-700 m-auto">
        <div>Administrator</div>
    </div>
    <div class="px-6 w-2/4  text-center">
        <hr class="h-px w-2/3 bg-gray-800 border-0 dark:bg-gray-700 m-auto">
        <div>Owner</div>
    </div>
</div>
