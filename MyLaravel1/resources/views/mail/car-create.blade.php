<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Car</title>
    <style>
        body{
            background-color: lightblue;
            color: #fff;
        }

        table{
            text-align: center;
            border: 1px solid #000;
            
        }

        table th{
            color: green;
            text-transform: uppercase;
        }

        th, td{
            border: 1px solid #000;
        }

    </style>
</head>
<body>
    <div id="container-mail">
        <h1>
            La nuova car creata è:
        </h1>
        <table>
            <tr>
                <th>
                    id
                </th>
                <th>
                    model
                </th>
                <th>
                    kw
                </th>
                <th>
                    brand
                </th>
            </tr>
            <tr>
                <td>
                    {{$carId}}
                </td>
                <td>
                    {{$carModel}}
                </td>
                <td>
                    {{$carKw}}
                </td>
                <td>
                    {{$carBrand}}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>