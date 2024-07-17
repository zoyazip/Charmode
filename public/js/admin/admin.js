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

function addNewColor() {
    const colorNameValue = document.getElementById('colorName').value;
    const colorHexValue = document.getElementById('colorHex').value;
    const newColorDiv = document.createElement('div');
    const newColorCheckbox = document.createElement('input');
    newColorCheckbox.type = "checkbox";
    newColorCheckbox.checked = true;
    newColorDiv.classList.add('color__div');
    newColorDiv.style.backgroundColor = colorHexValue;
    newColorCheckbox.name = "checked_colors[]";
    newColorCheckbox.value = '{'
        +'"name" : "' + colorNameValue + '",'
        +'"hex" : "' + colorHexValue + '"}';
    console.log(newColorCheckbox.value);
    newColorDiv.innerHTML = "";
    newColorCheckbox.innerHTML = "";
    document.getElementById('new__colors').appendChild(newColorDiv);
    document.getElementById('new__colors').appendChild(newColorCheckbox);
    document.getElementById('colorName').value = "";
    document.getElementById('colorHex').value = "";
    document.getElementById('colorPopUp').classList.remove('show__pop__up__window');
    document.getElementById('colorPopUp').classList.add('hide__pop__up__window');

    newColorCheckbox.addEventListener('click', function () {
        // const i = checkedColors.indexOf(color['id']);
        // checkedColors.splice(i, 1);
        // console.log(checkedColors.length);
        newColorDiv.remove();
        newColorCheckbox.remove();
    });
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
    keyInput.classList.add('spec__input__row');
    keyInput.name = "key[]";
    keyInput.innerHTML = newKey;
    let valueInput = document.createElement('input');
    valueInput.type = "text";
    valueInput.value = newValue;
    valueInput.classList.add('add__input');
    valueInput.classList.add('spec__input__row');
    valueInput.name = "value[]";
    valueInput.innerHTML = newValue;
    let deleteSpan = document.createElement('span');
    deleteSpan.classList.add('add__btn');
    deleteSpan.innerHTML = "Remove";
    
    rowDiv.classList.add('spec__div__row');

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

function removeSpecification(id) {
    document.getElementById(id).remove();
}

function removeColor(id1, id2) {
    document.getElementById(id1).remove();
    document.getElementById(id2).remove();

}

function colorDiv() {
    const colorDivs = document.getElementsByName('color__div');
    console.log(colorDivs.length);
    colorDivs.forEach(element => {
        const color = element.getAttribute('value');
        const colorJSON = JSON.parse(color);
        element.id = colorJSON.id;
        // element.id = color.id;
        // console.log(colorJSON.hex);
        element.style.backgroundColor = colorJSON.hex;
    });
}

const checkedColors = [];


function checkColor(color) {
    console.log(color);

    if (checkedColors.includes(color['id']) === false) {

        checkedColors.push(color['id']);
        // console.log(checkedColors);
        const newColorCheckbox = document.createElement('input');
        const newColorDiv = document.createElement('div');
        newColorCheckbox.type = "checkbox";
        newColorCheckbox.checked = true;
        newColorDiv.classList.add('color__div');
        newColorDiv.style.backgroundColor = color['hex'];
        newColorCheckbox.name = "checked_colors[]";
        newColorCheckbox.value = color['id'];
        newColorDiv.innerHTML = "";
        newColorCheckbox.innerHTML = "";
        document.getElementById('new__colors').appendChild(newColorDiv);
        document.getElementById('new__colors').appendChild(newColorCheckbox);
    
        newColorCheckbox.addEventListener('click', function () {
            const i = checkedColors.indexOf(color['id']);
            checkedColors.splice(i, 1);
            // console.log(checkedColors.length);
            newColorDiv.remove();
            newColorCheckbox.remove();
        });
    }
}

// function colorEditDiv(divc) {
//     divc.style.backgroundColor = divc.value;
// }
// const editColorDivs = document.getElementsByClassName("edit__div");
// editColorDivs.forEach(function (item) {
//     item.style.backgroundColor = item.value;
// });

function onLoadFunction() {
    comsole.log("onload");
}



colorDiv();

// function loadSubCategory() {
    const subcategoryDiv = document.getElementById('subCategorySelect');
    const catValue = document.getElementById('categorySelect').value;
    // console.log(catValue);
    // const subValue = document.getElementById('subDiv').value;
    // console.log(subValue);
    // console.log(document.getElementById('subCategorySelect').value);
    var options = document.getElementById('categorySelect').querySelectorAll("option");
    // console.log(document.getElementById('categorySelect').value);
    $.get('/subcategories',function(data, status){
        data.forEach(subcategory => {
            if (subcategory['category_id'] == catValue) {
                const newOption = subcategory['name'];
                let option = document.createElement('option');
                option.value = subcategory['id'];
                option.name = subcategory['id'];
                option.innerHTML = newOption;
                // if (subValue == subcategory['id']) {
                //     console.log("here");
                //     option.selected = true;
                // }
                subcategoryDiv.appendChild(option);
            }
        });
    })
// }

document.getElementById('categorySelect').addEventListener("change", function() {
    // document.getElementById('subCategorySelect').removeChild(document.getElementById('subCategorySelect'));
    const selectDiv = document.getElementById('subCategorySelect');

    while (selectDiv.hasChildNodes()) {
        selectDiv.removeChild(selectDiv.firstChild);
    }
    const subcategoryDiv = document.getElementById('subCategorySelect');
    const selectedCategoryId = document.getElementById('categorySelect').value;
    var options = document.getElementById('categorySelect').querySelectorAll("option");
    console.log(document.getElementById('categorySelect').value);
    $.get('/subcategories',function(data, status){
        // console.log(data[0]['id']);
        // console.log(JSON.stringify(data));
        data.forEach(subcategory => {
            // console.log(subcategory['id']);
            if (subcategory['category_id'] == selectedCategoryId) {
                const newOption = subcategory['name'];
                let option = document.createElement('option');
                option.value = subcategory['id'];
                option.name = subcategory['id'];
                option.innerHTML = newOption;
                subcategoryDiv.appendChild(option);
            }
            
        });

        // var jResult = JSON.stringify(data);
        // $_SESSION["allSubCategories"] = "' + JSON.stringify(data) + '";
        // <% $_SESSION.set('allSubCategories', JSON.stringify(data));
    })
});



