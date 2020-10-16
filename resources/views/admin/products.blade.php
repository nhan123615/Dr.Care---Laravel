@extends('layouts.admin', ['pageHeader' => 'Products'])
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Products</h5>
                    <a role="button" class="btn btn-primary text-white">Create</a>
                </div>
                <div class="card-body table-border-style">
                    <div class="col-12 d-flex flex-wrap">
                        @foreach($products as $product)
                            <div class="col-3">
                                <div class="card mb-3">
                                    <div id="{{'carousel' . $product->id}}" class="carousel slide" data-ride="carousel"
                                         data-interval="false">
                                        <ol class="carousel-indicators">
                                            @foreach(json_decode($product->photos) as $key => $val)
                                                <li data-target="{{'#carousel' . $product->id}}"
                                                    data-slide-to="{{$key}}"
                                                    class="{{$key === 0 ? "active" : ""}} text-dark"
                                                    style="background-color: rgba(0, 0, 0, 0.5);"></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach(json_decode($product->photos) as $key => $val)
                                                <div class="carousel-item {{$key === 0 ? "active" : ""}}">
                                                    <img class="d-block w-100"
                                                         src="{{asset($val)}}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="{{'#carousel' . $product->id}}"
                                           role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"
                                                  style="filter: invert();"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="{{'#carousel' . $product->id}}"
                                           role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"
                                                  style="filter: invert();"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->name}}</h5>
                                        <p class="card-text">{{$product->description}}</p>
                                        <span
                                            class="badge badge-secondary">{{\Illuminate\Support\Facades\DB::table('categories')->find($product->category_id)->name}}</span>
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-outline-primary btn-sm" role="button" href="#">Edit</a>
                                        &nbsp;
                                        <a class="btn  btn-outline-danger btn-sm" role="button" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
