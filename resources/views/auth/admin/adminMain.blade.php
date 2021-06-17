@extends('auth.layout.master')

@section('title', 'Admin')

@section('content')
<div class="row justify-content-end mt-3">
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('admin.create') }}" class="btn btn-success btn-block">NEW PRODUCT</a>
    </div>
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('orders') }}" class="btn btn-primary btn-block">ORDERS</a>
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
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <div class="product-img">
                                <img src="{{ Storage::url($product->images['0']['img']) }}" alt="{{ $product->alias }}">
                            </div>
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ mb_substr($product->description, 0, 10) }} ...</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->getNewPrice()}}</td>
                        <td>{{ $product->alias }}</td>
                        <td>{{ $product->category->title }}</td>
                        <form action="{{ route('admin.destroy', $product->alias) }}" method="POST">
                            <td>
                                <a href="{{ route('admin.show', $product->alias) }}" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.edit', $product->alias) }}" class="btn btn-warning">Update</a>
                            </td>
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
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
