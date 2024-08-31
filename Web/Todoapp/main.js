const inputBox = document.querySelector(".inputField input");
const addBtn = document.querySelector(".inputField button");
const todoList = document.querySelector(".todoList");
const deleteAllBtn = document.querySelector(".footer button");

inputBox.onkeyup = () => {
    //Lay gia tri khi user nhap
    let userEnteredValue = inputBox.value;
    if (userEnteredValue.trim() != 0) {
        addBtn.classList.add("active");
    } else {
        addBtn.classList.remove("active");
    }
};

showTasks();
addBtn.onclick = () => {
    //Khi user nhap nut Add
    //Lay gia tri user nhap
    let userEnteredValue = inputBox.value;
    //Lay LocalStorage ( bien luu tru cuc bo)
    let getLocalStorageData = localStorage.getItem("New todo");
    if (getLocalStorageData == null) {
        //LocalStorage = NULL
        // Tao mang rong
        listArray = [];
    } else {
        // Chuyen JSON tu string sang Object
        listArray = JSON.parse(getLocalStorageData);
    }
    // Day gia tri moi vao mang da tao
    listArray.push(userEnteredValue);
    localStorage.setItem("New todo", JSON.stringify(listArray));
    //Chuyen JSON Object -> String
    showTasks();
    addBtn.classList.remove("active");
}

function showTasks() {
    let getLocalStorageData = localStorage.getItem("New todo");
    if (getLocalStorageData == null) {
        //LocalStorage = NULL
        // Tao mang rong
        listArray = [];
    } else {
        // Chuyen JSON tu string sang Object
        listArray = JSON.parse(getLocalStorageData);
    }
    const pendingTaskNumb = document.querySelector(".pendingTasks");
    pendingTaskNumb.textContent = listArray.length;
    if (listArray.length > 0) {
        deleteAllBtn.classList.add("active");
    } else {
        deleteAllBtn.classList.remove("active");
    }
    let newLiTag = "";
    listArray.forEach((element, index) => {
        newLiTag += `<li>${element}<span class ="icon" onclick="deleteTask(${index})"><i class="fas fa-trash"></i></span></li>`;
    });
    todoList.innerHTML = newLiTag;
    inputBox.value = "";
}

function deleteTask(index) {
    let getLocalStorageData = localStorage.getItem("New todo");
    listArray = JSON.parse(getLocalStorageData);
    listArray.splice(index, 1);
    localStorage.setItem("New todo", JSON.stringify(listArray));
    showTasks();
}

deleteAllBtn.onclick = () => {
    listArray = [];
    localStorage.setItem("New todo", JSON.stringify(listArray));
    showTasks();
}
