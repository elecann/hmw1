let i, images;
let ricerca;
let z;

function onJson(json){
    console.log('JSON ricevuto');
    //console.log(json.results[i].urls.small);
     
     images = json.results; 
      const visione = document.querySelector('#foto'); 
      visione.innerHTML= ''; 
     visione.classList.add('disposizione');
  

    
     for( i=0; i<30; i++){
    
        
        img = json.results[i].urls.small;
        const image = document.createElement('img');
        
       image.src=img;

             visione.appendChild(image);
         }

          const v = document.querySelectorAll('#foto img'); 
          for(let calft of v) {
          calft.addEventListener('click', seleziona);
        
      }

}
function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }

function search(event){
    
    
    ricerca = form.ricerca.value;
    console.log(ricerca); 
    
   
    fetch("http://localhost/homework1/ricerca.php?q="+encodeURIComponent(ricerca)).then(onResponse).then(onJson);
    event.preventDefault();
}
const form = document.querySelector('#cerca');
form.addEventListener('submit', search);

function seleziona(event){
    
    //console.log(ricerca);
    console.log(event.currentTarget);
    if(event.currentTarget!==0){
        //const mod=document.createElement('div');
       

        prova.innerHTML='';

        const image = document.createElement('img');
        image.id='sub';
        let img= event.currentTarget.src; 
        console.log(img);
        image.src=img;
        z =img;
        console.log(image.src);

        const visione = document.querySelector('#foto'); 
        visione.classList.add('barra');   

        prova.classList.add('disposizione');
        prova.appendChild(image);
        const sub= document.createElement('input');
        sub.type='submit';
        sub.value='Aggiungi al tuo profilo';
        sub.id='submit';
        prova.appendChild(sub);

        let submit=document.querySelector('#submit');

        submit.addEventListener('click', inserisci);
       
    }

} 
    const prova=document.querySelector('.seleziona');
   

    function inserisci(event){
        console.log("HAI CLICCATO SUB");
        console.log(z);
        let bottone=z;
        console.log(bottone);
        fetch("http://localhost/homework1/inserisci.php?url="+bottone);
        event.preventDefault();
    }

