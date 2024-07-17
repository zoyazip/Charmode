@extends('layouts.main')

@section('title', 'Edit product page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('content')
    <div class="inner-container">
        <h1>Hi, Admin!</h1>
        <button onclick="window.location='/adminproducts/{{$product->id}}'">To show product</button>
        <form enctype="multipart/form-data" class="add-product__div" method="POST" action="/add_product">
            @csrf
            <div class="add-product__left-div">
                <p class="add-product__p">Fill required fields:</p>
                <input value="{{$product->name}}" placeholder="Name*" class="@error('name') is-invalid @enderror add__input add-product__name__input" type="text" name="name" value="{{ old('name') }}">
               @error('name')
                    <p class="admin__error">{{ $message }}</p>
                @enderror
                <input value="{{$product->product_code}}" placeholder="Product code*" class="@error('product_code') is-invalid @enderror add__input add-product__name__input" type="text" name="product_code" value="{{ old('product_code') }}">
               @error('product_code')
                    <p class="admin__error">{{ $message }}</p>
                @enderror
                <div class="select__row">
                    <div>
                        <label>Category: </label>

                        <select value="{{$product->subCategory->category->id}}" id="categorySelect" class="select__option" name="category">
                            @if (session()->has('allCategories'))
                                @foreach (session()->get('allCategories') as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>

                                @endforeach
                            @endif
                        </select>
                    </div>
                    <span class="add__btn" onclick="openPopUpWindow('categoryPopUp')">Add new category</span>
                </div>
                <div class="select__row">
                    <div>
                        <label>Subcategory: </label>
                        <select value="{{$product->subCategory->id}}" id="subCategorySelect" class="select__option" name="subcategory">
                        </select>
                    </div>
                    <span class="add__btn" onclick="openPopUpWindow('subCategoryPopUp')">Add new subcategory</span>
                </div>
                <div class="row__input">
                    <div class="input__row__with__error">
                    <input value="{{$product->oldPrice}}" placeholder="Old price*" class="@error('oldPrice') is-invalid @enderror add__input input__row" name="oldPrice">
                    @error('oldPrice')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="input__row__with__error">
                    <input value="{{$product->newPrice}}" placeholder="New price*" class="@error('newPrice') is-invalid @enderror add__input input__row" name="newPrice">
                    @error('newPrice')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input__row__with__error">
                    <input  value="{{$product->discount}}" placeholder="Discount*" class="@error('discount') is-invalid @enderror add__input input__row" name="discount">
                    @error('discount')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input__row__with__error">
                    <input  value="{{$product->stockQuantity}}" placeholder="Stock quantity*" class="@error('stockQuantity') is-invalid @enderror add__input input__row" name="stockQuantity">
                    @error('stockQuantity')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input__row__with__error">
                    <input value="{{$product->shippingCost}}" placeholder="Shipping cost*" class="@error('shippingCost') is-invalid @enderror add__input input__row" name="shippingCost">
                    @error('shippingCost')
                        <p class="admin__error">{{ $message }}</p>
                    @enderror
                </div>
                </div>

                <p class="add-product__p">Add additional fields:</p>
                <div class="specification__div">
                    <div id="added__fields" class="added__spec__div">
                        @if(isset($product->specifications))
                        @foreach ($product->specifications as $specification)
                        <div class="spec__div__row" id="spec{{$specification->id}}">
                        <input value="{{$specification->key}}" class="add__input spec__input__row" type="text" name="key[]">
                        <input value="{{$specification->value}}" class="add__input spec__input__row" type="text" name="value[]">
                        <span onclick="removeSpecification('spec'+{{$specification->id}})" class="add__btn">Remove</span>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="spec__div__row" id="newField">
                        <input class="add__input spec__input__row" type="text" id="key">
                        <input class="add__input spec__input__row" type="text" id="value">
                        <span onclick="addSpecification()" class="add__btn">Save</span>
                    </div>
                </div>
                <p class="add-product__p">Add colors:</p>
                <div class="all__color__div">
                    <div id="existing__colors" class="existing__colors">
                        @if (session()->has('allColors'))
                            @foreach (session()->get('allColors') as $color)
                                <div onclick="checkColor({{ $color }})" name="color__div" value='{{ $color }}'
                                    class="color__div"></div>
                            @endforeach
                        @endif
                    </div>

                    <span class="add__btn" onclick="openPopUpWindow('colorPopUp')">New</span>
                    {{-- colors can add new --}}
                    <p class="add-product__p">Added colors:</p>
                    <div id="new__colors" class="existing__colors">
                        @if(isset($product->productColors))
                        @foreach ($product->productColors as $color)
                        <div id="color{{$color->id}}" style="background-color: {{$color->color->hex}}" class="color__div edit__div"></div>
                        <input id="input{{$color->id}}" onclick="removeColor('color'+{{$color->id}}, 'input'+{{$color->id}})" value="{{$color->id}}" name="checked_colors[]" type="checkbox" checked>
                        
                        @endforeach
                        @endif
                    </div>


                </div>
                <p class="add-product__p">Write product description:</p>
                <textarea class="@error('description') is-invalid @enderror add__textarea" name="description">{{$product->description}}</textarea>
                @error('description')
                    <p class="admin__error">{{ $message }}</p>
                @enderror
                


                <input class="add__btn" type="submit" value="Save product">
            </div>
            <div id="imageDiv" class="add-product__right-div">

                @if(isset($product->images))
                @for ($i = 0; $i < 6; $i++)
                    @if(isset($product->images[$i]))
                    <div id="{{$product->images[$i]->id.'image'}}">
                    <img src="{{$product->images[$i]->url}}">
                    <span onclick="deleteImage({{$product->images[$i]->id}})" class="fa fa-trash-o"></span>
                    </div>
                    @else                
                    <input class="image__input" name="image[]" type="file" >
                    @endif
                @endfor
                @endif


                {{-- <input class="image__input" name="image[]" type="file" >
                <input class="image__input" name="image[]" type="file">
                <input class="image__input" name="image[]" type="file">
                <input class="image__input" name="image[]" type="file">
                <input class="image__input" name="image[]" type="file">
                <input class="image__input" name="image[]" type="file"> --}}
            </div>
        </form>
        <div id="categoryPopUp" class="category__pop-up hide__pop__up__window">
            <span onclick="closePopUpWindow('categoryPopUp')" class="close-pop-up__btn" id="closePopUpBtn">&times;</span>
            <input id="categoryName" placeholder="Category name*" name="categoryName" type="text">
            <button onclick="addNewCategory('categoryPopUp', 'categoryName', 'categorySelect')">Add</button>
        </div>
        <div id="subCategoryPopUp" class="category__pop-up hide__pop__up__window">
            <span onclick="closePopUpWindow('subCategoryPopUp')" class="close-pop-up__btn"
                id="closePopUpBtn">&times;</span>
            <input id="subCategoryName" placeholder="Subcategory name*" name="subCategoryName" type="text">
            <button onclick="addNewCategory('subCategoryPopUp', 'subCategoryName', 'subCategorySelect')">Add</button>
        </div>
        <div id="colorPopUp" class="category__pop-up hide__pop__up__window">
            <span onclick="closePopUpWindow('colorPopUp')" class="close-pop-up__btn" id="closePopUpBtn">&times;</span>
            <input id="colorName" placeholder="Color name*" name="colorName" type="text">
            <input id="colorHex" placeholder="Color hex*" name="colorHex" type="text">
            <button onclick="addNewColor()">Add</button>
        </div>
        @push('scripts')
            <!-- @once -->
                <script src="{{ URL::asset('js/admin/admin.js') }}"></script>
            <!-- @endonce -->
        @endpush

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    </div>
@endsection
