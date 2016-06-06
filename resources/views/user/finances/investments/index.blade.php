@extends('layouts.user')

@section('title', 'Investimentos')

@section('breadcrumb')
    <a href="{{ route('user.irequests.index') }}" class="tip-bottom"><i class="glyphicon glyphicon-usd"></i> Finanças</a>
    <a class="tip-bottom"><i class="glyphicon glyphicon-share"></i> Investimentos</a>
@endsection

@section('content')
    <div class="row">
    @include('partials.user.sidebar')
        <div class="col-md-9">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></span>

                    <h5>Investimentos</h5>
                </div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Quantiade</th>
                                    <th>Investido Em</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($investments as $investment)
                                <tr>
                                    <td>{{ $investment->id }}</td>
                                    <td>{{ $investment->user->name }}</td>
                                    <td>{{ $investment->user->email }}</td>
                                    <td>{{ format_money($investment->amount) }}</td>
                                    <td>{{ $investment->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row-fluid">
                        <div class="clearfix">
                            <div class="pull-right">
                                <nav>
                                    {{ $investments->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection