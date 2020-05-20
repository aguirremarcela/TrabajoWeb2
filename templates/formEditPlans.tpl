{include "header.tpl"}
<table>
    <thead>
        <tr>
            <th>Planes</th>
            <th>Editar</th>
        </tr>
    </thead>
<tbody>
{foreach from=$plans item=plan}
    <tr>
        <td>{$plan->plan}</td>
        <td>
            <a type="button" class="btn btn-danger" href="editPlan/{$plan->id_planes}">Editar</a>
        </td>
    </tr>  
{/foreach}
</tbody>
</table>
{include "footer.tpl"}