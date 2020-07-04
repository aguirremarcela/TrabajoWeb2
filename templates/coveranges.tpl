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
<div>
    <form>
        <data value="{$coveranges->id_planes}" id="plan"></data>
        <data value="{$userId}" id="id_usuario_fk"></data>
        <label>Seleccione un puntaje: </label>
        <select name="puntaje" id="puntaje">
            <option hidden selected value="">Seleccionar</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="textarea" name="comentario" id="comentario" placeholder="Déjenos saber su opinión">
        <input type="submit" id="btn-Enviar" value="Enviar">
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="js/comments.js"></script>
{include "footer.tpl"}
