<h1>Proposed Events</h1>

    <ul>
        @foreach($idees as $idee)
            <div>{{ $idee ->name}}</div>
            <div>{{ $idee ->proposed_date}}</div>
            <div>{{ $idee ->thumbnail}}</div>
            <div>{{ $idee ->id_users}}</div>
            <div>{{ $idee ->description}}</div>
    </ul>
        @endforeach
