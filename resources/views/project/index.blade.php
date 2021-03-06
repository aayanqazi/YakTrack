@extends('layouts.app')

@section('title')
    Projects
@endsection

@section('subtitle')
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('project.index') !!}
@endsection

@section('content')

@include('partials.modals.delete_item_modal')

<div class="card item-type-container" data-item-type="project">
    <div class="card-header with-border">
        <a href="{{ route('project.create') }}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i>
            Add Project
        </a>
    </div>
    @if($projects->count())
        <table class="table card-body">
            <tr>
                <th> Name </th>
                <th> Email </th>
                <th> <span class="pull-right"> Actions </span> </th>
                @foreach($projects as $project)
                <tr
                    class="item-container"
                    data-item-name="{{ $project->name }}"
                    data-item-destroy-route="{{ route('project.destroy', ['project' => $project]) }}"
                >
                <td>
                    <a href="{{ route('project.show', ['project' => $project]) }}">
                        {{ $project->name }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('client.show', ['client' => $project->getClient()]) }}">
                        {{ $project->getClient()->name }}
                    </a>
                </td>
                    <td>
                        <div class="btn-group pull-right">
                            <a
                                href="{{ route('project.edit', ['project' => $project]) }}"
                                class="btn btn-default"
                            >
                                <i class="fa fa-edit"></i>
                            </a>
                            <button class="btn btn-default delete-item-button">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="card-body">
            You have not created any projects yet.
        </div>
    @endif
</div>

@endsection
