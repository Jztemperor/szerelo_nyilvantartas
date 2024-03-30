<?php

namespace Tests\Unit;

use App\Models\Address;
use App\Models\Car;
use App\Models\Owner;
use App\Models\Part;
use App\Models\Task;
use App\Models\User;
use App\Models\WorkOrder;
use Tests\TestCase;

class DataAccessTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_user_records_not_empty_and_count(): void
    {
        // Retrieve all user records
        $users = User::all();

        // Check if the records are not empty
        $this->assertNotEmpty($users);

        // Check if the count of records is exactly 10
        $this->assertCount(10, $users);
    }

    public function test_retrieve_user_role(): void
    {
        $user = User::find(1);

        // Check if the user's role is not empty
        $this->assertNotEmpty($user->role);

        $roleName = $user->role->role_name;
        $this->assertNotEmpty($roleName);
    }

    public function test_workorder_records_not_empty_and_count(): void
    {
        $workorders = WorkOrder::all();
        $this->assertNotEmpty($workorders);
        $this->assertCount(10, $workorders);
    }

    public function test_retrive_users_for_workorder(): void
    {
        $workorder = WorkOrder::find(1);
        $this->assertNotEmpty($workorder->users());
    }

    public function test_retrive_owner_for_workorder(): void
    {
        $workorder = WorkOrder::find(1);
        $this->assertNotEmpty($workorder->owner());
    }

    public function test_retrive_tasks_for_workorder(): void
    {
        $workorder = WorkOrder::find(1);
        $this->assertNotEmpty($workorder->tasks());
    }

    public function test_owner_records_not_empty_and_count(): void
    {
        $owner = Owner::all();
        $this->assertNotEmpty($owner);
        $this->assertCount(10, $owner);
    }

    public function test_retrive_cars_for_owner(): void
    {
        $owner = Owner::find(1);
        $this->assertNotEmpty($owner->cars());
    }

    public function test_retrive_address_for_owner(): void
    {
        $owner = Owner::find(1);
        $this->assertNotEmpty($owner->address());
    }

    public function test_car_records_not_empty_and_count(): void
    {
        $cars = Car::all();
        $this->assertNotEmpty($cars);
        $this->assertCount(10, $cars);
    }

    public function test_address_records_not_empty_and_count(): void
    {
        $address = Address::all();
        $this->assertNotEmpty($address);
        $this->assertCount(10, $address);
    }

    public function test_task_records_not_empty_and_count(): void
    {
        $task = Task::all();
        $this->assertNotEmpty($task);
        $this->assertCount(10, $task);
    }

    public function test_part_records_not_empty_and_count(): void
    {
        $parts = Part::all();
        $this->assertNotEmpty($parts);
        $this->assertCount(10, $parts);
    }

    public function test_retrive_parts_for_workorder(): void
    {
        $workorder = WorkOrder::find(1);
        $this->assertNotEmpty($workorder->parts());
    }
}
