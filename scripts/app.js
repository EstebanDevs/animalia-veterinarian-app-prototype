var lastPetCard = '';

//Formulario de actualización
const editPetForm = document.getElementById('updateform');

//Formulario para agregar
const addPetForm = document.getElementById('addform');

//Campos en el formulario de actualización
const nameInEditForm = document.querySelector(".updateForm input[name='Name']");
const machoInEditForm = document.querySelector(".updateForm #macho")
const hembraInEditForm = document.querySelector(".updateForm #hembra");
const ageInEditForm = document.querySelector(".updateForm input[name='Age']");
const idInEditForm = document.querySelector(".updateForm input[name='PetID']"); 
const cardsCointainer = document.getElementById('cardmain');
//Función para volver a agregar la ultima carta seleccionada
function redrawPetCard(card){
    cardsCointainer.appendChild(card);
}

//Función para mostrar el formulario para agregar una mascota
function addPet(){
    //Validar si el formulario de actualizar está abierto para quitarlo
    if(!editPetForm.classList.contains('hide')){
        editPetForm.classList.add('hide');
        redrawPetCard(lastPetCard);
    }
    
    //Mostrar el formulario
    addPetForm.classList.remove("hide");
}

//Función para editar los datos de una mascota
function editPet(element){
    //Validar si el formulario de agregar está abierto para quitarlo
    if(!addPetForm.classList.contains('hide')){
        addPetForm.classList.add('hide');
    }
    
    //Mostrar el formulario
    editPetForm.classList.remove("hide");
    
    //Traer los elementos que contienen los datos que se encuentran en la ficha y la ficha que los contiene
    lastPetCard = element.parentElement.parentElement;
    let card = element.parentElement.parentElement;
    let id = element.parentElement.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild;
    let name = element.parentElement.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling;
    let sex = element.parentElement.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling;
    let age = element.parentElement.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling;
    console.log(card, id, name.innerHTML, sex, age);


    //Poner los datos de la ficha de la mascota en su respectivo campo en el form de actualización
    idInEditForm.value = parseInt(id.innerHTML);
    nameInEditForm.value = name.innerHTML;
    ageInEditForm.value = parseInt(age.innerHTML);
    switch(sex.innerHTML){
        case 'Hembra':
            hembraInEditForm.checked = true;
            break;
        case 'Macho':
            machoInEditForm.checked = true;
            break;
        default:
            break;
    }

    //Eliminar la ficha de la lista
    card.remove();
    console.log(card);
}


