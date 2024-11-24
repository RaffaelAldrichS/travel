@extends('layouts.admin')
@section('title', 'BusJet - Hotels')

@section('content')
    <x-breadcrumb homeLink="hotels" homeTitle="Hotels" currentLink="#" currentTitle="List" />
    <x-page-header title="hotels" buttonText="New Hotel" />


    <div class="grid grid-cols-2 gap-4 mb-4 lg:grid-cols-4">

    </div>
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
    <div class="grid grid-cols-2 gap-4">
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
    </div>
@endsection
