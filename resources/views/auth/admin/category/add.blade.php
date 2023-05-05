@extends('auth.layout.master')

@section('title', 'Add New Category')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 form-contact">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h3>Add New Category</h3>
                    <label for="Title">Title</label>
                    <input type="text" name="title" placeholder="Title" class="form-control"
                           value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="Alias">Alias</label>
                    <input type="text" name="alias" placeholder="Alias" class="form-control"
                           value="{{ old('alias') }}">
                </div>

                <div class="form-check new-checkbox">
                    <input type="checkbox" name="active" id="active" class="form-check-input">
                    <label for="active" class="form-check-label">Active</label>
                </div>

                <button type="submit" class="btn btn-success btn-block">Add</button>
            </form>
            <a href="{{ route('category.index') }}" class="btn btn-secondary btn-block mt-2">Back</a>
        </div>
    </div>
</div>
@endsection
