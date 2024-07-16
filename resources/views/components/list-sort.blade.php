@php
    $types = ['Name Asc', 'Name Desc', 'Price Asc', 'Price Desc'];
@endphp

<div class="sort relative cursor-pointer">
    <div class="sort-title flex gap-2 align-end">
        <p id="sort-current">Sorted by {{ $types[0] }}</p>
        <img src="{{ asset('assets/svg/sort-icon.svg') }}"/>
    </div>
    <ul
        class="sort-drop-down bg-white border border-main-green mt-2 absolute z-10 right-0 rounded-lg opacity-0 translate-y-10 transition-all overflow-hidden hidden">
        <form action="">
            @foreach ($types as $index => $type)
                <li id="{{ 'sort-' . $index }}"
                    class="{{ $index === 0 ? 'pt-2' : '' }} {{ $index === count($types) - 1 ? 'pb-2' : '' }} py-1 px-6 transition-all hover:bg-main-green hover:text-white">
                    <label for="{{ 'sort-' . $index }}" class="cursor-pointer">
                        <input id="{{ 'sort-' . $index }}" name="sort" type="radio" class="hidden"
                            value="{{ $type }}">
                        {{ $type }}
                    </label>
                </li>
            @endforeach
        </form>
    </ul>
</div>

<script>
    const sortContainer = document.querySelector('.sort')
    const sortDD = document.querySelector('.sort-drop-down')
    const sortTitle = document.querySelector('#sort-current')
    let sortDDOpened = false

    sortContainer.addEventListener('click', (event) => {
        event.stopPropagation()
        if (!sortDDOpened) {
            sortDD.classList.remove('hidden')
            requestAnimationFrame(() => {
                sortDD.style.opacity = '1'
                sortDD.style.transform = 'translateY(0)'
            })
            sortDDOpened = true
        } else {
            sortDD.style.opacity = '0'
            sortDD.style.transform = 'translateY(2.5rem)'
            sortDD.addEventListener('transitionend', () => {
                sortDD.classList.add('hidden')
            }, {
                once: true
            });
            sortDDOpened = false
        }
    });

    document.addEventListener('click', (event) => {
        if (sortDDOpened && !sortContainer.contains(event.target)) {
            sortDD.style.opacity = '0'
            sortDD.style.transform = 'translateY(2.5rem)'
            sortDD.addEventListener('transitionend', () => {
                sortDD.classList.add('hidden')
            }, {
                once: true
            });
            sortDDOpened = false
        }
    })

    const sortItems = document.querySelectorAll('.sort-drop-down li')
    sortItems.forEach(sortType => {
        sortType.addEventListener('click', (event) => {
            event.stopPropagation();
            const selectedType = event.target.textContent
            sortTitle.textContent = `Sorted by ${selectedType}`
            sortDD.style.opacity = '0'
            sortDD.style.transform = 'translateY(2.5rem)'
            sortDD.addEventListener('transitionend', () => {
                sortDD.classList.add('hidden')
            }, {
                once: true
            });
            sortDDOpened = false
        })
    })
</script>
