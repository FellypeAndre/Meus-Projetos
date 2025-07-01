<!DOCTYPE html>
<html>
<head>
    <title>Upload de Imagem</title>
</head>
<body>
    <h2>Enviar Imagem</h2>
    <form action="upload" method="post" enctype="multipart/form-data">
        Selecione uma imagem: <input type="file" name="imagem" accept="image/*" required />
        <br/><br/>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
