@php
    $types = ['Name Asc', 'Name Desc', 'Price Asc', 'Price Desc'];
@endphp

<div class="sort relative cursor-pointer">
    <div class="sort-title flex gap-2 align-end">
        @if(isset($data['sort_by']) && isset($data['sort_order']))
            <p id="sort-current">Sorted by {{ ucfirst($data['sort_by'])." ".ucfirst($data['sort_order']) }}</p>
        @else
            <p id="sort-current">Sorted by {{ $types[0] }}</p>
        @endif
        <img src="{{ asset('assets/svg/sort-icon.svg') }}" alt="sort"/>
    </div>
    <ul
        class="sort-drop-down bg-white border border-main-green mt-2 absolute z-10 right-0 rounded-lg opacity-0 translate-y-10 transition-all overflow-hidden hidden">
        @foreach ($types as $index => $type)
            <li id="{{ 'sort-' . $index }}"
                class="{{ $index === 0 ? 'pt-2' : '' }} {{ $index === count($types) - 1 ? 'pb-2' : '' }} py-1 px-6 transition-all hover:bg-main-green hover:text-white">
                <label for="{{ 'sort-' . $index }}" class="cursor-pointer" onclick="setSort('{{ $type }}')">
                    <input id="{{ 'sort-' . $index }}" name="sort" type="radio" class="hidden"
                        value="{{ $type }}" >
                    {{ $type }}
                </label>
            </li>
        @endforeach
    </ul>
</div>

@push('scripts')
    <script src="{{URL::asset('js/sort.js')}}" defer></script>
@endpush