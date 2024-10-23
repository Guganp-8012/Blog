<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>
        <h2>Lista de Postagens</h2>

        <div class="container">

            <div class="row">
                <div class="col-sm">
                    @auth
                        <img src="" alt="foto de perfil" style="max-width: 100px; max-height: 100px;">
                    @endauth
                </div>

                <div class="col-sm">
                    @foreach($postagens as $postagem)
                        <div class="card" style="width: 18rem; align-items: center;">
                            
                            @if($postagem->foto)
                                <img src="{{ asset('storage/' . $postagem->foto) }}" alt="imagem do post" style="max-width: 100px; max-height: 100px;">
                            @else
                                Sem foto
                            @endif
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $postagem->titulo }}</h5>

                                <span>
                                    @if($postagem->data_postagem)
                                        {{ date('d/m/Y', strtotime($postagem->data_postagem)) }}
                                    @else
                                        Data Indisponível
                                    @endif
                                </span>
                                <p class="card-text">{{ $postagem->conteudo }}</p>

                                <i class="fa-solid fa-thumbs-up" style="color: #339AF0;"></i>

                                <i class="fa-solid fa-thumbs-down" style="color: #FF4545;"></i>

<!--btn like / modal para comentarios-->
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-sm">
                    <!-- Botão para abrir o modal -->
                    @guest
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                            Entrar
                        </button>
                    @endguest

                    @auth
                        <button type="button" class="btn btn-danger">
                            Sair
                        </button>
                    @endauth

                    <!-- Modal -->
                    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div>
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                                        </div> 
                                        <div>
                                            <label for="password">Senha</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                                        </div>
                                    </form>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                    <span>Não tem conta? Cadastre-se <a href="{{ route('register') }}">aqui</a><span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>