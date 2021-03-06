@extends('layouts.app', ['activeMenu' => "index"])
@section('content')
    <div class="container">
        @include('layouts.alert')
        <div class="row my-4 d-flex align-items-center">
            <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                <h4 class="m-0">Product list</h4>
            </div>
            <div class="col-12 col-sm-6 text-sm-end text-start">
                <a class="btn btn-primary" href="{{ route('addProductToCatalog') }}" role="button">Add new product</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col" class="text-center">Edit</th>
                                <th scope="col" class="text-center">Remove from catalog</th>
                                <th scope="col" class="text-center">Add to cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} PLN</td>
                                    <form method="GET" action="{{ route('editProductInCatalog', $product) }}">
                                        @csrf
                                        <td class="text-center"><button type="submit" class="btn btn-link p-0"><i
                                                    class="fas fa-pen-to-square"></i></button></td>
                                    </form>
                                    <form method="POST" action="{{ route('deleteProductFromCatalog', $product) }}">
                                        @csrf
                                        @method('delete')
                                        <td class="text-center"><button type="submit" class="btn btn-link p-0"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </form>
                                    <form method="POST" action="{{ route('addProductToShoppingCart', $product) }}">
                                        @csrf
                                        <td class="text-center"><button type="submit" class="btn btn-link p-0"
                                                @if (in_array($product->id, $productIdsInShoppingCart)) disabled @endif><i
                                                    class="fas fa-cart-plus"></i></button></td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('layouts.paginationBar')
    </div>
@endsection
