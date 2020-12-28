@extends('layouts.app')

@section('content')
    <h2>Check Out</h2>
    <h3>Shipping Info</h3>

    <form action="{{route('order.store')}}" method="POST" class="mt-5 col-md-8">
        @csrf

        <div class="form-group">
            <label for="">Full Name</label>
            <input type="text" name="shipping_fullname" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">State</label>
            <input type="text" name="shipping_state" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">City</label>
            <input type="text" name="shipping_city" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Zip Code</label>
            <input type="text" name="shipping_zipcode" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Full Address</label>
            <input type="text" name="shipping_address" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" name="shipping_phone" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Sumbit the order</button>
    </form>

@endsection
