{include file="header.tpl"}
<div class="cont_cat">
    {foreach from=$insurances item=insurance}
        {$id=$insurance->id_categoria}
    <div class="caja rounded-circle"><a class="items" href="seePlansCategory/{$id}">{$insurance->categoria}</a></div>
    {/foreach}
</div>
{include file="footer.tpl"}