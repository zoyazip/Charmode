@extends('layouts.main')

@section('title', 'Admin Panel page')

@section('content')
    <div class="admin__container">
        <div class="hi__div">
            <h1>Hi, Admin!</h1>
            <button onclick="window.location='/adminproducts/create'" class="admin__btn green">Add product</button>
            <button onclick="window.location='/orders'" class="admin__btn green">Orders</button>
        </div>
        <h4 class="admin__h4">All Products</h4>
        <div class="admin__filter__div">
            <div>
                <input type="text">
                <select></select>
            </div>
            <select></select>
        </div>
        <div class="admin__table__div">
            <div class="table__head">
                <div class="table__head__left">
                    <h6 class="table__checkbox"></h6>
                    <h6 class="table__photo"></h6>
                    <h6 class="table__name">Nosaukums</h6>
                </div>
                <div class="table__head__right">
                    <h6 class="table__date">Datums</h6>
                    <h6 class="table__price">Jaunā cena</h6>
                    <h6 class="table__edit"></h6>
                </div>
            </div>
            @if (isset($products))
                @foreach ($products as $product)
                    <div class="table__row">
                        <div class="table__head__left">
                            <h6 class="table__checkbox"></h6>
                            <h6 class="table__photo"></h6>
                            <h6 class="table__name">{{ $product->name }}</h6>
                        </div>
                        <div class="table__head__right">
                            <h6 class="table__date">{{ $product->created_at }}</h6>
                            <h6 class="table__price">{{ $product->newPrice }}</h6>
                            <button onclick="window.location='/adminproducts/{{$product->id}}'">Show product</button>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="table__row">
                <div class="table__head__left">
                    <h6 class="table__checkbox"></h6>
                    <h6 class="table__photo"></h6>
                    <h6 class="table__name">Nosaukums1</h6>
                </div>
                <div class="table__head__right">
                    <h6 class="table__date">Nosaukums1</h6>
                    <h6 class="table__price">Nosaukums1</h6>
                    <h6 class="table__edit">...</h6>
                </div>
            </div>

        </div>
        <div class="admin__after__table__div">
            <p class="admin__text__after__table">0 of 4 row(s) selected</p>
            <div>
                <button class="admin__btn grey">Previous</button>
                <button class="admin__btn green">Next</button>
            </div>
        </div>
    </div>
    <script src="js/admin/admin.js"></script>
@endsection
