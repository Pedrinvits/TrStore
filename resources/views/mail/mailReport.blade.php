<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Relatório de Vendas</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Alata&family=Nunito:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');

            * {
                font-family: 'Nunito', sans-serif;
                box-sizing: border-box;
            }
            header, footer{
                background-color: #1B1C1E;
                width: 100%;
            }

            header{
                color: #DDE2DE;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 2%;
            }

            footer{
                height: 50px;
            }

            header img{
                width: 8%;
            }
            main {
                padding: 5%;
                height: 80vh;
            }
            
            table {
                width: 100%;
                margin: 3% auto 0 auto;
            }

            table thead {
                background-color: #1B1C1E;
                color: #DDE2DE;
            }

            table thead th {
                padding: 1%;
                border: none;
            }
            table tbody td {
                padding: 1%;
                border: none;
            }

            .text-right{
                text-align: right;
            }

            .text-left{
                text-align: left;
            }
        </style>
    </head>
    <body>
            <h2>Relatório de Vendas</h2>
              
            <table class="table table-dark table-striped mt-20 table-borderless table-hover">
                <thead>
                    <tr>
                        <th class="" width="15%">Número da venda</th>
                        <th class="">Vendedor</th>
                        <th class="">Email</th>
                        <th class="">Comissão</th>
                        <th class="">Valor da Venda</th>
                        <th class="">Data de Venda</th> 
                    </tr>
                </thead>
                <tbody class="table-hover">
                    @foreach($sales as $sale)
                        <tr>
                            <td class="text-left">#{{ $sale->sales_id }}</td>
                            <td class="text-left">{{ $sale->seller_name }}</td>
                            <td class="text-left">{{ $sale->seller_email }}</td>
                            <td class="text-right">{{ number_format($sale->sale_value, 2, ',', '.') }}</td>
                            <td class="text-right">{{ number_format($sale->sale_commission, 2, ',', '.') }}</td>
                            <td class="text-left">{{ date_format(date_create($sale->created_at), "d/m/Y") }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
    </body>
</html>