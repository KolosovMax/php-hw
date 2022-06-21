'use strict';
document.forms['files-loading'].addEventListener('submit', function (event){
    event.preventDefault();
    let fd = new FormData();
    let nameErrorArr = [];
    let sizeErrorArr = [];
    let typeCheckArr = [];
    for (let file of this.elements['foto[]'].files){
        console.log(file);
        if (file.size >= 2097152) {
            sizeErrorArr.push(file)
            continue;
        }
        if (!file.type.includes('image')) {
            typeCheckArr.push(file)
            continue;
        }
        if (!file.name.trim().length){
            nameErrorArr.push(file);
            continue;
        }
        fd.append('foto[]',file);
    }
    if (nameErrorArr.length){
        document.getElementById('name-message')
        .innerText = `Из- за ошибки в имени файла небыло отправленно ${nameErrorArr.length} 
        файлов(а)`
    }
    if (sizeErrorArr.length){
        document.getElementById('size-message')
            .innerText = `Из - за ошибки с размером файла небыло отправленно ${sizeErrorArr.length} 
        файлов(а)`
    }
    if (typeCheckArr.length){
        document.getElementById('type-message')
            .innerText = `Из- за ошибки с типом файла небыло отправленно ${typeCheckArr.length} файлов(а)`
        /*     .innerHTML = `
        <p>Из- за ошибки с типом файла небыло отправленно ${typeCheckArr.length} 
        файлов(а)</p>`
       <button type="button" id="full-type">Подробнее</button>
        document.getElementById('full-type').addEventListener('click',function () {
           for (let error of typeCheckArr){
               let p =document.createElement('p');
                  p.innerHTML =`<p>${error.name}</p>`
               let oldP= document.getElementById('type-error');
              document.insertBefore (p,oldP)
           }*/

        }
       fetch('/php/server-check.php', {
        method: 'post',
        body: fd
    })
        .then(response => response.text())
        .then(text => {
            console.log(text);
            document.getElementById('response').innerText = text;
        });
});
