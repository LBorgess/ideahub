<title>Ideahub</title>
</head>

<body>
<header>
        <nav class="caixa-nav">
            <!-- nav item 1 -->
            <a class="logo" href="index.php">
                <h1>IdeaHub</h1>
            </a>

            <!-- nav item 2 -->
            <div class="pesquisa">
                <input class="barraPesquisa" placeholder="Pesquisar..." type="search">
                <span class="icones  iconePesquisa material-symbols-outlined">search</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a class="nav-link" href="cadastrar.php" title="novo post">
                        <span class="material-symbols-outlined">add</span>
                        <span class="descricao d-1">novo post</span>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <span class="material-symbols-outlined">person</span>
                    <span class="descricao-user d-1"><?php echo $usuarioLogado['nome'] ?></span>
                </li>
                <li class="nav-item px-2">
                    <a class="sair nav-link" href="logout.php">Sair</a>
                </li>
            </ul>

            <div class="hamburguer">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>