<html>

<body>
    <h2>E-mail Fale Conosco Site</h2>

    <p><b>Nome:</b> {{ $cliente->nome }}</p>
    <p><b>Empresa:</b> {{ $cliente->empresa }}</p>
    <p><b>Telefone:</b> {{ $cliente->telefone }}</p>
    <p><b>E-mail:</b> {{ $cliente->email }}</p>
    <p><b>CPF/CNPJ:</b> {{ $cliente->cnpj }}</p>
    <p><b>Cidade:</b> {{ $cliente->cidade }}</p>
    <p><b>Mensagem:</b><br /> {{ $cliente->mensagem }}</p>

</body>

</html>
