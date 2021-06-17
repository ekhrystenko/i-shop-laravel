@extends('auth.layout.master')

@section('title', 'Orders')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-product">
            <table class="table-dark table-responsive">
                <tr style="border-bottom: 2px solid #fff">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Price</th>
                </tr>
                @foreach($orders as $order)
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
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-3 pt-2 links">
            {{ $orders->links() }}
        </div>
        <a href="{{ route('admin.index') }}" class="btn btn-dark btn-block mt-2">Back</a>
    </div>
</div>
@endsection
