@extends('layouts.ejemploLayout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">

<!-- aqui va el temporizador  -->
    <br>
    <div id="barratiempo" class="progress">
    <div id="tiempo" class="progress-bar progress-bar-striped primary  progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <br>
    <div class="row">
        <div class="col-3">
            <hi id="marcador">0</hi>
        </div>
        <div id="preguntas" class="col-6">
            

        </div>
        <div class="col-3">
            
        </div>
    </div>
</div>

<script>
    var pregunta = @json($pregunta);
    
    $('#marcador').html('{{$marcador}}');
    $('#preguntas').append('<button class="btn btn-block btn-warning disabled ">' + pregunta[0].enunciado + '</button>');
    $('#preguntas').append('<button id="1" class="btn btn-block btn-info " onclick="chequeaRespuesta(1)">' + pregunta[0].r1 + '</button>');
    $('#preguntas').append('<button id="2" class="btn btn-block btn-info " onclick="chequeaRespuesta(2)">' + pregunta[0].r2 + '</button>');
    $('#preguntas').append('<button id="3" class="btn btn-block btn-info " onclick="chequeaRespuesta(3)">' + pregunta[0].r3 + '</button>');
    $('#preguntas').append('<button id="4" class="btn btn-block btn-info " onclick="chequeaRespuesta(4)">' + pregunta[0].r2 + '</button>');


    function chequeaRespuesta(_respuesta){
            $('button').addClass('disabled').prop("onclick", null);
            if (_respuesta == pregunta[0].correcta ){ 
                $('#'+_respuesta).removeClass('btn-primary').addClass('btn-success');
                $('#preguntas').append('<button class="btn btn-block btn-warning " onclick="sigue()"> PREGUNTA SIGUIENTE  </button>');   
            }
            else{
                $('#'+_respuesta).removeClass('btn-primary').addClass('btn-danger');
                $('#'+ pregunta[0].correcta).removeClass('btn-primary').addClass('btn-success');
                $('#preguntas').append('<button class="btn btn-block btn-dark " onclick="pierde()"> PREGUNTA SIGUIENTE  </button>');   
            }
        }


        function pierde(){
        console.log("hola2");
        window.location.replace(href="{{ url('pregunta', [$tema, Crypt::encrypt($marcador)]) }}");
    }

        function sigue(){
        console.log("hola");
        window.location.replace(href="{{ url('pregunta', [$tema, Crypt::encrypt($marcador=$marcador+1)]) }}");
    }



    


    //el siguiente método controla la barra de tiempo
    var segundo = 1;
        var seguimos = true; 
        var progress;
     $(document).ready(function() {
        dibujaBarraTiempo();
     });
     function dibujaBarraTiempo(){
        //temporizador de la barra        
        clearInterval(progress);
        progress = setInterval(function() {
            var $caja = $("#barratiempo");
            if ($("#tiempo").width() >= $caja.width()) {
                clearInterval(progress);
                segundo = 0;
                //AQUI PONES LA FUNCIÓN QUE QUIERES EJECUTAR
                // SI EL TEMPORIZADOR AGOTA EL TIEMPO, por ejemplo, inCorrecta();
                chequeaRespuesta(-1);
            } else {
                if(seguimos){           
                    $("#tiempo").width($("#tiempo").width()+$caja.width()/10);
                    segundo++; 
                } 
            }  
            if (segundo < 5){
                $("#tiempo").removeClass("bg-warning");
                $("#tiempo").removeClass("bg-danger");
                $("#tiempo").addClass("bg-success");
            } else if (segundo < 8){
                $("#tiempo").removeClass("bg-success");
                $("#tiempo").addClass("bg-warning");
            } else {
                $("#tiempo").removeClass("bg-warning");
                $("#tiempo").addClass("bg-danger");
            }               
            $("#tiempo").text(segundo);
        }, 3600);
     }
</script>