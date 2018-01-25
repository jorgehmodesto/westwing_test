@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 align="center">Relat&oacute;rio de chamados abertos</h2>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id="frmFilterTicketReportRecords" method="get" action="{{ route('ticket_report') }}">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $requestParams['email'] }}" placeholder="Filtrar por email"/>
                                </div>
                                <div class="col-sm-3">
                                    <label for="order_number">N&uacute;mero do pedido</label>
                                    <input type="text" class="form-control" name="order_number" id="order_number" value="{{ $requestParams['orderNumber'] }}" placeholder="Filtrar por n&uacute;mero do pedido"/>
                                </div>
                                <div class="col-sm-1">
                                    <label for="submit_button">&nbsp;</label>
                                    <button type="submit" id="submit_button" class="btn btn-primary form-control">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="display dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>N&uacute;mero do pedido</th>
                        <th>Email do cliente</th>
                        <th>T&iacute;tulo do chamado</th>
                        <th>Observação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ $record->ticket_date }}</td>
                            <td>{{ $record->order_number }}</td>
                            <td>{{ $record->client_name }}</td>
                            <td>{{ $record->ticket_title }}</td>
                            <td>{{ $record->obs }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        window.onload=function () {
            loadDatatable();
        }
    </script>
@endsection