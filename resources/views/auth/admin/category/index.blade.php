@extends('auth.layout.master')

@section('title', 'Categories')

@section('content')
<div class="row">
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary btn-block">Back</a>
    </div>
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('category.create') }}" class="btn btn-success btn-block">New category</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 justify-content-center">
        <div class="admin-product">
            <table class="table-dark table-responsive">
                <tr class="border-title">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Alias</th>
                    <th>Actions</th>
                </tr>
                @foreach($models as $category)
                    <tr>
                        <td>{{ $category->id }}</td>

                        <td>{{ $category->title }}</td>
                        <td>{{ $category->alias }}</td>
                        <form action="{{ route('category.destroy', $category->alias) }}" method="POST">
                            <td>
                                <a href="{{ route('category.edit', $category->alias) }}" class="btn btn-warning">Update</a>
                            </td>
                            @if($category->active)
                                <td>
                                    <a href="{{ route('category.deactivate', $category->id) }}" class="btn btn-secondary">Deactivate</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('category.activate', $category->id) }}" class="btn btn-success">Activate</a>
                                </td>
                            @endif
                            @csrf
                            @method('DELETE')
                            <td>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                    </form>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="mb-3 pt-2 links">
            {{ $models->links() }}
        </div>
    </div>
</div>
@endsection
