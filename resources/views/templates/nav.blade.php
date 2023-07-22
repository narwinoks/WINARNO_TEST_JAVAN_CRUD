<nav class="navbar navbar-expand-lg bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/img/LOGO-CUTI.svg') }}" alt="" width="60" height="48">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/family')}}">Familly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/family/tree')}}">Tree</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <div class="navbar-avatar">
                            <img src="https://placehold.co/100" alt="User Avatar" class="rounded-circle image-fluid"
                                 width="30px">
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
