<div>
    <nav class="navbar navbar-expand-lg" style="
        background: linear-gradient(135deg, #6A11CB 0%, #2575FC 100%);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 12px 20px;
        border-radius: 7px;
        transition: background-color 0.3s ease;
    ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="
                font-size: 1.6rem;
                font-weight: bold;
                color: #ffffff !important;
                transition: color 0.3s ease;
            ">E-Commerce</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" style="
                    border: none;
                    outline: none;
                ">
                <span class="navbar-toggler-icon" style="
                    background-image: url('data:image/svg+xml;charset=utf8,%3Csvg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath stroke=\'rgba(255, 255, 255, 0.8)\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/%3E%3C/svg%3E');
                "></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/" style="
                            color: #ffffff !important;
                            font-size: 1rem;
                            font-weight: 500;
                            margin-right: 10px;
                            padding: 8px 12px;
                            transition: background-color 0.3s ease, color 0.3s ease;
                            border-radius: 8px;
                        ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products" style="
                            color: #ffffff !important;
                            font-size: 1rem;
                            font-weight: 500;
                            margin-right: 10px;
                            padding: 8px 12px;
                            transition: background-color 0.3s ease, color 0.3s ease;
                            border-radius: 8px;
                        ">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="
                                color: #ffffff !important;
                                font-size: 1rem;
                                font-weight: 500;
                                padding: 8px 12px;
                                border-radius: 8px;
                                transition: background-color 0.3s ease;
                            ">
                            Categories
                        </a>
                        <ul class="dropdown-menu" style="
                            background-color: #ffffff;
                            border: none;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            border-radius: 8px;
                        ">
                            <li><a class="dropdown-item" href="/category/pria" style="
                                color: #333 !important;
                                padding: 12px 20px;
                                transition: background-color 0.3s ease;
                            ">Pria</a></li>
                            <li><a class="dropdown-item" href="/category/wanita" style="
                                color: #333 !important;
                                padding: 12px 20px;
                                transition: background-color 0.3s ease;
                            ">Wanita</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/category/anak-anak" style="
                                color: #333 !important;
                                padding: 12px 20px;
                                transition: background-color 0.3s ease;
                            ">Anak-Anak</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex me-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="
                        border-radius: 20px;
                        border: 1px solid #ddd;
                        padding: 10px 15px;
                        transition: border-color 0.3s ease, box-shadow 0.3s ease;
                        background-color: #f9f9f9;
                    ">
                    <button class="btn btn-outline-success" type="submit" style="
                        color: #ffffff !important;
                        background-color: #2575FC !important;
                        border: none;
                        border-radius: 20px;
                        padding: 8px 16px;
                        transition: background-color 0.3s ease;
                        font-weight: 500;
                    ">Search</button>
                </form>

                {{-- Auth Section --}}
                @if(auth()->guard('customer')->check())
                <div class="dropdown">
                    <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false" style="
                            font-weight: 500;
                            border-radius: 20px;
                            padding: 8px 16px;
                            color: #ffffff !important;
                            border: 1px solid rgba(255,255,255,0.7);
                            transition: background-color 0.3s ease, color 0.3s ease;
                        ">
                        {{ Auth::guard('customer')->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="
                            border-radius: 8px;
                            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                        ">
                        <li><a class="dropdown-item" href="/customer/dashboard">Dashboard</a></li>
                        <li>
                            <form method="POST" action="{{ route('customer.logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a class="btn btn-outline-light me-2" href="{{ route('customer.login') }}" style="
                        font-weight: 500;
                        border-radius: 20px;
                        padding: 8px 16px;
                        color: #ffffff !important;
                        border: 1px solid rgba(255,255,255,0.7);
                        transition: background-color 0.3s ease, color 0.3s ease;
                    ">Login</a>
                <a class="btn btn-light" href="{{ route('customer.register') }}" style="
                        font-weight: 500;
                        border-radius: 20px;
                        padding: 8px 16px;
                        color: #2575FC !important;
                        transition: background-color 0.3s ease, color 0.3s ease;
                    ">Register</a>
                @endif
            </div>
        </div>
    </nav>
</div>
<br>