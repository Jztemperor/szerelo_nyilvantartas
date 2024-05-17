@extends('layout.layout')
<div class="p-4 sm:ml-64">
    <div class="p-4  mt-14">
        <h1 class="text-center mb-5">Add Part</h1>
        <form class="max-w-sm mx-auto" method="POST" action="{{route('add-part', $id)}}">
            @csrf
            @method('POST')
            <div class="mb-5">
                <label for="part" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parts</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="part" name="part_id">
                    @foreach($parts as $part)
                        <option value="{{ $part->id }}">{{ $part->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Changes</button>
        </form>
    </div>
</div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  
    $(document).ready(function() {
        $('#part').select2({
            placeholder: 'Select a part',
            allowClear: true
        });
    });
</script>
