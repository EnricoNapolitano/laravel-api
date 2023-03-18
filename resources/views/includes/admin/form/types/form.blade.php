@include('includes.alerts.error')

@if($type->exists)
<!-- form edit -->
<form action="{{route('admin.types.update', $type->id)}}" method="POST">
@method('PUT')

@else
<!-- form upload -->
<form action="{{route('admin.types.store')}}" method="POST">
@endif 

    @csrf
    <div class="row my-5">
        <!-- Input to choose label -->
        <div class="col">
            <h4><label class="form-label" for="type-label">Type</label></h4>
            <input class="form-control @error('label') is-invalid @enderror" placeholder="Write a 'type' to create" type="text" id="type-label" value="{{ old('label', $type->label) }}" name="label">
            @error('label')
            <div class="text-danger p-1">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Input to choose class icon -->
        <div class="col">
            <h4><label class="form-label" for="type-class">CSS class</label></h4>
            <input class="form-control @error('class_icon') is-invalid @enderror" placeholder="Write a CSS class" type="text" id="type-class" value="{{ old('class_icon', $type->class_icon) }}" name="class_icon">
            @error('class_icon')
            <div class="text-danger p-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-upload me-2"></i>{{ $type->exists ? 'Update' : 'Upload'}}</button>

</form>

@if(Route::is('admin.types.edit'))
<form action="{{route('admin.types.destroy', $type->id)}}" method="POST" id="btn-delete">
    @csrf
    @method('DELETE')
    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this type?')"><i class="fa-solid fa-trash-can"></i></button>
</form>
@endif