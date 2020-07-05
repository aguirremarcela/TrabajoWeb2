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
    <data value="{$administrator}" id="role"></data>
<div>
    {include "vue/comments.vue"}
</div>
    <data value="{$coveranges->id_planes}" id="plan"></data>
    {if !empty($user)}
    <h2 class="col-md-6 offset-md-3 mt-4">Dejanos tu comentario!</h2>
    <form class="col-md-6 offset-md-3 mt-4">
        <data value="{$userId}" id="id_usuario_fk"></data>
        <div class="mb-2">
            <select name="puntaje" id="puntaje" class="btn btn-light selectpicker">
                <option hidden selected value="">Puntaje</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div>
            <textarea name="comentario" class="form-control" id="comentario" rows="4" placeholder="Inserte que opina de nuestro plan"></textarea>
        </div>
        <input type="submit" id="btn-Enviar" class="btn btn-danger mt-2" value="Enviar">
    </form>
    {/if}
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="js/comments.js"></script>
{include "footer.tpl"}
