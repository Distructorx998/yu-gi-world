
<html>
    <head>

		<link rel="stylesheet" href="{{ asset('css/r.css')}}"/> 
		<script src="{{ asset('js/r.js')}}" defer ></script>


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="./css/assets/card.jpg">

        <script>
            const CHECK_USERNAME_URL="{{ URL::to ('re/check/username')}}";
            const CHECK_EMAIL_URL="{{ URL::to ('re/check/email')}}"; 
            </script>

        <meta charset="utf-8">

        <title>Iscriviti - Yu-Gi-World </title>
    </head>
    <body>
        <div id="logo">
            Yu-Gi-World
        </div>
        <div id="sfondo">
        <div id="overlay">
        <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Iscriviti gratuitamente per gestire le tue carte preferite!</h1>
            
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                @csrf 
            <div class="names">
                    <div class="name">
                        <label for='name'>Nome</label>
                        <input id="name_campo" type='text' name='name' value='{{ old("name") }}'>
                        <div><img src="./css/assets/x-octagon-fill.svg"/><span>Devi inserire il tuo nome</span></div>
                    </div>
                    <div class="surname">
                        <label  for='surname'>Cognome</label>
                        <input id="surname_campo" type='text' name='surname'  value='{{ old("surname") }}'>
                        <div><img src="./css/assets/x-octagon-fill.svg"/><span>Devi inserire il tuo cognome</span></div>
                    </div>
                </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input id="username_campo" type='text' name='username' value='{{ old("username") }}'>
                    <div><img src="./css/assets/x-octagon-fill.svg"/><span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input id="email_campo" type='text' name='email' value='{{ old("email") }}'>
                    <div><img src="./css/assets/x-octagon-fill.svg"/><span>Indirizzo email non valido</span></div>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input id="password_campo" type='password' name='password' value='{{ old("password") }}'>
                    <div><img src="./css/assets/x-octagon-fill.svg"/><span>Inserisci almeno 8 caratteri</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input id="confirm_password_campo" type='password' name='confirm_password' value='{{ old("confirm_password") }}'>
                    <div><img src="./css/assets/x-octagon-fill.svg"/><span>Le password non coincidono</span></div>
                </div>
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" >
                    <label for='allow'>Accetto i termini e condizioni d'uso di Yu-Gi-World.</label>
                </div>
                @foreach($errors->all() as $error)
                <div class='errorj'>
                    <img src='{{ URL::to("./css/assets/x-octagon-fill.svg") }}'/>
                    <span>{{ $error }}</span>
                </div>
                @endforeach

                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="login">Accedi</a>
        </section>
        </main>
        </div>
        </div>
    </body>
</html>
