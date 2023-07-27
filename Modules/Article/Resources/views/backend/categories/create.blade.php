@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}'>
        {{ __($module_title) }}
    </x-backend-breadcrumb-item>
    <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<x-backend.layouts.create>
    <x-backend.section-header>
        <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

        <x-slot name="subtitle">
            @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
        </x-slot>
        <x-slot name="toolbar">
            <x-backend.buttons.return-back />
            <a href='{{ route("backend.$module_name.index") }}' class="btn btn-secondary ms-1" data-toggle="tooltip" title="{{ __($module_title) }} List"><i class="fas fa-list-ul"></i> List</a>
        </x-slot>
    </x-backend.section-header>

    <hr>

    <div class="row mt-4">
        <div class="col">
            {{ html()->form('POST', route("backend.$module_name.store"))->class('form')->open() }}

            @include ("article::backend.$module_name.form")

            <div class="row">
                <div class="col-6">
                    <x-backend.buttons.create>Create</x-backend.buttons.create>
                </div>
                <div class="col-6">
                    <div class="float-end">
                        <x-backend.buttons.cancel />
                    </div>
                </div>
            </div>

            {{ html()->form()->close() }}
        </div>
    </div>
</x-backend.layouts.create>
@endsection