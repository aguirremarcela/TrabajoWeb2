{include "header.tpl"}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-8">
    <table>
        <thead>
            <tr>
                <th>Planes</th>
                <th>Eliminar</th>
            </tr>
        </thead>
    <tbody>
    {foreach from=$plans item=plan }
        <tr>
            <td>{$plan->plan}</td>
            <td>
                <a type="button" class="btn btn-danger" href="deletePlan/{$plan->id_planes}">Eliminar</a>
            </td>
        </tr>   
    {/foreach}
    </tbody>
    </table>
</div>
{include "footer.tpl"}
