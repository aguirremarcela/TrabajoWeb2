{include file="header.tpl"}
<ul>
    {foreach from=$insurances item=insurance}
        {$id=$insurance->id_categoria}
    <li><a href="seePlansCategory/{$id}">{$insurance->categoria}</a></li>
    {/foreach}
</ul>
{include file="footer.tpl"}