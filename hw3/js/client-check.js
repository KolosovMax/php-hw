'use strict';
document.forms['files-loading'].addEventListener('submit', function (event){
    event.preventDefault();
    let sizeCorrect;
    let maxSize = 0;
    let nameCheck;
    let typeCheck;
    for (let file of this.elements.foto.files){
        maxSize += file.size;
        if (file.size <= 2097152) sizeCorrect= true
        else {
            document.getElementById('message').innerText = 'Некорректный размер файлов';
            return;
            }
        console.log(sizeCorrect);
        if (file.type.includes('image')) typeCheck = true
        else {
            document.getElementById('message').innerText = 'Некорректный тип файлов';
            return;
        }
        if (file.name.trim().length) nameCheck = true
        else {
            document.getElementById('message').innerText = 'Некорректное имя фалов';
            return;
        }console.log (sizeCorrect, typeCheck, nameCheck, maxSize)
        if (maxSize <20971520 ) document.getElementById('message').innerText = 'Файлы отправленны на сервер'
        else document.getElementById('message').innerText = 'Некорректный размер файлов'
    }
})
