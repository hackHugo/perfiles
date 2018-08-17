<div class="form-group">
    <label for="" class="">Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name" value="@isset($profile) {{$profile->name}}@endisset">
</div>
<h4 style="">Selecciona las operaciones del perfil:</h4>
<div class="form-group">

    <div class="row">
        @foreach($modules as $modulo)
            <div class="col-xs-12 col-md-6 modulo" style="height: 230px">
                <div class="card" style="">
                    <h4 class="card-header" style="background-color:#353d47;color: #fff0f0;text-align: center">
                        <label for="">{{$modulo->name}}</label>
                        <input type="checkbox" value="seleccionaTodas-{{$modulo->id}}" value="" class="seleccionaTodas">
                    </h4>
                    <div class="card-block" style="padding: 10px;">
                        @foreach($modulo->Coperacion as $item)
                            <div class="checkbox">
                                <label>

                                    <?php
                                    $checado=false;

                                    //si existe la variable rol y la operacion coincide en una agregada al rol, checamos el checkbox
                                    ?>
                                    @if(isset($rol))
                                        @if(fmelchor\perfiles\Utils\ArrayHelper::BuscaEnArregloPorAtributo($rol,$item->id,"id_operation"))

                                            <?php
                                            $checado=true;
                                            ?>

                                        @endif

                                    @endif
                                    <input type="checkbox" class="chkOperacion" name="idOperation[]" value="{{$item->id}}" @if($checado == true) checked @endif>
                                    {{ $item->operation}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    //funcionalidad de los checkbox
    $(".seleccionaTodas").click(function(){
        //obtenemos el padre del modulo
        $padreModulo = $(this).closest(".modulo");

        //si se checka el check se checan los hijos y biseversa
        if($(this).prop("checked")==true){
            $padreModulo.find(".chkOperacion").prop("checked",true)
        }else{
            $padreModulo.find(".chkOperacion").prop("checked",false)
        }

    })


</script>
