{include "header.tpl"}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-8">
   <h1>Agrega una categoria</h1>
   <form action="insertCategory" method="POST">
      <input type="text" placeholder="categoria" name="categoria">
      <input type="text" placeholder="URL imagen" name="imagen">
      <button class="btn btn-primary" type="submit">Agregar</button>
   </form>
   <h2>Todas las categorias</h2>
   <ul>
   {foreach from=$categories item=category}
      <li>{$category->categoria}</li>
   {/foreach}
   </ul>
</div>
{include "footer.tpl"}