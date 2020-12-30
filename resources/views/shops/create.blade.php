@extends('layouts.app')

@section('content')
    <h5>Leave your data and we will inform you asap</h5>

    <form action="{{route('shop.store')}}" method="POST" class="mt-5 col-md-8">
        @csrf

        <div class="form-group">
            <label for="">Shop Name</label>
            <input type="text" name="name" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" name="phone" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Send Your Data</button>
    </form>
@endsection
