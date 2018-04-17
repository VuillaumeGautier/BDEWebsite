@section('sousimage')
    <div class="space"></div>
    <h1>Idée créée avec succès !</h1>
    <div class="space"></div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href=<?php echo("/ideePicture".$idee['id_proposed_events']) ?> class="MakaleYazariAdi"><?php echo $idee['name']?> </a>
            <div class="btn-group" style="float:right;">

            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@endsection