@extends('auth.layout.master')

@section('title', 'Update Category ' . $model->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 form-contact">
            <form action="{{ route('category.update', $model->alias) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">

                    <h3>Update category {{ $model->title }}</h3>
                    <label for="Title">Title</label>
                    <input type="text" name="title" placeholder="Title" class="form-control"
                           value="{{ $model->title }}">
                </div>

                <div class="form-group">
                    <label for="Alias">Alias</label>
                    <input type="text" name="alias" placeholder="Alias" class="form-control"
                           value="{{ $model->alias }}">
                </div>

                <div class="form-check new-checkbox">
                    <input type="checkbox" id="active" name="active" class="form-check-input" {{ $model->active ? "checked" : '' }}>
                    <label for="active" class="form-check-label">Active</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
            <a href="{{ route('category.index') }}" class="btn btn-secondary btn-block mt-2">Back</a>
        </div>
    </div>
</div>
@endsection
