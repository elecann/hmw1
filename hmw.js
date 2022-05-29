
    function checkName(event) {
        const input = event.currentTarget;
        
        /* if(formStatus[input.name] = /^[a-zA-Z]+$/.test(input.value)) { */
        if (input.value.length > 0) {
            input.parentNode.classList.remove('errorj');
        } else {
            input.parentNode.classList.add('errorj');
        }
    
    }
    
    function jsonCheckUsername(json) {
        if (!json.exists) {
            document.querySelector('.nickname').classList.remove('errorj');
        } else {
            document.querySelector('.nickname span').textContent = "Nome utente già utilizzato";
            document.querySelector('.nickname').classList.add('errorj');

        }
    
    }
    
    function jsonCheckEmail(json) {
        // Controllo il campo exists ritornato dal JSON
        if (!json.exists) {
            document.querySelector('.email').classList.remove('errorj');
        } else {
            document.querySelector('.email span').textContent = "Email già utilizzata";
            document.querySelector('.email').classList.add('errorj');
        }
    
    }
    
    function fetchResponse(response) {
        if (!response.ok) return null;
        return response.json();
    }
    
    function checkNickname(event) {
    
    
        if(!/^[a-zA-Z0-9_]{1,15}$/.test(nickname.value)) {
            nickname.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
            nickname.classList.add('errorj');
        } else {
            fetch("check_username.php?q="+encodeURIComponent(nickname.value)).then(fetchResponse).then(jsonCheckUsername);
        }    
    }
    
    function checkEmail(event) {
        const emailInput = document.querySelector('.email input');
        if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
            document.querySelector('.email span').textContent = "Email non valida";
            document.querySelector('.email').classList.add('errorj');
        } else {
            fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
        }
    }
    
    function checkPassword(event) {
        const passwordInput = document.querySelector('.password input');
        if ( passwordInput.value.length >= 8) {
            document.querySelector('.password').classList.remove('errorj');
        } else {
            document.querySelector('.password').classList.add('errorj');
        }
    
    }
 
    
   
    const nome = document.querySelector('.nome input');
    nome.addEventListener('blur', checkName);
    const cognome = document.querySelector('.cognome input')
    cognome.addEventListener('blur', checkName);
    const nickname = document.querySelector('.nickname input')
    nickname.addEventListener('blur', checkNickname);
    const email = document.querySelector('.email input')
    email.addEventListener('blur', checkEmail);
    
