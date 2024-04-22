<div class="p-4 sm:ml-64">
    <div class="p-4  mt-14">
        @include('includes._breadcrumb')

        @include('includes._worksheet', [
            'administrator' => 'Neil Smith',
            'mechanic' => 'Mechanic 1',
            'cardet' => [
                'car' => 'Mazda 3 2010',
                'owner' => 'Domnanovich Balint'
                ] ,
            'workdet' => [
                'items' => [

                ],
            ]
        ])
    </div>
</div>
