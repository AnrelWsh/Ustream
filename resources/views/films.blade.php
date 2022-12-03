<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ustream</title>
    <link rel="stylesheet" href="/app.css">
    @vite('public/app.css')
</head>
<body>

<header class="flex flex-col items-center px-4 py-[10vh] bg-white shadow-2xl">
    <div class="flex items-center justify-around">
        <img class="w-[20%]" src="/img/logo.png" alt="Logo">
        <div class="flex flex-row justify-end">
            <img class="w-[4%] m-2" src="/img/profil.png" alt="Profil">
            <img class="w-[4%] m-2" src="/img/home.png" alt="Home">
        </div>
    </div>
    <input class="mt-[10vh] p-6 h-[10vh] w-[50vw] rounded-full border-2 border-black shadow-xl italic font-semibold" type="text" placeholder="Search movie...">
</header>


<h2 class="text-2xl font-bold mx-[4%] mt-[3%]">Top films</h2>
<div class="grid grid-cols-4 justify-items-center">
    @foreach($films_data->results as $film)
        <div class="filmCard m-4 text-lg shadow-2xl flex flex-col w-[58%]">
            <h3 class="filmTitle font-bold">{{ $film->title }}</h3>
            <img src="https://image.tmdb.org/t/p/w220_and_h330_face/{{$film->poster_path }}" alt="Film Poster">
        </div>
    @endforeach
</div>


<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = preg_replace('/0/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/1/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/2/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/3/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/4/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/5/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/6/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/7/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/8/', '', $actual_link ); // remove numbers
$actual_link = preg_replace('/9/', '', $actual_link ); // remove numbers

if($page != 1){
    ?><a href="<?php $actual_link ?>{{$page-1}}">Previous<?php
    }

if($films_data->total_pages >500){
    $max_page = 500;
}
else{
    $max_page = $films_data->total_pages;
}


    if($page != $max_page){
    ?><a href="<?php $actual_link ?>{{$page+1}}">next</a><?php
    }?>





</body>
</html>
