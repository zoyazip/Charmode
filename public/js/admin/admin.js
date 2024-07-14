function openPopUpWindow(windowId) {
    document.getElementById(windowId).classList.remove('hide__pop__up__window');
    document.getElementById(windowId).classList.add('show__pop__up__window');
}

function closePopUpWindow(windowId) {
    document.getElementById(windowId).classList.remove('show__pop__up__window');
    document.getElementById(windowId).classList.add('hide__pop__up__window');
}

function addNewCategory(popUp, name, select) {
    const newOption = document.getElementById(name).value;
    const selectTag = document.getElementById(select);
    let option = document.createElement('option');
    option.value = newOption;
    option.innerHTML = newOption;
    selectTag.appendChild(option);
    // console.log(newOption);
    document.getElementById(name).value = "";
    document.getElementById(popUp).classList.remove('show__pop__up__window');
    document.getElementById(popUp).classList.add('hide__pop__up__window');
}

let specificationCount = 0;

function addSpecification() {
    const newKey = document.getElementById("key").value;
    const newValue = document.getElementById("value").value;
    console.log(newKey);
    console.log(newValue);
    let allSpecificationDiv = document.getElementById('added__fields');
    let rowDiv = document.createElement('div');

    // rowDiv.id = "rowDivId" + specificationCount;

    rowDiv.classList.add('spec__div__row');
    let keyInput = document.createElement('input');
    keyInput.type = "text";
    keyInput.value = newKey;
    keyInput.classList.add('add__input');
    keyInput.innerHTML = newKey;
    let valueInput = document.createElement('input');
    valueInput.type = "text";
    valueInput.value = newValue;
    valueInput.classList.add('add__input');
    valueInput.innerHTML = newValue;
    let deleteSpan = document.createElement('span');
    deleteSpan.classList.add('add__btn');
    deleteSpan.innerHTML = "Remove";

    rowDiv.appendChild(keyInput);
    rowDiv.appendChild(valueInput);
    rowDiv.appendChild(deleteSpan);

    allSpecificationDiv.appendChild(rowDiv);

    document.getElementById("key").value = "";
    document.getElementById("value").value = "";

    deleteSpan.addEventListener('click', function () {
        rowDiv.remove();
    })


    // deleteSpan.id = "deleteSpanId" + specificationCount;

    specificationCount = specificationCount + 1;
}

// function removeSpecificationRow(rowId) {
//     const div = document.getElementById(rowId);
//     console.log('remove');
//     console.log(rowId);
//     // div.remove();
// }
