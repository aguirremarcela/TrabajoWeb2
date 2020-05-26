{include "header.tpl"}
<h1>{$plans[0]->categoria}</h1>
<ul>
    {foreach from=$plans item=plan}
    {$id=$plan->id_planes}
    <li><a href="showCoverage/{$id}">{$plan->plan}</a></li>
    {/foreach}
</ul>
<h1>{$coveranges->plan}</h1>
<table>
    <tr>
        <th>Cobertura</th>
        <th>Descripcion</th>
    </tr>
    <tr>
        <td>{$coveranges->cobertura}</td>
        <td>{$coveranges->descripcion}</td>
    </tr>
</table>
{include "footer.tpl"}
