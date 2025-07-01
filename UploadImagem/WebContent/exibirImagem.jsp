<!DOCTYPE html>
<html>
<head>
    <title>Imagem Enviada</title>
</head>
<body>
    <h2>Imagem Enviada com Sucesso:</h2>
    <img src="<%= request.getAttribute("imagem") %>" alt="Imagem enviada" width="300"/>
    <br/><br/>
    <a href="index.jsp">Enviar outra imagem</a>
</body>
</html>
