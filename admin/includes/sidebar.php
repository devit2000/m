<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">MULTI SHOP ADMIN</span>
        </a>

        <ul class="sidebar-nav">
            
            <li class="sidebar-item <?=(($p=="")?"active":"") ?>">
                <a class="sidebar-link" href="index.php">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item <?=(($p=="slideshow")?"active":"") ?>">
                <a class="sidebar-link" href="index.php?p=slideshow">
                    <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Slideshows</span>
                </a>
            </li>
            <li class="sidebar-item <?=(($p=="product")?"active":"") ?>">
                <a class="sidebar-link" href="index.php?p=product">
                    <i class="align-middle" data-feather="box"></i> <span class="align-middle">Products</span>
                </a>
            </li>
            <li class="sidebar-item <?=(($p=="category")?"active":"") ?>">
                <a class="sidebar-link" href="index.php?p=category">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Category</span>
                </a>
            </li>
            <li class="sidebar-item <?=(($p=="brand")?"active":"") ?>">
                <a class="sidebar-link" href="index.php?p=brand">
                    <i class="align-middle" data-feather="star"></i> <span class="align-middle">Brands</span>
                </a>
            </li>
            <li class="sidebar-item <?=(($p=="page")?"active":"") ?>">
                <a class="sidebar-link" href="index.php?p=page">
                    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Pages</span>
                </a>
            </li>
            <li class="sidebar-item <?=(($p=="configuration")?"active":"") ?>">
                <a class="sidebar-link" href="index.php?p=configuration">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Configuration</span>
                </a>
            </li>
            <li class="sidebar-item <?=(($p=="user")?"active":"") ?>">
                <a class="sidebar-link" href="index.php?p=user">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
            </li>

        </ul>

    </div>
</nav>