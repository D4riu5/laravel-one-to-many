@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    My projects
                </h1>

                <a href="{{ route('admin.projects.create') }}" class="btn btn-success my-2">
                    Add a project
                </a>
            </div>
        </div>

        @include('partials.success')

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->slug }}</td>
                                <td>{{ $project->type ? $project->type->name : 'No type' }}</td>
                                <td>
                                    <a href="{{  route('admin.projects.show', $project->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this project');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- PAGINATION (FIX STYLE) --}}
                {{-- <div class="pagination-container my-3">
                    {{ $projects->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
