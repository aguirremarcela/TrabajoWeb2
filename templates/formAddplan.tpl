{include "header.tpl"}
{include "navAbm.tpl"}
 <h1>Agrega un plan</h1>
 <form action="insertPlan" method="POST">
    <input type="text" placeholder="plan" name="plan">
    <input type="text" placeholder="cobertura" name="cobertura">
    <input type="text" placeholder="descripcion" name="descripcion">
    <select name="id_categoria_fk" >
    {foreach from=$categories item=category }
       <option value="{$category->id_categoria}">{$category->categoria}</option>
    {/foreach}
    </select>
    <button type="submit">Agregar</button>
 </form>
 <h2>Todos los planes</h2>
 <ul>
 {foreach from=$plans item=plan}
   <li>{$plan->plan}</li>
 {/foreach}
 </ul>
{include "footer.tpl"}