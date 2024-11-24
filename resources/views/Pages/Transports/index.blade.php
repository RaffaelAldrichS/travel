@extends('layouts.admin')
@section('title', 'BusJet - Transports')

@section('content')
    <x-breadcrumb homeLink="transports" homeTitle="Transports" currentLink="#" currentTitle="List" />
    <x-page-header title="transports" buttonText="New Transport" />



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
