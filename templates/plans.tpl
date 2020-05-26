{include "header.tpl"}
{if !empty($plans[0]->categoria)}
    <h1>{$plans[0]->categoria}</h1>
{/if}
<ul>
    {foreach from=$plans item=plan}
    {$id_cat=$plan->id_categoria_fk}
    {$id=$plan->id_planes}
    <li><a href="showCoverage/{$id}/{$id_cat}">{$plan->plan}</a></li>
    {/foreach}
</ul>
{include "footer.tpl"}