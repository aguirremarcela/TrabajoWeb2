{include "header.tpl"}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-8">
    <table>
        <thead>
            <tr>
                <th>Usuarios</th>
                <th>Cambiar Rol</th>
                <th>Eliminar</th>
            </tr>
        </thead>
    <tbody>
    {foreach from=$users item=user }
        <tr>
            <td>{$user->email}</td>
            <td>
                <div class="custom-control custom-switch">
                    {if $user->administrador == 1 }
                        <input type="checkbox" class="custom-control-input" id="customSwitch{$user->id_usuario}" checked value="1">
                        <label class="custom-control-label" for="customSwitch{$user->id_usuario}"></label>
                    {else}
                        <input type="checkbox" class="custom-control-input" id="customSwitch{$user->id_usuario}" disabled value="0">
                        <label class="custom-control-label" for="customSwitch{$user->id_usuario}"></label> 
                    {/if}
                    
                </div>
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
