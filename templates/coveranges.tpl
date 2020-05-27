{include "header.tpl"}
<div class="contPlanes">
    <h1>{$plans[0]->categoria}</h1>
    <ul>
        {foreach from=$plans item=plan}
        {$id=$plan->id_planes}
        <li>
            <a href="showCoverage/{$id}">{$plan->plan}</a>
        </li>
        {/foreach}
    </ul>
</div>
<h2 class="d-flex justify-content-center">{$coveranges->plan}</h2>
<div class="d-flex flex-column contCoverange">
    <div>
        <h3>Cobertura</h3>
        <p>{$coveranges->cobertura}</p>
    </div>
    <div>
        <h3>Descripción</h3>
        <p>{$coveranges->descripcion}</p>
    </div>
</div>
{include "footer.tpl"}
