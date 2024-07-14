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
                        <select id="categorySelect" class="select__option" name="category">
                            @if(session()->has('allCategories'))
                                @foreach(session()->get('allCategories') as $category)
                                    <option>{{$category->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <span class="add__btn" onclick="openPopUpWindow('categoryPopUp')">Add new</span>
                </div>
                <div class="select__row">
                    <div>
                        <label>Subcategory: </label>
                        <select id="subCategorySelect" class="select__option" name="subcategoryID">
                        @if(session()->has('allSubCategories'))
                            @foreach(session()->get('allSubCategories') as $subCategory)
                                <option>{{$subCategory->name}}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                    <span class="add__btn" onclick="openPopUpWindow('subCategoryPopUp')">Add new subcategory</span>
                </div>
                <div class="row__input">
                    <input placeholder="Price*" class="add__input input__row" name="price">
                    <input placeholder="Discount*" class="add__input input__row" name="discount">
                    <input  placeholder="Stock quantity*" class="add__input input__row" name="stockQuantity">
                </div>
           
                <p class="add-product__p">Add additional fields:</p>
                <div class="specification__div">
                    <div id="added__fields" class="added__spec__div">
                        <!-- <div class="spec__div__row">
                            <input value="Key1" class="add__input" type="text" >
                            <input value="Value1" class="add__input" type="text" >
                            <span class="add__btn">Remove</span>
                        </div> -->
                    </div>
                    <div class="spec__div__row" id="newField">
                        <input class="add__input" type="text" id="key" >
                        <input class="add__input" type="text" id="value" >
                        <span onclick="addSpecification()" class="add__btn">Save</span>
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
        <div id="categoryPopUp" class="category__pop-up hide__pop__up__window">
            <span onclick="closePopUpWindow('categoryPopUp')" class="close-pop-up__btn" id="closePopUpBtn">&times;</span>
            <input id="categoryName" placeholder="Category name*" name="categoryName" type="text">
            <button onclick="addNewCategory('categoryPopUp', 'categoryName', 'categorySelect')" >Add</button>
        </div>
        <div id="subCategoryPopUp" class="category__pop-up hide__pop__up__window">
            <span onclick="closePopUpWindow('subCategoryPopUp')" class="close-pop-up__btn" id="closePopUpBtn">&times;</span>
            <input id="subCategoryName" placeholder="Subcategory name*" name="subCategoryName" type="text">
            <button onclick="addNewCategory('subCategoryPopUp', 'subCategoryName', 'subCategorySelect')" >Add</button>
        </div>
        @push('scripts')
            <!-- @once -->
                <script src="{{ URL::asset('js/admin/admin.js') }}" ></script>
            <!-- @endonce -->
        @endpush

    </div>
@endsection
