<header>
    <div class="col-sm-12" id="header-right">
        <a title="Sign In" href="/connexion">Sign In</a> or <a title="Sign Up" href="/inscription">Sign Up</a>
    </div>
    <div class="row" id="middle">
        <div class="col-md-6" id="logo">

            <img src="{{URL::asset('/pictures/Logo.png')}}" alt="profile Pic">
        </div>

        <div class="col-md-6">
            <div class="BDE" id="BDE">
                <h1>BDE Cesi.Exia</h1>
            </div>
        </div>
    </div>

    <div class="nav" id="nav">
        <nav class="navbar" id="navbar">

            <div class="col-md-4" id="Home">
                <a class="nav-link" href="\"><h4><div class="Ho">Home</div></h4></a>
            </div>

            <div class="col-md-3" id="Event">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="Eve"><h4>Events</h4></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <ul><a href="/events/coming" title="Incoming">Incoming Events</a></ul>
                                <ul><a href="/events/done" title="Done">Past Events</a></ul>
                                <ul><a href="/proposedevent" title="Ideas">Ideas Box</a></ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3" id="Shop">
                <a class="nav-link" href="\shop"><h4><div class="Sh">Shop</div></h4></a>
            </div>
            </ul>
            </ul>
        </nav>
    </div>

</header>