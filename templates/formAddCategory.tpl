{include "header.tpl"}
<h1>Agrega una categoria</h1>
 <form action="insertCategory" method="POST">
    <input type="text" placeholder="categoria" name="categoria">
    <button type="submit">Agregar</button>
 </form>
 <!--h1>Agrega un plan</h1>
 <form action="insertPlan" method="POST">
    <input type="text" placeholder="plan" name="plan">
    <input type="text" placeholder="cobertura" name="cobertura">
    <input type="text" placeholder="descripcion" name="descripcion">
    <select name="id_categoria_fk" >
    {foreach from=$categorias item=categoria }
       <option value="{$categoria->id_categoria}">{$categoria->categoria}</option>
    {/foreach}
    </select>
    <button type="submit">Agregar</button>
 </form-->
{include "footer.tpl"}