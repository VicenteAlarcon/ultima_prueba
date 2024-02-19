<!DOCTYPE html>
<html lang="en">
<!--
 Vista para crear la estructura del pdf. 
 Obtenemos los términos y los imprimimos.
-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
h1 {
    text-align: center;
}
</style>

<body>
    <h1>Listado de Terminos</h1>

    @foreach($terms as $term)
    <ul>
        <li>ID: {{ $term->id }}</li>
        <li>Nombre: {{ $term->name }}</li>
        <li>Fecha: {{ $term->date }}</li>
        <li>Breve descripcion: {{ $term->short_description }}</li>
        <li>Id de tipo: {{ $term->type_id }}</li>
        <li> Id de idioma: {{ $term->language_id }}</li>
    </ul>
    @endforeach
</body>


</html>