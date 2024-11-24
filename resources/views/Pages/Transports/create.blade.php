@extends('layouts.admin')

@section('title', 'Create Transport')
@section('content')
    <x-breadcrumb homeLink="transports" homeTitle="Transports" currentLink="#" currentTitle="Create" />
    <x-page-header title="transports" buttonText="New Transport" :buttonAvailable=false />

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form method="POST" action="{{ route('transports.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="transport_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transport Name</label>
                <input type="text" id="transport_name" name="transport_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required />
            </div>
            <div class="mb-5">
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" name="description" rows="10"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""></textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="transport_type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transport Type</label>
                    <select id="transport_type" name="transport_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="bus">Bus</option>
                        <option value="travel">Travel</option>
                        <option value="ship">Ship</option>
                        <option value="plane">Plane</option>
                        <option value="train">Train</option>
                        <option value="car">Car</option>
                    </select>
                </div>
                <div>
                    <label for="cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cost</label>
                    <input type="number" id="cost" name="cost"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required />
                </div>
            </div>
            <div class="mb-5">
                <label for="destinations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destinations</label>
                <select id="destinations" name="destinations[]" multiple
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ $destination->destination_name }}</option>
                    @endforeach
                </select>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>
            </div>
            <button type="submit"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2 me-2 dark:focus:ring-yellow-900">Create</button>
        </form>
    </div>
@endsection
