@extends('layouts.admin')

@section('title', 'Create Hotel')
@section('content')
    <x-breadcrumb homeLink="hotels" homeTitle="Hotels" currentLink="#" currentTitle="Create" />
    <x-page-header title="hotels" buttonText="New Hotel" :buttonAvailable=false />
    <form action="" action="{{ route('hotels.store') }}"></form>
@endsection
