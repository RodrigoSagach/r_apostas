@extends('layouts.user')

@section('title', 'Painel')

@section('content')
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li>
                <a href="{{ route('user::index') }}">
                    <span class="glyphicon glyphicon-dashboard quick-actions-icon"></span>
                    Painel
                </a>
            </li>
            <li>
                <a href="{{ route('user.irequests.create') }}">
                    <i class="fa fa-line-chart quick-actions-icon" aria-hidden="true"></i>
                    Gerenciar Finanças
                </a>
            </li>
            <li>
                <a href="{{ route('user::profile') }}">
                    <span class="glyphicon glyphicon-user quick-actions-icon"></span>
                    Perfil
                </a>
            </li>
        </ul>
    </div>

    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span></span>

                <h5>Estatísticas do Usuário</h5>

                <div class="buttons">
                    <a href="{{ url('/register/' . $user->username) }}" class="btn btn-link">{{ url('/register/' . $user->username) }}</a>
                </div>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-8">
                        <canvas width="400" height="400" id="userChart" style="width: 100% !important; max-width: 800px; height: 400px !important;"></canvas>
                        <script type="text/javascript">
                            var $ctx = $('#userChart');

                            var userChart = new Chart($ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Indicados', 'Investimentos', 'Estimativa de Lucro', 'Saldo Atual'],
                                    datasets: [
                                        {
                                            label: 'Estatísticas do Usuário',
                                            data: [{{ $user->references }}, {{ $user->investments_amount }}, {{ $user->total_earnings }}, {{ $user->balance }}]
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false
                                }
                            });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <ul class="stat-boxes2">
                            <li>
                                <div class="left">
                                    <i class="fa fa-2x fa-users"></i>
                                </div>
                                <div class="right">
                                    <strong>{{ $user->references }}</strong>
                                    Total de Indicados
                                </div>
                            </li>
                            <li>
                                <div class="left">
                                    <i class="fa fa-2x fa-refresh"></i>
                                </div>
                                <div class="right">
                                    <strong>{{ format_money($user->investments_amount) }}</strong>
                                    Total de Investimentos
                                </div>
                            </li>
                            <li>
                                <div class="left">
                                    <i class="fa fa-2x fa-level-up"></i>
                                </div>
                                <div class="right">
                                    <strong>{{ format_money($user->total_earnings) }}</strong>
                                    Ganho Estimado / Lucro
                                </div>
                            </li>
                            <li>
                                <div class="left">
                                    <i class="fa fa-2x fa-money"></i>
                                </div>
                                <div class="right">
                                    <strong>{{ format_money($user->balance) }}</strong>
                                    Saldo Atual
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="fa fa-users" aria-hidden="true"></span></span>

                <h5>Indicados Por Você</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Registrado Em</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($references as $reference)
                            <tr>
                                <td>{{ $reference->id }}</td>
                                <td>{{ $reference->name }}</td>
                                <td>{{ $reference->email }}</td>
                                <td>{{ $reference->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row-fluid">
                    <div class="clearfix">
                        <nav class="pull-right">
                            {!! $references->links() !!}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection