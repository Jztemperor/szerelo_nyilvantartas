@extends('layout.layout')

<div class="p-4 sm:ml-64">
    <div class="p-4  mt-14">
        @include('includes._breadcrumb')

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
