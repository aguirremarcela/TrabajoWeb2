{include 'header.tpl'}
<form action="saveEditCategory" method="POST">
<input type="number" name="id_categoria" value="{$category->id_categoria}" class="d-none">
<input type="text" name="categoria" value="{$category->categoria}">
<button type="submit">Guardar</button>
</form>
{include 'footer.tpl'}