<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>MOB FT 2022 - Rally</title>
    <link rel="shortcut icon" href="{{ asset('template/assets/img/logoMOB.png') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.bootstrap5.min.css">

    {{-- CDN ??? --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <div class="content-wrapper">
        {{-- Navbar --}}
        <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light py-3">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="#">
                            <h2 class="m-0">MOB FT 2022</h2>
                            {{-- <img src="{{ asset('asset/img/font-mobft-01.png ') }}" alt="" /> --}}
                        </a>
                    </div>
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto justify-content-end">
                            <li class="nav-item dropdown language-select">
                                {{-- <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ $user->name }}</a> --}}
                                    <a href="">Nama</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        {{-- <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a> --}}
                                            <a href="">Keluar</a>

                                        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form> --}}
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        {{-- End Navbar --}}
    </div>

    <div class="px-4">
        <table id="tabel" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Pos</th>
                    <th>Nama Tim</th>
                    <th>Status</th>
                    <th>Jam Ditambah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pos 1</td>
                    <td>Tim 1</td>
                    <td>Menang</td>
                    <td>21.30</td>
                </tr>
                <tr>
                    <td>Pos 2</td>
                    <td>Tim 2</td>
                    <td>Kalah</td>
                    <td>19.30</td>
                </tr>
                <tr>
                    <td>Pos 3</td>
                    <td>Tim 3</td>
                    <td>Seri</td>
                    <td>22.30</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="{{ asset('template/assets/js/theme.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery-3.6.0.min.js') }}"></script>
</body>

</html>
