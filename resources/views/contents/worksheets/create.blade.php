@extends('layout.layout')

<div class="p-4 sm:ml-64">
    <div class="p-4  mt-14">
        <h1 class="text-center mb-5">Create Worksheet</h1>

        <form class="max-w-sm mx-auto" method="POST" action="{{route('worksheets.store')}}">
            @csrf
            @method('POST')
            <div class="mb-5">
                <label for="owner_first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' FirstName</label>
                <input type="text" id="owner_first_name" name="owner_first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_first_name')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="owner_last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' LastName</label>
                <input type="text" id="owner_last_name" name="owner_last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_last_name')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="owner_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' Phone</label>
                <input type="text" id="owner_phone" name="owner_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_phone')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 grid grid-cols-3">
            <div class="mb-5 mr-5">
                <label for="owner_country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' Country</label>
                <input type="text" id="owner_country" name="owner_country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_country')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 mr-5">
                <label for="owner_state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' State</label>
                <input type="text" id="owner_state" name="owner_state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_state')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="owner_city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' City</label>
                <input type="text" id="owner_city" name="owner_city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_city')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 mr-5">
                <label for="owner_zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' Zip</label>
                <input type="text" id="owner_zip" name="owner_zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_zip')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 mr-5">
                <label for="owner_street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' Street</label>
                <input type="text" id="owner_street" name="owner_street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_street')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="owner_steetnr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner' Street Nr</label>
                <input type="text" id="owner_steetnr" name="owner_steetnr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('owner_steetnr')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>
            </div>

            <div class="mb-2 grid grid-cols-2">

            <div class="mb-5 mr-5">
                <label for="make" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car's Make</label>
                <input type="text" id="make" name="make" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('make')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5" >
                <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car's Model</label>
                <input type="text" id="model" name="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('model')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 mr-5">
                <label for="license_plate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car's License Plate</label>
                <input type="text" id="license_plate" name="license_plate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('license_plate')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="">
                <label for="manufacturing_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car's Manufacturing Year</label>
                <input type="text" id="manufacturing_year" name="manufacturing_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>

                @error('manufacturing_year')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>
            </div>

            <div class="mb-5">
                <label for="mechanic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mechanic</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="mechanic" name="mechanic">
                    @foreach($mechanics as $mechanic)
                        <option value="{{ $mechanic->id }}">{{ $mechanic->name }}</option>
                    @endforeach
                </select>
                @error('mechanic')
                <span class="text-sm text-red-600 mt-2 ml-1">{{ $message }}</span>
                @enderror
            </div>
        
            

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </form>
    </div>
<div>