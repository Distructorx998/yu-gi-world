const overlay = document.getElementById("overlay");
overlay.classList.add("hidden");



function refresh(){
 
  
    const library = document.querySelector('#view');
    library.innerHTML = '';

    const carte = document.querySelector('.prezzo');
    carte.innerHTML = '';

    const nome = document.querySelector('.name');
    nome.innerHTML = '';

    const section = document.querySelector('main');
    section.classList.remove("hidden");
    const a = document.querySelector('#righe');
    a.innerHTML = '';
 
}

function fetchDeck() {
        fetch("fetch_deck").then(fetchResponse).then((res)=>(fetchJson(res, 0)));

}
function fetchDatabase() {
        fetch("fetch_database").then(fetchResponse).then((res)=>(fetchJson(res, 1)));

}

function fetchResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}

function fetchResponse2(response) {
  if (!response.ok) {return null};
}

function fetchResponseTotale(response) {
  if (!response.ok) {return null};
  return response.json();
}
function errore(json){
  console.log(json);
  if(json>=3 ){
    alert('Hai raggiunto il numero massimo di copie per questa carta');
    c=true;
    
  }
  if(json>= 60){
    alert('Hai raggiunto il limire massimo di carte nel deck');
  }
  console.log(c)
    c=false;
  

}

let c;

function aggiungiCarte(event,parametro){
  const x=event.currentTarget;
  const block = event.currentTarget.parentNode;
  const card = block.parentNode;
  const img= card.parentNode;

  const id= card.querySelector('.id').textContent;
  const rarity= card.querySelector('.rarity').textContent;
  const cod= card.querySelector('.cod').textContent;
  const nome= card.querySelector('.nome').textContent;
  const price= card.querySelector('.price').textContent;
  const immagine= img.querySelector('.album').src;

 console.log(nome);
 fetch ("deck?nome=" +nome+"&cod=" +cod +"&rarity=" + rarity+ "&price=" +price+ "&immagine="+immagine + "&id=" +id).then(fetchResponse).then(errore);
 fetchDatabase();
 /*x.removeEventListener('click',aggiungiCarte);
 x.src="./css/assets/file-check-fill.svg";
 */
}



function eliminaCarte(event){
  
  const block = event.currentTarget.parentNode;
  const card = block.parentNode;

  const cod= card.querySelector('.cod').textContent;
  const id= card.querySelector('.id').textContent;
 console.log(cod);
  fetch ("delete?cod=" +cod + "&id=" +id  ).then(fetchResponse); 
  if(true){  
    alert("Carta rimossa dal Deck!");
    
}
fetchDeck();

}


function eliminaDatabase(event){
  
  const block = event.currentTarget.parentNode;
  const card = block.parentNode;

  const cod= card.querySelector('.cod').textContent;
  const id= card.querySelector('.id').textContent;
 console.log(cod);
  fetch ("delete_database?id=" +id ).then(fetchResponse); 
  fetch ("delete?cod=" +cod + "&id=" +id  ).then(fetchResponse); 
  if(true){  
    alert("Carta rimossa dal Database");
}
  fetchDatabase();
}
/*
function onError(json){
  console.log(json);
  if(json.errore != undefined){
    alert(json.errore);
  }
  else 
  alert("Carta aggiunta al Deck!");
}
*/
function eliminaDeck(event)
{
  fetch("delete_deck");
  fetchDeck();
  alert("Deck eliminato!");
  fetchDeck();
}


function apriModale(event) {
	const image = document.createElement('img');
	image.id = 'immagine_post';
	image.src = event.currentTarget.src;
	modale.appendChild(image);
	modale.classList.remove('hidden');
	document.body.classList.add('no-scroll');
}

function chiudiModale(event) {
	if(event.key === 'Escape')
	{
		console.log(modale);
		modale.classList.add('hidden');
		img = modale.querySelector('img');
		img.remove();
		document.body.classList.remove('no-scroll');
	}
}

function fetchJson(json, parametro) {
    console.log("Fetching...");
    console.log(json);
    refresh();
    const library = document.querySelector('#view');
    const main = document.querySelector('main');
   
    const div1= document.createElement('div');
    div1.classList.add('carte');
    div1.textContent="Carte: " + json.length ;
    const totale= document.querySelector('.prezzo');
    totale.appendChild(div1);
    
  
    const nome = document.querySelector('.name');
    const deck=document.createElement('h1');
    const testo=document.createElement('div');
    console.log(parametro);
    if (parametro==0){
    deck.textContent="Deck";
    nome.appendChild(deck);

    }
    if (parametro==1){
      testo.textContent="Clicca + per inserire le carte nel tuo deck!";
      deck.textContent="Database";
      nome.appendChild(deck);
      nome.appendChild(testo);

    }
  


    if (parametro==0){
    const svuota=document.createElement('button');
    svuota.textContent="Svuota Deck";
    svuota.classList.add('svuota');
    svuota.addEventListener("click",eliminaDeck);

    div1.appendChild(svuota);
    }


    for(let i of json){
    const image= i.immagine;
    const img = document.createElement('img');
    const name= document.createElement('div');
    name.classList.add('nome');
    const id= document.createElement('div');
    id.classList.add('id');
    const rarity= document.createElement('div');
    const price= document.createElement('div');
    price.classList.add('price');
    const cod= document.createElement('div');
    cod.classList.add('cod');
    
    name.textContent = i.nome;
    rarity.textContent= i.rarity;
    console.log(rarity);
    rarity.classList.add('rarity');
    price.textContent=i.price ;
    cod.textContent=i.cod;
    id.textContent=i.id;
    img.classList.add('album');
    img.src= image;
    img.addEventListener('click', apriModale);

    const div= document.createElement('div');
    const form= document.createElement('form');
    const bottone= document.createElement('img');
    const bottone1= document.createElement('img');
    const span= document.createElement('span');
    bottone.src = "./css/assets/dash-square-fill.svg" ;
    bottone1.src = "./css/assets/plus-square-fill.svg" ;

    bottone.classList.add('meno');
    bottone1.classList.add('piu');
    div.classList.add('blocco');
    //name.classList.add('flex');
    library.appendChild(div);
    div.appendChild(img);
    div.appendChild (span);
    span.appendChild(name);
    span.appendChild(rarity);
    span.appendChild(cod);
    span.appendChild(price);
    span.appendChild(form);
    span.appendChild(id);
    window.scroll(top,710);

  
    if (parametro ==0){
      form.appendChild(bottone);
      bottone.removeEventListener('click',eliminaDatabase);
      bottone.addEventListener('click',eliminaCarte);
    }
    else
    {
     
      form.appendChild(bottone);
      bottone.removeEventListener('click',eliminaCarte);
      bottone.addEventListener('click',eliminaDatabase);
      if(i.d_id===null){
      form.appendChild(bottone1);
      
      bottone1.addEventListener('click',aggiungiCarte);
      }
      else {
        bottone1.src = "./css/assets/file-check-fill.svg" ;
        form.appendChild(bottone1);

      }

    }

    }
    if(parametro == 0){
      banana();
 
    }else{
      mela(); 
    }
  }
    
function noResults() {
    const container = document.getElementById('results');
    container.innerHTML = '';
    const nores = document.createElement('div');
    nores.className = "nores";
    nores.textContent = "Nessun risultato.";
    container.appendChild(nores);
  }

    const deck= document.querySelector('#deck');
    deck.addEventListener("click",fetchDeck);

    const database= document.querySelector('#database');
    database.addEventListener("click",fetchDatabase);

function banana(){
fetch("totale").then(fetchResponseTotale).then(totale);
}

function mela(){
fetch("totale_database").then(fetchResponseTotale).then(totale);
}


function totale(json){
  console.log(json);
  const div1= document.createElement('div');
  var numero= json[0].somma;
  div1.textContent="Totale: " +Math.round(numero * 100) / 100 + " $";
  
  const totale= document.querySelector('.prezzo');
  totale.appendChild(div1);
}

function user(json){
  console.log(json);
  
  const user= document.querySelector('#user');
  user.textContent= json[0].username;
}

fetch("utente").then(fetchResponse).then(user);

const modale = document.querySelector('#modale');
window.addEventListener('keydown', chiudiModale);