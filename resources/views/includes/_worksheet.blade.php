
<h1 class="mb-8 text-center text-5xl font-extrabold dark:text-white">Worksheet</h1>
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
        @include('includes._worksheet-item', [
            'item'=>'Engine v6 for Mazda 3',
            'quantity'=>1,
            'price'=>'200.000Ft'
        ])
        @include('includes._worksheet-item', [
            'item'=>'Mechanical part for Mazda 3',
            'quantity'=>1,
            'price'=>'50.000Ft'
        ])
        @include('includes._worksheet-item', [
            'item'=>'Material for engine',
            'quantity'=>1,
            'price'=>'15.000Ft'
        ])
        @include('includes._worksheet-item', [
            'item'=>'Working cost 10.000/hour',
            'quantity'=>12,
            'price'=>'120.000Ft'
        ])
        </tbody>
    </table>
</div>
<div class="mt-16 flex">
    <div class="px-6 w-3/4 text-left">Total price: </div>
    <div class="px-6 w-1/4  text-left">385.000Ft</div>
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
