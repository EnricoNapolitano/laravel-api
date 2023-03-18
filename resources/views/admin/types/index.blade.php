@extends('layouts.app')
@section('content')
    <table class="table table-hover mt-5">
        <thead>
            <th class="col-2 text-primary">Type label</th>
            <th class="col-1 text-primary text-center">Icon</th>
            <th class="col-2 text-primary">CSS Class</th>
            <th class="col-7 text-primary text-end">Edit</th>
        </thead>
        <tbody>
            @forelse($types as $type)
            <tr>
                <td>{{$type->label}}</td>
                <td class="text-center"><i class="text-primary fa-solid {{$type->class_icon}}"></i></td>
                <td>{{$type->class_icon}}</td>
                <td class="text-end"><a href="{{route('admin.types.edit', $type->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pencil"></i></a></td>
            </tr>
            @empty
            <tr>
                <td><p><b>There aren't types yet.</b></p></td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{route('admin.types.create')}}" class="btn btn-outline-primary">Create a New One</a>

@endsection