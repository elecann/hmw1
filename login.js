function validazione(event)
{
    // Verifica se tutti i campi sono riempiti
    if(form.nickname.value.length === 0 || form.password.value.length === 0)
    {
        // Avvisa utente
        // (meglio con div nascosto)
        alert("Compilare tutti i campi.");
        // Blocca l'invio del form
        event.preventDefault();
    }
        
}
/*function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}*/

// Riferimento al form
//const form = document.forms['form'];
const form= document.querySelector('form');
// Aggiungi listener
//fetch("login.php").then(fetchResponse).then(validazione);
form.addEventListener('submit', validazione);