{include file="header.tpl"}
<h1>{$plans[0]->categoria}</h1>
<ul>
    {foreach from=$plans item=plan}
    {$id_cat=$plan->id_categoria_fk}
    {$id=$plan->id_planes}
    <li><a href="showCoverage/{$id}/{$id_cat}">{$plan->plan}</a></li>
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
{include file="footer.tpl"}
