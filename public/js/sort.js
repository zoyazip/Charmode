function setSort(sortType) {
    console.log("here");
    const sortBy = document.getElementById('sort_by_form');
    const sortOrder = document.getElementById('sort_order_form');
    const sortCurrent = document.getElementById('sort-current');

    switch (sortType) {
        case 'Name Asc':
            sortBy.value = 'name';
            sortOrder.value = 'asc';
            break;
        case 'Name Desc':
            sortBy.value = 'name';
            sortOrder.value = 'desc';
            break;
        case 'Price Asc':
            sortBy.value = 'price';
            sortOrder.value = 'asc';
            break;
        case 'Price Desc':
            sortBy.value = 'price';
            sortOrder.value = 'desc';
            break;
    }

    document.getElementById('search-form').submit();
}

const sortContainer = document.querySelector('.sort');
const sortDD = document.querySelector('.sort-drop-down');
const sortTitle = document.querySelector('#sort-current');
let sortDDOpened = false;

sortContainer.addEventListener('click', (event) => {
    event.stopPropagation();
    if (!sortDDOpened) {
        sortDD.classList.remove('hidden');
        requestAnimationFrame(() => {
            sortDD.style.opacity = '1';
            sortDD.style.transform = 'translateY(0)';
        });
        sortDDOpened = true;
    } else {
        sortDD.style.opacity = '0';
        sortDD.style.transform = 'translateY(2.5rem)';
        sortDD.addEventListener('transitionend', () => {
            sortDD.classList.add('hidden');
        }, { once: true });
        sortDDOpened = false;
    }
});

document.addEventListener('click', (event) => {
    if (sortDDOpened && !sortContainer.contains(event.target)) {
        sortDD.style.opacity = '0';
        sortDD.style.transform = 'translateY(2.5rem)';
        sortDD.addEventListener('transitionend', () => {
            sortDD.classList.add('hidden');
        }, { once: true });
        sortDDOpened = false;
    }
});

const sortLabels = document.querySelectorAll('.sort-drop-down label');
sortLabels.forEach(label => {
    label.addEventListener('click', (event) => {
        event.stopPropagation();
        const selectedType = event.target.textContent.trim();
        sortTitle.textContent = `Sorted by ${selectedType}`;
        sortDD.style.opacity = '0';
        sortDD.style.transform = 'translateY(2.5rem)';
        sortDD.addEventListener('transitionend', () => {
            sortDD.classList.add('hidden');
        }, { once: true });
        sortDDOpened = false;
    });
});