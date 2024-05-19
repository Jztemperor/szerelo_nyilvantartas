@extends('layout.layout')

<div class="p-4 sm:ml-64 print:p-0 print:ml-0 print:w-full">
    <div class="p-4 mt-14 print:p-0 print:mt-0 print:w-full">
        <div class="flex w-full justify-between">
        @include('includes._breadcrumb')
        <button onclick="printPage()" class="print:hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Export</button>
        </div>

        @include('includes._worksheet', [
            'administrator' => $operator,
            'mechanic' => $mechanic,
            'cardet' => [
                'car' => $workorder->owner->cars[0]->make . " " . $workorder->owner->cars[0]->model . " " . $workorder->owner->cars[0]->manufacturing_year ,
                'owner' => $workorder->owner->first_name . " " . $workorder->owner->last_name
                ] ,
                'items' => $workorder->parts,
                'total' => $total,
                'tasks' => $workorder->tasks
        ])
    </div>
</div>

<script>
    const printPage = () => {
        print();
    }
</script>
