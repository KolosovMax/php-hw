'use strict';
document.forms['files-loading'].addEventListener('submit', function (event){
    event.preventDefault();
    let maxSize = 0;
    for (let file of this.elements.foto.files){
        maxSize += file.size;
        if (file.size >= 2097152){
            document.getElementById('message').innerText = 'Некорректный размер файла';
            return;
            }
        if (!file.type.includes('image')){
            document.getElementById('message').innerText = 'Некорректный тип файлов';
            return;
        }
        if (!file.name.trim().length){
            document.getElementById('message').innerText = 'Некорректное имя фалов';
            return;
        }
        if (maxSize <20971520 ) document.getElementById('message').innerText = 'Файлы отправленны на сервер'
        else document.getElementById('message').innerText = 'Некорректный размер файлов'
    }
})
