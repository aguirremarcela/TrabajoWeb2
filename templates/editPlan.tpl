{include 'header.tpl'}
{include "navAbm.tpl"}
<form action="saveEditPlan" method="POST">
<input type="hidden" name="id_planes" value="{$plan->id_planes}">
<input type="text" name="plan" value="{$plan->plan}">
<input type="text" name="cobertura" value="{$plan->cobertura}">
<textarea name="descripcion" cols="30" rows="10">{$plan->descripcion}</textarea>
<button type="submit">Guardar</button>
</form>
{include 'footer.tpl'}