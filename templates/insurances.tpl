{include "header.tpl"}
<div class="cont_cat">
    {foreach from=$insurances item=insurance}
    {$id=$insurance->id_categoria}
    {$category=str_replace(" ",'<br />',$insurance->categoria)}
    <a class="caja rounded-circle items navbar-brand" style="background-image: url({$insurance->imagen})" href="seePlansCategory/{$id}">{$category}</a>
    {/foreach}
</div>
{include "footer.tpl"}