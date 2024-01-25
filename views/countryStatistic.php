<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="#">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <title>WORLD STATS</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                Lorem
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Statistic</a></li>
            <li><a href="#" class="nav-link px-2">Lorem</a></li>
            <li><a href="#" class="nav-link px-2">Ipsum</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
        </div>
    </header>
    <main id="app">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th v-for="(title, index) in titles"
                            @click="changeSorting(index)"
                            style="cursor: pointer"
                        >
                            {{ title }}
                            <i v-if="index === indexOfColumnBySort"
                               class="bi ms-3"
                               :class="{
                                    'bi-sort-down': !isAscSort,
                                    'bi-sort-down-alt': isAscSort,
                                }"
                            ></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in sortedStatistic">
                        <td v-for="value in item">{{ value }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>


</body>
<script src="public/js/main.js"></script>
</html>