{include file="header.tpl"}
<ul>
    {foreach from=$plans item=plan}
        {$id=$plan->id_planes}
    <li><a href="showCoverage/{$id}">{$plan->plan}</a></li>
    {/foreach}
</ul>
{include file="footer.tpl"}