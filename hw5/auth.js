"use strict";
const  errors = document.getElementById("errors");
document.querySelector("form").addEventListener("submit", function (event){
    event.preventDefault();
    if (this.elements.login.value.trim().length > 2 && this.elements.pass.value.trim().length > 2){
        fetch("auth_check.php", {
            method: "post",
            body: new FormData(this)
        }).then(response =>response.text())
            .then(text =>{
                if (text === 'error2') errors.innerText = "Такого логина не существует, зарегитстрируйтесь"
                else if(text === 'error1') errors.innerText = "Ошибка авторизации"
                else if (text === 'success') window.location.href = "account.php";
            }
            )}
    else errors.innerText = "Логин и пароль должен быть длинее 2х символов";
})