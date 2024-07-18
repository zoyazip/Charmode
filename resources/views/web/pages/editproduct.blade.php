@extends('layouts.main')

@section('title', 'Edit product page')

@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('content')
    <div class="inner-container">
        <form enctype="multipart/form-data" class="add-product__div pb-16 flex flex-wrap lg:flex-nowrap" method="POST" action="/update_product/{{$product->id}}">
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
                    <div class="flex gap-4 items-center">
                        <label class="text-main-green">Category: </label>

                        <select id="categorySelect" class="select__option bg-white border-b-[1px] border-main-green" name="category">
                            @if (isset($categories))
                                @foreach ($categories as $category)
                                @if($product->subCategory->category_id == $category->id)
                                <option selected value={{ $category->id }}>{{ $category->name }}</option>

                                @else
                                <option value={{ $category->id }}>{{ $category->name }}</option>

                                @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <span class="text-2xl text-main-green font-medium cursor-pointer rounded-full w-8 h-8 flex items-center justify-center transition-all hover:bg-secondary-green" onclick="openPopUpWindow('categoryPopUp')">+</span>
                </div>
                <div class="select__row">
                    <div class="flex gap-4 items-center">
                        <label class="text-main-green">Subcategory: </label>
                        <select value="{{$product->subCategory->id}}" id="subCategorySelect" class="select__option bg-white border-b-[1px] border-main-green" name="subcategory">
                            @if (isset($subCategories))
                                @foreach ($subCategories as $subCategory)
                                @if($product->subcategory_id == $subCategory->id)
                                <option selected value={{ $subCategory->id }}>{{ $subCategory->name }}</option>
                                @else
                                <option value={{ $subCategory->id }}>{{ $subCategory->name }}</option>
                                @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <span class="text-2xl text-main-green font-medium cursor-pointer rounded-full w-8 h-8 flex items-center justify-center transition-all hover:bg-secondary-green" onclick="openPopUpWindow('subCategoryPopUp')">+</span>
                </div>
                <div class="row__input mt-10 flex flex-wrap">
                    <div class="input__row__with__error">
                        <div class="">
                            <div class="flex flex-col text-main-green"><span>Old Price</span></div>
                            <input value="{{$product->oldPrice}}" placeholder="Old price *" class="@error('oldPrice') is-invalid @enderror add__input input__row" name="oldPrice">
                            @error('oldPrice')
                                <p class="admin__error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input__row__with__error">
                        <div class="">
                            <div class="flex flex-col text-main-green"><span>New Price</span></div>
                            <input value="{{$product->newPrice}}" placeholder="New price *" class="@error('newPrice') is-invalid @enderror add__input input__row" name="newPrice">
                            @error('newPrice')
                                <p class="admin__error">{{ $message }}</p>
                            @enderror
                        </div>
                </div>
                <div class="input__row__with__error">
                    <div class="">
                        <div class="flex flex-col text-main-green"><span>Discount</span></div>
                        <input value="{{$product->discount}}" placeholder="Discount *" class="@error('discount') is-invalid @enderror add__input input__row" name="discount">
                        @error('discount')
                            <p class="admin__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="input__row__with__error">
                    <div class="">
                        <div class="flex flex-col text-main-green"><span>Quantity</span></div>
                        <input  value="{{$product->stockQuantity}}" placeholder="Stock quantity *" class="@error('stockQuantity') is-invalid @enderror add__input input__row" name="stockQuantity">
                        @error('stockQuantity')
                            <p class="admin__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="input__row__with__error">
                    <div class="">
                        <div class="flex flex-col text-main-green"><span>Shipping cost</span></div>
                        <input value="{{$product->shippingCost}}" placeholder="Shipping cost *" class="@error('shippingCost') is-invalid @enderror add__input input__row" name="shippingCost">
                        @error('shippingCost')
                            <p class="admin__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                </div>

                <p class="add-product__p">Add additional fields:</p>
                <div class="specification__div">
                    <div id="added__fields" class="added__spec__div">
                        @if(isset($product->specifications))
                            @foreach ($product->specifications as $specification)
                                <div class="spec__div__row" id="spec{{$specification->id}}">
                                    <input value="{{ucfirst($specification->key)}}" class="add__input spec__input__row" type="text" name="key[]">
                                    <input value="{{$specification->value}}" class="add__input spec__input__row" type="text" name="value[]">
                                    <div onclick="removeSpecification('spec'+{{$specification->id}})" class="cursor-pointer w-6"><img src="{{ URL::asset('assets/svg/trash.svg') }}" /></div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="spec__div__row" id="newField">
                        <input class="add__input spec__input__row" type="text" id="key">
                        <input class="add__input spec__input__row" type="text" id="value">
                        <span onclick="addSpecification()" class="text-main-green font-bold cursor-pointer">Save</span>
                    </div>
                </div>
                <p class="add-product__p">Add colors:</p>
                <div class="all__color__div">
                    <div id="existing__colors" class="existing__colors">
                        @if (isset($colors))
                            @foreach ($colors as $color)
                                <div onclick="checkColor({{ $color }})" name="color__div" value='{{ $color }}'
                                    class="color__div"></div>
                            @endforeach
                        @endif
                    </div>

                    <span class="text-main-green font-bold cursor-pointer" onclick="openPopUpWindow('colorPopUp')">New +</span>
                    {{-- colors can add new --}}
                    <p class="add-product__p">Added colors:</p>
                    <div id="new__colors" class="flex gap-4">
                        @if(isset($product->productColors))
                            @foreach ($product->productColors as $color)
                                <div id="color{{$color->id}}" style="background-color: {{$color->color->hex}}" class="w-10 h-10 rounded-full border edit__div"></div>
                                <input id="input{{$color->id}}" class="w-5 accent-main-green" onclick="removeColor('color'+{{$color->id}}, 'input'+{{$color->id}})" value="{{$color->color->id}}" name="checked_colors[]" type="checkbox" checked>
                            @endforeach
                        @endif
                    </div>

                </div>
                <p class="add-product__p">Product description:</p>
                <textarea class="@error('description') is-invalid @enderror add__textarea p-4" name="description">{{$product->description}}</textarea>
                @error('description')
                    <p class="admin__error">{{ $message }}</p>
                @enderror

                <input class="font-medium text-main-green cursor-pointer" type="submit" value="Save">
            </div>
            <div id="imageDiv" class="add-product__right-div grid grid-cols-1 lg:grid-cols-2 gap-4">
                @if(isset($product->images))
                @for ($i = 0; $i < 6; $i++)
                    @if(isset($product->images[$i]))
                        <div id="{{$product->images[$i]->id.'image'}}" class="border boredr-main-green w-full h-[300px] lg:h-full rounded-2xl">
                            <img src="/{{$product->images[$i]->url}}">
                            <img onclick="deleteImage({{$product->images[$i]->id}})" class="" src="{{ URL::asset('assets/svg/trash.svg') }}" />
                        </div>
                    @else                
                        <input class="border border-main-green rounded-2xl p-2 h-[50px]" name="image[]" type="file" >
                    @endif
                @endfor
                @endif
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
                <script src="{{ URL::asset('js/admin/admin.js') }}"></script>
        @endpush

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    </div>
@endsection
