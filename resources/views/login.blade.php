
<html>
    <head>
        <link rel='stylesheet' href="{{ asset('css/login.css')}}">
        

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="./css/assets/card.jpg">
        <meta charset="utf-8">

        <title>Accedi - Yu-Gi-World</title>
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
            <h1>Accedi</h1>
            
                
            <form name='login' method='post' >
            @csrf 
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username'value='{{ old("username") }}'>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' value='{{ old("username") }}'>
                </div>
                @foreach($errors->all() as $error)
                <div class='errorj'>
                    <img src='{{ URL::to("./css/assets/x-octagon-fill.svg") }}'/>
                    <span>{{ $error }}</span>
                </div>
                @endforeach
                <div class="submit">
                    <input type='submit' value="Accedi" id="submit">
                </div>
            </form>
            <div class="signup">Non hai un account? <a href="re">Registrati</a>
        </section>
        </main>
        </div>
        </div>
    </body>
</html>
