window.addEventListener('DOMContentLoaded', (loadPage));
'use strict';

function loadPage(){
    let app = new Vue({
        el: "#appComments", //id del elemento.
        data: { //dentro de data definimos todas nuestras variables.
            admin: 0,
            comments:[],
            average: 0,
            total:0
        },
        methods: {
            deleteComm: function(id_comment){
                deleteComment(id_comment);
            }    
        }
    });    
    //Boton que envia un nuevo comentario
    let role = document.getElementById('role').value;
    let idPlan = parseInt(document.getElementById('plan').value);
    let url = "api/plans/"+idPlan+"/comments";
    //Al cargar el sitio se ejecuta esta función.
    getComments();
    let btnSend = document.getElementById('btn-Enviar');
    if(btnSend){
        btnSend.addEventListener('click', sendComment);
    }
   
    function getComments(){
        if( role == 1){
            app.admin=1;
        }
        fetch(url,{
        }).then(function (r) {
            if (r.status == 404){
            }
            else if (!r.ok) {
                alert("No se pudieron traer los datos del servidor");
            }else {
                return r.json();
            }
        }).then(function (json) {
        if(json != undefined){
            app.comments=json;
            calculateAverage(json);
        }else{
            app.comments=null;
        }
            
        }).catch(function(e){
            console.log(e);
        });
    }
    
    function sendComment(){
        event.preventDefault();
        let score = document.getElementById('puntaje');
        let content = document.getElementById('comentario');
        let idUser =  document.getElementById('id_usuario_fk');

        //Comprobar que no sean vacios los campos.
        if (content.value === ""){
            alert("Debe realizar un comentario para confirmar el envio");    
            return false;
        }
        else if (score.value === ""){
            alert("Debe seleccionar un puntaje para enviar el comentario");    
            return false;
        }
        else if (isNaN(idUser.value)){
            alert("Solo los ususarios registrados pueden realizar comentarios");    
            return false;
        }

        let comment = {
            "comentario":content.value,
            "puntaje": parseInt(score.value),
            "id_usuario_fk":  parseInt(idUser.value)
        };

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
            score.value = "";
            getComments();
        }).catch(function(e){
            console.log(e);
        });
    }

    function deleteComment(id_comment){
        fetch("api/comments/"+id_comment, {
            "method": "DELETE",
        }).then(function() {
            getComments(); 
        }).catch(function(e){
            console.log(e);
        });
    }

    function calculateAverage(response){
        let progressBar = document.getElementById('progress');
        let progress = 0;
        let sumScore=0;
        app.average=0;
        app.total=0;

        for (let item of response){
            sumScore+=parseInt(item.puntaje);
            app.total++;
        }
        app.average=parseFloat(sumScore/app.total).toFixed(1);
        progress=((app.average*100)/5).toFixed();
        if(progressBar != null){
            progressBar.setAttribute("style", "width: "+ progress+"%");
        }
    }
}