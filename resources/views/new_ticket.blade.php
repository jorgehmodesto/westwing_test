@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Cadastro de chamado</b></div>

                    <div class="panel-body">
                        <form id="frmNewTicket" name="frmNewTicket" method="post" action="javascript:newTicket()">
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label for="customer_name">Nome do cliente</label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Digite aqui o nome do cliente">
                                </div>
                                <div class="col-lg-3">
                                    <label for="customer_email">Email do cliente</label>
                                    <input type="email" class="form-control" id="customer_email" name="customer_email" aria-describedby="emailHelp" placeholder="Digite aqui o email do cliente">
                                </div>
                                <div class="col-lg-3">
                                    <label for="order_number">N&uacute;mero do pedido</label>
                                    <input type="text" class="form-control" id="order_number" name="order_number" placeholder="Digite aqui o n&uacute;mero do pedido">
                                </div>
                                <div class="col-lg-3">
                                    <label for="ticket_title">T&iacute;tulo do chamado</label>
                                    <input type="text" class="form-control" id="ticket_title" name="ticket_title" placeholder="Digite aqui o t&iacute;tulo do atendimento">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="obs">Observa&ccedil;&otilde;es</label>
                                <textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection