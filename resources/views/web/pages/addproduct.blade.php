@extends('layouts.main')

@section('title', 'Add product page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
@endpush

@section('content')
    <div class="inner-container">
        <h1>Hi, Admin!</h1>
        <form class="add-product__div" method="POST" action="/add_product">
            @csrf
            <div class="add-product__left-div">
                <p class="add-product__p">Fill required fields:</p>
                    <input placeholder="Name*" class="add__input add-product__name__input" type="text" name="name">
                <div class="select__row">
                    <div>
                        <label>Category: </label>
                        <select name="category"></select>
                    </div>
                    <button class="add__btn" onClick="addCategoryBtn()">Add new category</button>
                </div>
                <div class="select__row">
                    <div>
                        <label>Subcategory: </label>
                        <select name="subcategoryID"></select>
                    </div>
                    <button class="add__btn" onClick="addSubCategoryBtn()">Add new subcategory</button>
                </div>
                <div class="row__input">
                    <input placeholder="Price*" class="add__input input__row" name="price">
                    <input placeholder="Discount*" class="add__input input__row" name="discount">
                    <input  placeholder="Stock quantity*" class="add__input input__row" name="stockQuantity">
                </div>
           
                <p class="add-product__p">Add additional fields:</p>
                <div class="specification__div">
                    <div class="spec__div__row" id="added__fields"></div>
                    <div class="spec__div__row" id="newField">
                        <input class="add__input" type="text" id="key" >
                        <input class="add__input" type="text" id="value" >
                        <button class="add__btn">Save</button>
                    </div>
                </div>
                <p class="add-product__p">Add colors:</p>
                <div class="color__div">
                    <div class="existing__colors"></div>
                    <button class="add__btn" onclick="addNewColor">New</button>
                    {{-- colors can add new --}}

                </div>
                <p class="add-product__p">Write product description:</p>
                <textarea class="add__textarea" name="description"></textarea>
                

                <input class="add__btn" type="submit" value="Save product">
            </div>
            <div class="add-product__right-div">
{{-- images --}}
            </div>
        </form>
        @push('scripts')
            @once
                <script type="module" src="{{ URL::asset('js/admin.js') }}" defer></script>
            @endonce
        @endpush

    </div>
@endsection
