{include file="header.tpl"}
<ul>
    {foreach from=$plans item=plan}
    {$id_cat=$plan->id_categoria_fk}
    {$id=$plan->id_planes}
    <li><a href="showCoverage/{$id}/{$id_cat}">{$plan->plan}</a></li>
    {/foreach}
</ul>
{include file="footer.tpl"}