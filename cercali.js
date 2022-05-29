let utente;
let i;
const pers=document.querySelector('#nome');

function onJson(json){
    

    pers.innerHTML='';
    console.log("ricevuto");
    console.log(json[i]);
    pers.textContent=json.nickname;
    const utente=document.createElement('div');
    utente=json[i].nickname;
    const immage=document.createElement('img');
    immage.src=json.url;
    img=immage.src;
    console.log('3');
    pers.appendChild(utente);
    pers.appendChild(img);
    fetch("http://localhost//homework1/cercali_post.php?nickname="+utente).then(onResponse1).then(onJson1);
}
   

function onResponse(response){ 
    return response.json(); 
}
    
function onResponse1(response){
 
    return response.json(); 
}

function cerca(event){
    utente=form.cerca.value;
    const nickname=utente;
    console.log(nickname);
    fetch("http://http://localhost/homework1/cercali_nome.php?nickname="+nickname).then(onResponse).then(onJson);
    console.log("sei alla fetch");
    event.preventDefault();
}

console.log('1');

function onJson1(json){
    console.log("Ricevuto js1");
    console.log(json);
    console.log('2');
    box.innerHTML=' ';
    console.log("Stampo il json ricevuto");
    console.log(json);     
    
    
    pers=document.createElement('div'); 
    const img=document.createElement('img'); 
    img.src=json[i].foto;

    const div_nome=document.createElement('div'); 
	div_nome.textContent= json[i].nome; 
    pers.appendChild(img);
    pers.appendChild(div_nome);
    box.appendChild(pers);
}
const box = document.querySelector(".seleziona");
const form = document.querySelector('form'); 
form.addEventListener('submit',cerca);

