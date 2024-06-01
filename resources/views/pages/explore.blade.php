<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background-color: #151515;
            overflow-x: hidden;
        }

        .wrapper {
            width: 100%;
            display: flex;
            gap: 100px;
        }

        .row {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 17px;
            margin-top: 2px;
        }

        .follow-head {
            flex: 1;
        }

        .follow {
            overflow: hidden;
            position: fixed;
            top: 100px;
        }

        .follow-body {
            display: flex;
            flex-direction: column;
            width: 400px;
            border-radius: 8px;
            margin-top: 20px;
            flex-grow: 1;
        }

        .content {
            display: flex;
            flex: 1;
            padding: 34px;
            gap: 150px
        }

        .main-content {
            flex: 2;
        }

        header {
            background-color: #151515;
            position: sticky;
            top: 0;
            z-index: 5;
            width: 100%;
            padding: 10px 0;
        }

        .sidebar {
            position: fixed;
            top: 25px;
            z-index: 5;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 150px;
        }

        /* .content {
            display: flex;
            justify-content: center;
            padding: 32px;
            gap: 550px;
        } */

        .follow-head {
            flex: 1;
        }

        .follow {
            overflow: hidden;
            position: fixed;
            top: 100px;
        }

        .follow-body {
            display: flex;
            flex-direction: column;
            width: 400px;
            border-radius: 8px;
            margin-top: 20px;
            flex-grow: 1;
        }
        
        .input-group {
            width: auto;
        }
    </style>
</head>

<body>

    <section>
        <div class="wrapper">

            {{-- sidebar --}}
            @include('layouts.sidebar')

            <div class="mt-5">
                {{-- search content --}}
                @include('layouts.searchcontent')
            </div>
            

        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
