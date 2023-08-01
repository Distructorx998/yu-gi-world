function onResponse(response) {
    console.log(response);
  return response.json();
}
/*
function onJson(json){
    alert("Account Eliminato"); 
    
  }
*/
function eliminaUtente(event){
    fetch("delete_deck").then(onResponse);
    fetch("delete_all").then(onResponse);
    fetch("elimina_utente").then(onResponse);
    window.location.href = 'home';
}
const elimina =document.querySelector('#accedi');
elimina.addEventListener("click", eliminaUtente);

/*
const username =document.querySelector('#usernameID');
elimina.addEventListener("click", cambiaUtente);
*/

function user(json){
  console.log(json);
  
  const user= document.querySelector('#username');
  user.textContent= json[0].username;

  const id= document.querySelector('#id');
  id.textContent= json[0].id;

  const utente= document.querySelector('#utente');
  utente.textContent= json[0].name +" " + json[0].surname ;

  const email= document.querySelector('#email');
  email.textContent= json[0].email;

}


fetch("utente").then(onResponse).then(user);