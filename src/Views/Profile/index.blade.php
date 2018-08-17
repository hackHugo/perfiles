
<!DOCTYPE html>
<html>
<head>
    <title>Profile By HackHugo</title>
</head>
<link href="{{url('css/app.css')}}" rel="stylesheet" type="text/css">
<script src="{{url('js/app.js')}}"></script>
<body>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-12">
            <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                    Profile
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="btn-group">
                            <a href="{{ url('profile/create')}}" class="btn btn-info" >Crear</a>
                        </div>
                    </div>
                    <div class="table-container" style="margin-top: 10px;">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th style="text-align: center;">id</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Action</th>
                            </thead>
                            <tbody>
                          @if($oProfiles->count())
                                @foreach($oProfiles as $item)
                                    <tr>
                                        <td style="text-align: center;">{{$item->id}}</td>
                                        <td style="text-align: center;">{{$item->name}}</td>
                                        <td style="text-align: center;">
                                            <a class="btn btn-primary btn-xs" href="{{url('profile/'.$item->id.'/edit')}}" ><span class="glyphicon glyphicon-pencil">Editar</span></a>
                                            <button class="btn btn-danger btn-xs" type="submit" onclick="jsEliminaArticulo({{$item->id}},'{{$item->name}}')"><span class="glyphicon glyphicon-trash">Eliminar</span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">No hay registro !!</td>
                                </tr>
                            @endif
                            </tbody>

                        </table>
                    </div>
                </div>
                {{$oProfiles->links() }}
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
    <script>
        function jsEliminaArticulo(id,nombre) {
            if (confirm("¿Estas seguro de eliminar el perfil " + nombre + " ?")) {
                var url = '{{url('profile')}}'+'/'+id;
                $.ajax({
                    method: "DELETE",
                    url: url
                })
                    .done(function( msg ) {
                        alert(msg);
                        document.location.href = document.location.href;
                    });
            }
        }

    </script>
</body>
</html>
