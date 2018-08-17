<!DOCTYPE html>
<html>
<head>
    <title>Profile By HackHugo</title>
</head>
<link href="{{url('css/app.css')}}" rel="stylesheet" type="text/css">
<script src="{{url('js/app.js')}}"></script>
<body>
<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-1"></div>
        <div class="box col-12">
            <div class="box-inner">
                <div class="box-content">
                    <div class="row">
                        @include('comun::error')
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Editar el Perfil</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formEdit" action="{{url('profile')}}/{{$profile->id}}" >
                                        @include('profiles::partials.form')
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-info textBig btnchange">Editar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
        <!--/span-->
    </div><!--/row-->
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            var data =  $( this ).serialize();
            $.ajax( {
                type: "PUT",
                url: '{{url('profile')}}/{{$profile->id}}',
                data: data,
                success: function( response ) {
                    console.log( response );
                    document.location.href = '{{url('profile')}}';
                },
                error: function (data) {
                    console.log(data);
                }
            } );
        });
    });
</script>
