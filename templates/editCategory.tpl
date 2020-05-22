{include 'header.tpl'}
<form action="saveEditCategory" method="POST">
<input type="hidden" name="id_categoria" value="{$category->id_categoria}">
<input type="text" name="categoria" value="{$category->categoria}">
<input type="text" name="imagen" value="{$category->imagen}">
<button type="submit">Guardar</button>
</form>
{include 'footer.tpl'}