@extends('layouts.user')

@section('title', 'Perfil')

@section('breadcrumb')
    <a class="tip-bottom">Perfil</a>
@endsection

@section('content')
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>

                <h5>Perfil</h5>
            </div>
            <div class="widget-content">
                <div class="row">
                    <form action="{{ route('user::profile') }}" method="POST">
                        {!! csrf_field() !!}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Nome de Usuário</label>
                                <p class="form-control-static">{{ $user->username }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="referred_by">Referência</label>
                                <p class="form-control-static">{{ $user->referred_by }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <p class="form-control-static">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpf">CPF (Comprovante Pessoa Física)</label>
                                <p class="form-control-static">{{ $user->cpf }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Nome</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Celular</label>
                                <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="full_address">Endereço Completo</label>
                                <input type="text" name="full_address" value="{{ $user->full_address }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="form-control btn btn-success btn-block">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection