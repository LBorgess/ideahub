<?php

$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">'.$alertaLogin.'</div>' : '';
$alertaCadastro = strlen($alertaCadastro) ? '<div class="alert alert-danger">'.$alertaCadastro.'</div>' : '';

?>

<div class="h-100 p-5 bg-light text-dark rounded-3 my-4">

    <div class="row">

        <div class="col">
            <form method="post">
                <h2>Login</h2>

                <?=$alertaLogin?>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" require>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" require>
                </div>

                <div class="form-group">
                    <button type="submit" name="acao" value="logar" class="btn btn-primary mt-2">Entrar</button>
                </div>

            </form>
        </div>

        <div class="col">
            <form method="post">
                <h2>Cadastre-se</h2>

                <?=$alertaCadastro?>

                <div class="form-group">
                    <label for="email">Nome</label>
                    <input type="text" name="nome" class="form-control" require>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" require>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" require>
                </div>

                <div class="form-group">
                    <button type="submit" name="acao" value="cadastrar" class="btn btn-primary mt-2">Cadastrar</button>
                </div>

            </form>
        </div>

    </div>

</div>