{include "header.tpl"}
<h1>Agrega una categoria</h1>
 <form action="insertCategory" method="POST">
    <input type="text" placeholder="categoria" name="categoria">
    <input type="text" placeholder="URL imagen" name="imagen">
    <button type="submit">Agregar</button>
 </form>
{include "footer.tpl"}