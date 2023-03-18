@extends('layouts.app')
@section('content')

    <table class="table table-hover mt-5">
        <thead>
            <th class="col-2 text-primary">Technologies</th>
            <th class="col-1 text-primary text-center">Icon</th>
            <th class="col-2 text-primary">CSS Class</th>
            <th class="col-7 text-primary text-end">Edit</th>
        </thead>
        <tbody>
            @forelse($technologies as $technology)
            <tr>
                <td>{{ $technology->label }}</td>
                <td class="text-center"><i class="text-primary fa-solid {{$technology->class_icon}}"></i></td>
                <td>{{$technology->class_icon}}</td>
                <td class="text-end"><a href="{{route('admin.technologies.edit', $technology->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pencil"></i></a></td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="5">There aren't technologies.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <!-- route to create a new tehcnology -->
    <a href="{{route('admin.technologies.create')}}" class="btn btn-outline-primary">Create a New One</a>

@endsection