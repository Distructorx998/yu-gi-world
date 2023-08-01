

<html>


	<head>
		<title>Yu-Gi-World</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="{{ asset('css/gestione.css')}}"/> 
		<script src="{{ asset('js/gestione.js')}}" defer="true"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/core.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/md5.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="icon" type="image/png" href="./css/assets/card.jpg">

	</head>
	

	<body>
    <h1 id="yu"> <img src="{{ asset('css/assets/pngegg.png') }}"> <img src="{{ asset('css/assets/pngegg.png') }}">  <img src="{{ asset('css/assets/pngegg.png') }}">  <img src="{{ asset('css/assets/pngegg.png') }}">  <img src="{{ asset('css/assets/pngegg.png') }}"> </h1>
		
		<header   >
			<div id="overlay">

				<nav id="barra">
					<a href=hw> <button id="home"> Home</button> </a>
                    <a href=profilo> <button id="profilo"> Profilo</button> </a>									
					<a  href='logout' class='button'> <button class="accedi"> Logout</button></a>
				</nav>
		

                <div id=view>
                   <p id=info>Informazioni Utente:</p> 
                    <div id="flex"> <div class="a" > Nome Utente </div>
                        <div class="b" id="utente"> </div> 
                        <div class ="c">   </div>
                    </div>

                    <div id="flex"> <div class="a"> User-ID </div>
                        <div class="b" id="id">  </div> 
                        <div class ="c">  </div>
                    </div>
                    
                    <div id="flex"> <div class="a"> Username </div>
                        <div class="b" id="username">   </div> 
                        <div class ="c">  </div>
                    </div>
              

                    <div id="flex"> <div class="a"> Email </div>
                        <div class="b" id="email">   </div> 
                        <div class ="c">  </div>
                    </div>
              
                    <div id="flex"> <div class="a"> Password </div>
                        <div class="b"> <img  src="./css/assets/three-dots.svg"><img  src="./css/assets/three-dots.svg"><img  src="./css/assets/three-dots.svg">  </div> 
                        <div class ="c"> <a href="modifica_password"><img  src="./css/assets/caret-right.svg"> </a> </div>
                    </div>
              
                    <div id="flex"> <div class="d"> Elimina Utente </div>
                    <div class="b">   </div> 
                    <div class ="c"><button id="accedi"> Elimina </button>   </div>

                    </div>
            </div>
		</div>
       
		</header>	

		<article id="modale" class="hidden"> 
		
		</article>

        <div id="footer">
    Giuliano Sicali | Viale Andrea Doria, 6, 95125 Catania CT ITALIA| C.F. SCLGLN98L18C351E | N.Matricola 1000014800 <br>
		  <a class="e-mail" href="https://www.google.com/intl/it/gmail/about/">	uni389533@studium.unict</a> | 
      <span>+39 327 9326610</span>
      <div class="social-cont">        
    	  <div class="floatstop"></div>
		  </div>
      <div class="credits">
        <a class="logoUniCT" target="_blank" href="https://www.unict.it/"></a>  
    	</div>
    </div>
	
	</body>

</html>
