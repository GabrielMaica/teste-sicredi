@csrf

    <input type="text" name="name" placeholder = "Insira seu Nome" value="{{ $user->name ?? old('name') }}">
    <input type="email" name="email" placeholder = "Insira seu E-mail" value="{{ $user->email ?? old('email') }}">
    <input type="password" name="password" placeholder = "Insira sua senha">
    <button type ="submit">Enviar</button>