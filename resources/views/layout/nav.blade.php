<style>
    .custon {
        border-radius: 2px;
    }
</style>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">JobDesk</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('alljob') }}">
                    All Job
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    Job Category
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Our Contact
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @if (auth()->check())
                @if (Auth::user()->role == 'requiter')
                    <form action="{{ route('applyjob') }}" method='POST'>
                        @csrf
                        <button style="border: none; background-color: white;">
                            <img src="{{ asset('img/icon/gmail.png') }}" alt="mailicon" width="40px" height="auto"
                                style="margin-right: 10px">
                        </button>
                    </form>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        @if (Auth::user()->role == 'admin')
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                        @endif
                        @if (Auth::user()->role == 'requiter')
                            <a class="dropdown-item" href="{{ route('reqdash') }}">Dashboard</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </li>
            @endif
            @if (!auth()->check())
                <li class="nav-item">
                    <div class="d-flex gap-2">
                        <form action="{{ route('loginform') }}">
                            <button class="btn btn-outline-primary custon">Login</button>
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
{{-- <script>
    function confimLogout() {
        swal({
            title: "Are you sure?",
            text:"are you user, want to log out?"
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    visible: true,
                    closeModal: true,
                },
                confirm: {
                    text: "Yes",
                    visible: true,
                    closeModal: true,
                },
            },
        }).then((result) => {
            form.submit();
        });
    }
</script> --}}
