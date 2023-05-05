@extends('auth.layout.master')

@section('title', 'Add New Product')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 form-contact">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h3>Add New Product</h3>
                    <label for="Title">Title</label>
                    <input type="text" name="title" placeholder="Title" class="form-control"
                           value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" name="description" placeholder="Description" class="form-control"
                           value="{{ old('description') }}">
                </div>

                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" name="price" placeholder="Price" class="form-control"
                           value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="New Price">New Price</label>
                    <input type="text" name="new_price" placeholder="New Price" class="form-control"
                           value="{{ old('new_price') }}">
                </div>

                <div class="form-group">
                    <label for="Alias">Alias</label>
                    <input type="text" name="alias" placeholder="Alias" class="form-control"
                           value="{{ old('alias') }}">
                </div>

                <div class="form-group">
                    <label for="Categories">Categories</label>
                    <p>
                        <select class="form-control" name="categories">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </p>
                </div>

                <div class="form-group">
                    <label for="Full Description">Full Description</label>
                    <textarea name="full_description" cols="30" rows="5" placeholder="Full Description"
                              class="form-control">{{ old('full_description') }}</textarea>
                </div>

                <div class="form-group-file">
                    <label for="Image">Image</label>
                    <input type="file" name="images[]" class="form-control-file" value="" multiple>
                </div>

                <div class="form-check new-checkbox">
                    <input type="checkbox" name="active" id="active" class="form-check-input">
                    <label for="active" class="form-check-label">Active</label>
                </div>

                <div class="form-check new-checkbox">
                    <input type="checkbox" name="new" id="new" class="form-check-input">
                    <label for="new" class="form-check-label">New</label>
                </div>

                <button type="submit" class="btn btn-success btn-block">Add</button>
            </form>
            <a href="{{ route('product.index') }}" class="btn btn-secondary btn-block mt-2">Back</a>
        </div>
    </div>
</div>
@endsection
