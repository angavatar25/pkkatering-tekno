<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Create</title>
</head>
<body>
    <form action="{{route('transaction.store')}}" method="post">
        @csrf
        <input type="hidden" name="food_id" value="{{$data->food->id}}">
        <input type="hidden" name="price" value="{{$data->food->price}}">
        <table>
            <tr>
                <td><label for="name">Nama</label></td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><label for="address">Alamat</label></td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td><label for="phone">Nomor Telepon</label></td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td><label for="amount">Jumlah</label></td>
                <td><input type="number" name="amount" id="amount" onchange="calculate()" value="0"></td>
                <td>Harga Satuan Rp.{{$data->food->price}}</td>
            </tr>
            <tr>
                <td><label for="total_payment_amount">Total Rupiah</label></td>
                <td><input type="number" name="total_payment_amount" id="total_payment_amount" value="0" disabled="disabled"></td>
            </tr>
            <tr>
                <td><label for="delivery_type">Pengantaran</label></td>
                <td>
                    <table>
                        <tr>
                            <td><input type="radio" name="delivery_type" value="1"> GO-SEND</td>
                            <td><input type="radio" name="delivery_type" value="2"> Grab Send</td>
                            <td><input type="radio" name="delivery_type" value="3"> Ambil Sendiri</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><label for="payment_type">Pengantaran</label></td>
                <td>
                    <table>
                        <tr>
                            <td><input type="radio" name="payment_type" value="1"> Transfer Bank</td>
                            <td><input type="radio" name="payment_type" value="2"> GO-PAY</td>
                            <td><input type="radio" name="payment_type" value="3"> Tunai</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <button type="submit">Submit</button>
    </form>

    <script>
        function calculate()
        {
            let amount, total
            amount = document.getElementById('amount').value
            total = document.getElementById('total_payment_amount')
            total.value = amount * {{$data->food->price}}
        }
    </script>
</body>
</html>