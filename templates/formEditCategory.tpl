{include 'header.tpl'}
{include "navAbm.tpl"}
<table>
    <thead>
        <tr>
            <th>Categorias</th>
            <th>Editar</th>
        </tr>
    </thead>
<tbody>
{foreach from=$categories item=category}
    <tr>
        <td>{$category->categoria}</td>
        <td>
            <a type="button" class="btn btn-danger" href="editCategory/{$category->id_categoria}">Editar</a>
        </td>
    </tr>  
{/foreach}
</tbody>
</table>
{include 'footer.tpl'}