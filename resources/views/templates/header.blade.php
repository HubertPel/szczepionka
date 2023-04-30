<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <title>Szczepionka</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
  
    <script
src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
crossorigin="anonymous"></script>
</head>
<body class="layout-navbar-fixed" style="height: auto;">
    <div class="wrapper">
    @include('templates.navbar')
    <div class="content-wrapper" style="min-height: 75vh; margin-left: 0; padding-bottom: 100px;">
