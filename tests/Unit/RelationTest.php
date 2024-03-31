<?php

namespace Tests\Unit;

use App\Models\Address;
use App\Models\Car;
use App\Models\Owner;
use App\Models\Part;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Models\WorkOrder;
use Tests\TestCase;

class RelationTest extends TestCase
{

    public function test_retrieve_all_users_not_empty(): void
    {
        $this->assertNotEmpty(User::all());
    }

    public function test_retrieve_users_role(): void
    {
        $user = User::find(1);
        $role = $user->role();

        $this->assertNotEmpty($role);
        $this->assertEquals('operator', $role->value('name'));
    }

    public function test_retrieve_all_users_for_role(): void
    {
        $role = Role::find('1');
        $usersForRole = $role->users;

        $this->assertNotEmpty($usersForRole);
    }


    public function test_retrieve_all_work_orders(): void
    {
        $this->assertNotEmpty(WorkOrder::all());
    }

    public function test_retrieve_all_users_for_work_order(): void
    {
        $workOrder = WorkOrder::all()->first();
        $users = $workOrder->users;

        $this->assertNotEmpty($users);
    }

    public function test_retrieve_all_tasks(): void
    {
        $this->assertNotEmpty(Task::all());
    }

    public function test_retrieve_all_tasks_for_work_order(): void
    {
        $workOrder = WorkOrder::all()->first();
        $tasks = $workOrder->tasks;

        $this->assertNotEmpty($tasks);
    }

    public function test_retrieve_all_parts(): void
    {
        $this->assertNotEmpty(Part::all());
    }

    public function test_retrieve_all_parts_for_work_order(): void
    {
        $workOrder = WorkOrder::all()->first();
        $parts = $workOrder->parts;

        $this->assertNotEmpty($parts);
    }

    public function test_retrieve_all_owners(): void
    {
        $this->assertNotEmpty(Owner::all());
    }

    public function test_retreive_owner_for_work_order(): void
    {
        $workOrder = WorkOrder::all()->first();
        $owner = $workOrder->owner();

        $this->assertNotEmpty($owner);
    }

    public function test_retrieve_all_addresses(): void
    {
        $this->assertNotEmpty(Address::all());
    }

    public function test_retrieve_address_for_owner(): void
    {
        $owner = Owner::all()->first();
        $address = $owner->address;

        $this->assertNotEmpty($address);
    }

    public function test_retrieve_all_cars(): void
    {
        $this->assertNotEmpty(Car::all());
    }

    public function test_retrieve_all_cars_for_owner(): void
    {
        $owner = Owner::all()->first();
        $cars = $owner->cars;

        $this->assertNotEmpty($cars);
    }
}
