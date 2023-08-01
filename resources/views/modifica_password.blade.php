
<html>

    <head>
        <link rel='stylesheet'  href="{{ asset('css/modifica_password.css')}}"/> 
        <script src="{{ asset('js/modifica_password.js')}}" defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="./css/assets/card.jpg">
        <meta charset="utf-8">

        <title>Modifica Password </title>
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
        <h1>  <a href="gestione"><img id="exit" src="{{ asset('./css/assets/caret-left.svg') }}"> </a> Modifica Password</h1>
                  
                  
                  <form action='change_password' method='post' enctype="multipart/form-data" autocomplete="off" class="change-password-form">
                    @csrf
                    <div class="form-group mt-3 password_old">
                      <label class="form-control-placeholder" for="password_old">Password Attuale</label>
                      <input id="password_old-field" name="password_old" type="password" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 password">
                      <label class="form-control-placeholder" for="password">Password</label>
                      <input id="password-field" name="password" type="password" class="form-control" required>

                    </div>
                    <div class="form-group mt-3 confirm_password">
                      <label class="form-control-placeholder" for="confirm_password">Conferma Password</label>
                      <input id="confirm_password-field" name="confirm_password" type="password" class="form-control" required>

                    </div>
                    @foreach($errors->all() as $error)
                <div class='errorj'>
                    <img src='{{ URL::to("./css/assets/x-octagon-fill.svg") }}'/>
                    <span>{{ $error }}</span>
                </div>
                @endforeach
                    <div class="submit">
                    <input type='submit' value="Modifica" id="submit">
                </div>
                  </form>
             
        
        </section>
        </main>
        </div>
        </div>
    </body>
</html>
