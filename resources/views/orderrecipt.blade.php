<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Dear Customer  {{$details["name"]}} , Thank you for ordering from Food Plaza.We hope you have a good day.Enjoy Your meal.
   
<br>
<br>
<h4 style="text-align: center;"><b>Recipt</b></h4>
    <table border="2" align="center">
        <thead>
            <tr>
                <th>Order Item</th>
                <th>Payment Mode</th>
                <th>Total payment</th>
                <th>Payment status</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$details["item"]}}</td>
                <td>{{$details["paymode"]}}</td>
                <td>{{$details["total"]}}</td>
                <td>{{$details["status"]}}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
            <th>Order Item</th>
                <th>Payment Mode</th>
                <th>Total payment</th>
                <th>Payment status</th>
            </tr>
        </tfoot>
    </table>
    <br>

    <br>

</body>

</html>