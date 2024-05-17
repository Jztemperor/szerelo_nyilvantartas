@extends('layout.layout')

<div class="p-4 sm:ml-64">
    <div class="p-4  mt-14">
        <div class="flex w-full justify-between">
            @include('includes._breadcrumb')
            <div>
                <a href="{{route('add-part-form', $workorder->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Parts</a>
                <a href="" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Tasks</a>
            </div>
        </div>

        @include('includes._works', [
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
