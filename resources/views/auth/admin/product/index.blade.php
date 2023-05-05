@extends('auth.layout.master')

@section('title', 'Products')

@section('content')
<div class="row">
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary btn-block">Back</a>
    </div>
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('product.create') }}" class="btn btn-success btn-block">New product</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 justify-content-center">
        <div class="admin-product">
            <table class="table-dark table-responsive">
                <tr class="border-title">
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>New Price</th>
                    <th>Alias</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                @foreach($models as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if(!$product->images->isEmpty())
                                <div class="product-img">
                                    <img src="{{ Storage::url($product->images['0']['img']) }}" alt="{{ $product->alias }}">
                                </div>
                            @endif
                        </td>

                        <td>{{ $product->title }}</td>
                        <td>{{ mb_substr($product->description, 0, 10) }} ...</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->getNewPrice()}}</td>
                        <td>{{ $product->alias }}</td>
                        <td>{{ $product->category->title }}</td>
                        <form action="{{ route('product.destroy', $product->alias) }}" method="POST">
                            <td>
                                <a href="{{ route('product.show', $product->alias) }}" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                                <a href="{{ route('product.edit', $product->alias) }}" class="btn btn-warning">Update</a>
                            </td>
                            @if($product->active)
                                <td>
                                    <a href="{{ route('product.deactivate', $product->id) }}" class="btn btn-secondary">Deactivate</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('product.activate', $product->id) }}" class="btn btn-success">Activate</a>
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
