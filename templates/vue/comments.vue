{literal}
<section id="appComments">
    
    <div class="col-md-6 offset-md-3 mt-4">
        <div>{{promedio}}</div>
        <div v-for="comment in comments" class="mb-5 bg-light rounded border border-danger">
            <div class="d-flex justify-content-between form-group pl-3 pt-3 pb-2 bg-secondary rounded-top">
                <div>
                    <p>Ususario:  {{comment.email}}</p>
                </div>
                <div class="pr-3">
                    <p v-if="comment.puntaje == 1">⭐</p>
                    <p v-else-if="comment.puntaje == 2">⭐⭐</p>
                    <p v-else-if="comment.puntaje == 3">⭐⭐⭐</p>
                    <p v-else-if="comment.puntaje == 4">⭐⭐⭐⭐</p>
                    <p v-else-if="comment.puntaje == 5">⭐⭐⭐⭐⭐</p>
                </div>
            </div>
            <div class="d-flex justify-content-between form-group text-dark pl-3 pb-3">
                {{comment.comentario}}
                <div v-if="admin == 1" class="form-group">
                    <button v-on:click="deleteComm(comment.id_comentario)" class="btn btn-danger mr-4">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</section>
{/literal}