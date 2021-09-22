<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            height: fit-content;
            padding-bottom: 30px;
            width: 800px;
            background-color: #e6e6e6;
            margin: auto;
            border-radius: 20px;
        }

        .u-border {
            height: 15px;
            width: 100%;
            background-color: red;
            margin-bottom: 10px;
        }

        .title {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .intro,
        .greeting {
            margin-left: 25px;
            font-size: 20px;
            font-weight: bold;
            font-family: sans-serif;
            margin-top: 10px;
            margin-bottom: 10px;
            color: #666666;
        }

        .view-table {
            display: grid;
            justify-content: center;
            padding: 30px;
        }

        .view-table table,
        th,
        td {
            border-collapse: collapse;
            text-align: left;
            table-layout: fixed;
            padding: 8px 30px;
            width: 100%;
            font-size: 19px;
        }

        .view-table th {
            color: #61c232;
        }

        .view-table tr:hover td {
            font-size: 20px;
        }

        .view-table th,
        td {
            border-bottom: 2px solid #ddd;
        }

        .btn {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 30px;
        }

        .btn a {
            text-decoration: none;
            background-color: #f64347;
            color: #fff;
            font-size: 22px;
            padding: 18px 45px;
        }

        .closing-text {
            margin-left: 25px;
            font-size: 15px;
            font-weight: bold;
            font-family: sans-serif;
            margin-top: 10px;
            margin-bottom: 10px;
            color: #666666;
        }

        @media (max-width: 700px) {
            .container {
                width: 100vw !important;
            }

            .view-table td {
                display: block;
                border-bottom: none;
                width: 90%;
            }

            .view-table tr {
                border: 1px solid #4d4d4d;
                padding-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <div class="u-border"></div>
            <img src="https://static.thenounproject.com/png/1218008-200.png" alt="" width="100" height="100">
            <h1>Vehicle Lookup</h1>
            <hr>
        </div>

        <p class="intro">Hi User, <br> This is the vehicle detail that you have requested</p>
        <div class="view-table">
            <table>
                <tr>
                    <td>VIN number</td>
                    <td><b>{VIN_NUMBER}</b></td>
                </tr>
                <tr>
                    <td>Manufacturing Company</td>
                    <td><b>{MAN_COMPANY}</td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><b>{MODEL}</td>
                </tr>
                <tr>
                    <td>Year Of Manufacturing</td>
                    <td><b>{YEAR_OF_MAN}</b></td>
                </tr>
                <tr>
                    <td>Fuel Type</td>
                    <td><b>{FUEL}</td>
                </tr>
                <tr>
                    <td>Milage</td>
                    <td><b>{MILAGE} km/l</b></td>
                </tr>
                <tr>
                    <td>Engine Displacement (CI)</td>
                    <td><b>{ENGINE_DIS}</td>
                </tr>
                <tr>
                    <td>Number Of Clyinder</td>
                    <td><b>{NO_OF_CLY}</td>
                </tr>

            </table>
        </div>
        <div class="btn">
            <a href="http://localhost/Vechile_details/index.html">Check More VIN !</a>
        </div>
        <div class="greeting">
            <h3>Thank You for visiting our website,</h3>
            <h3>Arjun Murthy</h3>
        </div>
        <hr>
        <p class="closing-text">You have recived this email from <a href="http://localhost/Vechile_details/index.html">Vehicle Lookup</a> on your requested.</p>
    </div>

</body>

</html>