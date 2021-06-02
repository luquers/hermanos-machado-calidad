<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <h2>Árbol documental - {{$procedure->name}}</h2>
        </div>

        @if ($documents->count() == 0)
            <div class="row">
                <div class="col-1"></div>
                <div class="mt-4 p-2 col-10">
                    <h5><b>Este procedimiento aún no dispone de documentos.</b></h5>
                </div>
            </div>lo
        @endif

        @foreach ($documents as $document)
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="mt-4 p-2 col-10 border-bottom">
                <h5><b>Documento: {{$document->name}}</b></h5>
                <p>Código: {{$document->code}} <br>
                    Versión: {{$document->versions->count()}} <br>
                    Últimos cambios: {{$document->versions->sortByDesc('revision')->first()->description}} <br>
                    Enlace: {{$document->link}} <br>

                </p>
            </div>

        </div>
        @endforeach


    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>