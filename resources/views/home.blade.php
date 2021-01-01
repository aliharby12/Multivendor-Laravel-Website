@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">E-Shop</h1>
      <div class="list-group">
        <a href="https://netarabia.com/" class="list-group-item">Developed By: Ali Harby</a>
        <a href="#" class="list-group-item">aliharby565@gmail.com</a>
        <a href="#" class="list-group-item">+201066038993</a>
      </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="row">

        @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="/img/cart.jpg" alt=""></a><hr>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{$product->name}}</a>
                </h4>
                <h5>$ {{$product->price}}</h5>
                <p class="card-text">{{$product->description}}</p>
              </div>
              <div class="card-footer d-flex justify-content-center">
                <a class="btn btn-primary" href="{{route('cart.add', $product->id)}}" class="card-link">Add To Cart</a>
              </div>
            </div>
          </div>
        @endforeach

      </div>
      <!-- /.row -->

      <div class="d-flex justify-content-center mt-5">
        {{ $products->links() }}
      </div>
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
@endsection
