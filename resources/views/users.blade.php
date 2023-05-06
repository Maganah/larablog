<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data and Views!!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background-color:light grey">

    <div>
        <section>
            <h1>Passing Data to the View in Laravel</h1>
        </section>
        <article>
           

            {{ $errors }}
            <table style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                         <tr>
                            <td class="{{$loop->index < 4? 'green' : 'red'}}" style="border: 1px solid black;">{{$loop->index}}</td>
                            <td style="border: 1px solid black;">{{$user->name}}</td>
                            <td style="border: 1px solid black;">{{$user->email}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>