@extends('auth.layout.master')

@section('title', 'Orders')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-product">
            @if(!$models->isEmpty())
            <table class="table-dark table-responsive">
                <tr style="border-bottom: 2px solid #fff">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Price</th>
                </tr>
                @foreach($models as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                        <td>{{ $order->getTotalPrice() }}$</td>
                    </tr>
                @endforeach
            </table>
            @else
                <p class="navbar-brand" style="color: white">Orders not found</p>
            @endif
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8">
        @if(!$models->isEmpty())
            <div class="mb-3 pt-2 links">
                {{ $models->links() }}
            </div>
        @endif
        <a href="{{ route('admin.index') }}" class="btn btn-dark btn-block mt-2">Back</a>
    </div>
</div>
@endsection
