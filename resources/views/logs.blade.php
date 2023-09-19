@extends('layouts.app')

@section('content')
    <div class='logs'>
        <h3 class="logs__header">Log de alterações</h3>
    @if (null !== $logs)
        <table class="logs__table">
            <thead>
                <tr class="logs__row">
                    <th class="logs__table-header">Alteração</th>
                    <th class="logs__table-header">Usuário</th>
                    <th class="logs__table-header">Valor</th>
                    <th class="logs__table-header">Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr class="logs__row">
                        <td class="logs__info">{{ $log['change'] }}</td>
                        <td class="logs__info">{{ $log['user_name'] }}</td>
                        <td class="logs__info logs__info--long">{{ $log['value'] }}</td>
                        <td class="logs__info">{{ $log['created_at'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $logs->links() }}
    @endisset
    </div>
@endsection
