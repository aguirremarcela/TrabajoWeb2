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
        <button id="{$plan->id_planes}">Eliminar</button>
        </td>
    </tr>   
{/foreach}
</tbody>
</table>
