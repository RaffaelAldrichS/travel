@extends('layouts.admin')

@section('title', 'Create Packet')
@section('content')
    <x-breadcrumb homeLink="packets" homeTitle="Packets" currentLink="#" currentTitle="Create" />
    <x-page-header title="packets" buttonText="New Packet" :buttonAvailable=false />
@endsection
