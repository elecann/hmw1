 const visione=document.querySelector('.disposizione');
let img;
let i;
function onJson(json){
    
    console.log("Json ricevuto");
    console.log(json);
    visione.innerHTML='';
    
    const immage= json;
    //const utente=elem.nickname;

    const disposizione = document.createElement('div');
    //const nickname=document.createElement('h1');
    //nickname.textContent=utente;
    const image=document.createElement('img');
   
    image.src=immage;
    disposizione.appendChild(image);

    
    //disposizione.appendChild(nickname);
    visione.appendChild(disposizione);
    //disposizione.classList.add('disposizione');
        
    console.log("sei doop la creazione dello spazio");

}
function onResponse(response){
	return response.json();
}

function inserisci(event){

    console.log("ciao");
    console.log(event.currentTarget.url.value);
    const url=event.currentTarget.url.value;
    

    if((url)!==0){
        const togli=document.querySelector('form');
        togli.classList.add('rimuovi')
        console.log("sei nell'if");
    }  
    fetch("http://localhost/homework1/profilo_pers.php?url="+url);
    fetch("http://localhost/homework1/impostala.php").then(onResponse).then(onJson1);
    
   
    event.preventDefault();
    console.log("sei dopo la fetch");

}
const div= document.querySelector('form');
div.addEventListener('submit', inserisci);


console.log("teoricamente fine");
fetch("http://localhost/homework1/impostala.php").then(onResponse).then(onJson1);

function onJson1(json){
    console.log(json);
    img=json[0].url;
    if(img!==0){
        const label=document.querySelector('form');
        label.classList.add('rimuovi');

        const prepar=document.querySelector('#foto');
        prepar.innerHTML='';

        const sub= document.createElement('input');
        sub.type='submit';
        sub.value='Cambia img profilo';
        sub.id='submit';
        prepar.appendChild(sub);

        let submit=document.querySelector('#submit');


        submit.addEventListener('click', cambia);

        
        console.log(prepar);
        const image=document.createElement('img');
        image.src=img;
        prepar.appendChild(image);
    }
    

    
}
fetch("http://localhost/homework1/contenuti.php").then(onResponse).then(onJson2);
function cambia(event){
    console.log(event.currentTarget);
    const label=document.querySelector('form');
    label.classList.remove('rimuovi');
    label.addEventListener('submit', inserisci);

}

function onJson2(json){
    console.log(json[0].foto);
    const prepara=document.querySelector('#contenuti');
    prepara.innerHTML='';
    //console.log(prepara);
    
    
    
    
    for( i=0; i<49; i++){
        const img=json[i].foto;

       const image = document.createElement('img');
       image.src=img;

           prepara.appendChild(image);
       }
    
    

}