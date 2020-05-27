{include "header.tpl"}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-8">
    <table>
        <thead>
            <tr>
                <th>Categorias</th>
                <th>Eliminar</th>
            </tr>
        </thead>
    <tbody>
    {foreach from=$categories item=category}
        <tr>
            <td>{$category->categoria}</td>
            <td>
                <a type="button" class="btn btn-danger" href="deleteCategory/{$category->id_categoria}">Eliminar</a>
            </td>
        </tr>   
    {/foreach}
    </tbody>
    </table>
</div>
{include "footer.tpl"}