<html>
<head>
    <link href="css\site.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="jquery-3.3.1.min.js"></script>

</head>
<body>

@section('sousimage')
    <div id="corps" class="panel-body">
        {!! Form::open(['url' => 'postEvent', 'files' => true]) !!}
        <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
            {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre de l\'événement']) !!}
            {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
        </div>

        <div class="form-group {!! $errors->has('date') ? 'has-error' : '' !!}">
            {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Choisissez une date']) !!}
            {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Entrez un prix']) !!}
            {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
            {!! Form::textarea ('description', null, ['class' => 'form-control', 'placeholder' => 'Description de l\'événement']) !!}
            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            {!! Form::file ('image', null, ['class' => 'form-control', 'placeholder' => 'Choisissez une image à importer']) !!}
            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        </div>

        {!! Form::submit('Créer l\'événement !', ['class' => 'btn btn-info pull-right']) !!}

        {!! Form::close() !!}

    </div>
@endsection

</body>
</html>