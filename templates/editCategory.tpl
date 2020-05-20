{include 'header.tpl'}
<form action="saveEditCategory" method="POST">
<input type="hidden" name="id_categoria" value="{$category->id_categoria}">
<input type="text" name="categoria" value="{$category->categoria}">
<button type="submit">Guardar</button>
</form>
{include 'footer.tpl'}