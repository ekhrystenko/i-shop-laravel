@extends('auth.layout.master')

@section('title', 'Update Product ' . $product->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 form-contact">
            <form action="{{ route('admin.update', $product->alias) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">

                    <h3>Update Product {{ $product->title }}</h3>
                    <label for="Title">Title</label>
                    <input type="text" name="title" placeholder="Title" class="form-control"
                           value="{{ $product->title }}">
                </div>

                <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" name="description" placeholder="Description" class="form-control"
                           value="{{ $product->description }}">
                </div>

                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" name="price" placeholder="Price" class="form-control"
                           value="{{ $product->price }}">
                </div>

                <div class="form-group">
                    <label for="New Price">New Price</label>
                    <input type="text" name="new_price" placeholder="New Price" class="form-control"
                           value="{{ $product->new_price }}">
                </div>

                <div class="form-group">
                    <label for="Alias">Alias</label>
                    <input type="text" name="alias" placeholder="Alias" class="form-control"
                           value="{{ $product->alias }}">
                </div>

                <div class="form-group">
                    <label for="Categories">Categories</label>
                    <p>
                        <select class="form-control" name="categories">
                            <option value="{{ $product->category->id }}"
                                @if($product->category_id == $product->category->id)
                                    selected
                                @endif
                            >{{ $product->category->title }}</option>
                        </select>
                    </p>
                </div>

                <div class="form-group">
                    <label for="Full Description">Full Description</label>
                    <textarea name="full_description" cols="30" rows="10" placeholder="Full Description"
                              class="form-control">{{ $product->full_description }}</textarea>
                </div>

                <div class="form-group-file">
                    <label for="Image">Image</label>
                    <input type="file" name="images[]" class="form-control-file" value="" multiple>
                </div>

                <div class="form-check new-checkbox">
                    <input type="checkbox" name="new" class="form-check-input"
                        @if ($product->new == 1)
                        checked
                        @endif
                    >
                    <label for="New" class="form-check-label">New</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
            <a href="{{ route('admin.show', $product->alias) }}" class="btn btn-secondary btn-block mt-2">Back</a>
        </div>
    </div>
</div>
@endsection
