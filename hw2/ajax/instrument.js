'use strict';
for (let btn of document.querySelectorAll('button')){
    btn.addEventListener('click', function (){
        fetch('instrument.php' + this.dataset.id).then(response => response.json())
            .then(instrumentInfo =>{
               this.after(document.createElement('div').innerHTML = `
                <div>
                    <h2>${instrumentInfo.title}</h2>
                    <img src="img/${instrumentInfo.image}" alt="<?= $instrument['title'] ?>">
                    <p>${instrumentInfo.description}</p>
                    <p>${instrumentInfo.price}</p>
                    <p>${instrumentInfo.count}</p>        
                 </div>                
                `);
            })
    })
}