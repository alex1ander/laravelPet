<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center" href="/">
                <img class="logo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAXVBMVEX///8AAAD+/v6lpaXb29vBwcGFhYVhYWEwMDDz8/PGxsaoqKifn5+9vb1+fn7Z2dnt7e1ra2vi4uJzc3OMjIxmZmZKSkpbW1tSUlIoKCgRERHl5eWJiYlXV1eTk5MhQhKdAAAEv0lEQVR4nO2diXLbIBRFFews3tMsTdK4+f/PbCZuU/FA8B470j2dZpiJJDhGcL2AMwwAAAAAAAAAAABYDOrz3/D131UATaPU3x+OAqufO78XlFLRhbYdYcgpVDLkzaV9j8N2WwbAYkDiX+g4LZgs29B2tO3gfhP/fq1z2jQ2DqNniP0V4ZCtrRlx3KXDihpeD9MHZ29ojjvHYsivvYv4YRsWITDNnfANOc8uRAW2dVyOtdWHNmDYlWHobOaksbm0ZlqkE1t0WuQAhmVB4tsKvivtqOGWXXUhpIb3+9WY3Q9qeNyNf78vJjKJ1HBNjTwUE/lqcYrYCTbsJvEj+rCTxG/6Lk0CDOsapkj8cMNeEr/tPrQBw64MkfgskPgOw06AYV3DFIn/EGnYXOJvjjca50dicNxej9n+JL9/0s9fsRuWDJ+hr4925Hq37sNfcs6CdmINaad4DG+zGgZkbgZDQe1FEr83Q5t06bu0NRiG+uM6R0OdyoZZxqGewrXHoXglVp4+TLFQDoZzNcwzDrUL1h6HYpAWraWFHOUzpB8QvroPf65iofP4djeGNvFFbTT0AfH5NI+g9Cv8utN5+0jbes5gFd9mntfdxmOkczPRsIyJn3ogsQyL5iEM2zZMNQ4lo6XwOGRQxbAode7SksBQer2yholmGtF770h8W8O4BRjO0RCJX82wKM/uFr1Kr+e+3NVTDgcdY4skIW1t757acmzQNJaiZzX0LgOIXOpvG6xew2QfuyumYerEL9iHn3UyDJPnIQz7Mgwah4FxbC9kH4cWyhkOTMPUzCstbMAwbW1I/AUmvlKBefgfYwNhXUNj+6LYcNgc9OWSR1LF41lbLnkkVyCn+ziQ2t/11Zzn39TwQ1/NeVDyxD95HsQH4xxtAPhOp5DxQ/HdQVebYRCNw8E/1tfWx4X/pGTa0IZvFrgYypAbik43DZ3AEIYUzkAyDPXsFhvqiU/nDJ6hKPFr9qFlumcYivMQhn0bhoxDlSwPi4zDAEMkvtfQCQxhSEHiWw116Olkd971lnw6p9deJA99X6EjNKS784ZzlOGT9v09q9Ve+AqY8y6G0NDYMnkTZUhff1vPinxXX5j4dCW7aShK/LXrYGbiU3yGnsQXGIbVHo+wjpi7NL72IGBIaNwwZKbxJD7ZnacMQ1niR880jHf166bFemB89Bv5KTcM2zZE4tv7sKvEZ90nThq/Sw1h1n2SzNACEj8aNdGH4xDvaxyG1TEaAJN9+H2M2YfTa8phmIZ5G/Lm0r7HIdLCAIYwjKtdDhL/QsdpwawDhtoxbRki8ZH4MIQhEj8N804LZh0w1I5pyxCJj8SHIQyR+GmYd1rY6rCsLBtD/zYCw9CFcFVdENRw5d5uZxzuMdw6r2bsDSyR+EJ841BIicQXGxJaM2Ss0oUhDOsaWhJfbNj4TJOsD6fSAoYwjASJzzIktGY4+7SAYf+Gi0h83zdDevj31x++04K+4qtveNJ36wnZn6jhNupy9xkMY/l+C2fy3aaaZPgLto5CHdptGQCLQd95Zy90PtOw4Gxf8RXadoQhp1DJEInf+L0FwDxA4l/oOC2YwJBTQOJno92WAbAYkPgXOk4LJjDkFJD42Wi3ZWD4A2leV6UERhBEAAAAAElFTkSuQmCC" alt="Logo" />
                <span>SampleName</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Панель управления</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/plans">Планы</a>
                </li>
                @if(Auth::check())
                    @if(auth()->user()->isAdmin)
                    <li class="nav-item">
                        <a class="nav-link" href="/users">Пользователи</a>
                    </li>
                    @endif
                @endif
                </ul>

                <div class="d-flex align-items-center">
                    @if(Auth::check())
                    <span class="me-3">{{ Auth::user()->name }}</span>
                    <a href="/logout" class="btn btn-outline-danger btn-sm">Logout</a>
                    @else
                    <a href="/login" class="btn btn-outline-primary btn-sm me-2">Login</a>
                    <a href="/register" class="btn btn-outline-success btn-sm">Register</a>
                    @endif
                </div>
            </div>


            <div class="d-flex-l d-none align-items-center">
                @if(Auth::check())
                <span class="me-3">{{ Auth::user()->name }}</span>
                <a href="/logout" class="btn btn-outline-danger btn-sm">Logout</a>
                @else
                <a href="/login" class="btn btn-outline-primary btn-sm me-2">Login</a>
                <a href="/register" class="btn btn-outline-success btn-sm">Register</a>
                @endif
            </div>

        </div>
    </nav>
</header>
