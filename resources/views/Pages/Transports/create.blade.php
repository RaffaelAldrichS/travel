@extends('layouts.admin')

@section('title', 'Create Transport')
@section('content')
    <x-breadcrumb homeLink="transports" homeTitle="Transports" currentLink="#" currentTitle="Create" />
    <x-page-header title="transports" buttonText="New Transport" :buttonAvailable=false />
@endsection
