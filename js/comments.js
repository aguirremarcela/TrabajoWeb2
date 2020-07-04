window.addEventListener('DOMContentLoaded', (loadPage));
'use strict';
function loadPage(){
    /*let app = new Vue({
        el: "#template-vue-comments",
        data: {
            subtitle: "Estas tareas se renderizan desde el cliente usando Vue.js",
            comments: [] 
        }
    });*/

    //Boton que envia un nuevo comentario
    document.getElementById('btn-Enviar').addEventListener('click', sendComment);
    
    function sendComment(){
        event.preventDefault();
        let score = document.getElementById('puntaje').value;
        let content = document.getElementById('comentario').value;
        let idUser =  parseInt(document.getElementById('id_usuario_fk').value);
        let idPlan = parseInt(document.getElementById('plan').value);
        let url = "api/plans/"+idPlan+"/comments";
        let comment = {
            "comentario":content,
            "puntaje": score,
            "id_usuario_fk": idUser
        };
        console.log(score);

        //Comprobar que no sean vacios los campos.
        if(content === ""|| score === "" || isNaN(idUser)){
            alert("Todos los campos deben estar completos");
            return false;
        }

        fetch(url,{
            "method":"POST",
            "headers":{"Content-Type": "application/json"},
            "body": JSON.stringify(comment)
        }).then(function(r){
            if(!r.ok){
                alert("No se pudo enviar el comentario");
            }else{
                alert("El comentario ha sido enviado con exito");
            }
        }).then(function(){
            content.value = "";
            score.value   = "";
            idUser.value  = "";
            idPlan.value  = "";
            //ejecutar la funcion que trae todos los comentarios getComments() 
        }).catch(function(e){
            console.log(e);
        });
    }
}

