{include "header.tpl"}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-8">
    <table>
        <thead>
            <tr>
                <th>Usuarios</th>
                <th>Administrador</th>
                <th>Eliminar</th>
            </tr>
        </thead>
    <tbody>
    {foreach from=$users item=user }
        <tr>
            <td>{$user->email}</td>
            <td>
            {if $user->administrador == 1}
                <a type="button" class="btn btn-danger" href="confirmRole/{$user->email}/{$user->administrador}">SI</a>
            {else if $user->administrador == 0}
                <a type="button" class="btn btn-danger" href="confirmRole/{$user->email}/{$user->administrador}">NO</a>         
            {/if}
            </td>
            <td>
                <a type="button" class="btn btn-danger" href="deleteUser/{$user->id_usuario}">Eliminar</a>
            </td>
        </tr>   
    {/foreach}
    </tbody>
    </table>
</div>
</div>
</div>
{include "footer.tpl"}
