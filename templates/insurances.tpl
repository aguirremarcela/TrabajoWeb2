{include file="header.tpl"}
<div class="cont_cat">
    {foreach from=$insurances item=insurance}
    {$id=$insurance->id_categoria}
    {$category=str_replace(" ",'<br />',$insurance->categoria)}
    <a class="caja rounded-circle items navbar-brand" href="seePlansCategory/{$id}">{$category}</a>
    {/foreach}
</div>
{include file="footer.tpl"}