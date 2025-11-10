<<<<<<< HEAD:resources/views/admin/categories/index.blade.php
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Form Sewa</title>
<style>
body{font-family:Arial,Helvetica,sans-serif;padding:20px}
form{max-width:480px;margin-bottom:30px}
input,textarea{width:100%;padding:8px;margin:6px 0}
table{border-collapse:collapse;width:100%}
table th,table td{border:1px solid #ccc;padding:8px;text-align:left}
</style>
</head>
<body>
<h1>Form Sewa</h1>


<?php if(!empty($_SESSION['success'])): ?>
<div style="color:green"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>
<?php if(!empty($_SESSION['error'])): ?>
<div style="color:red"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>


<form method="post" action="?route=sewa&action=store">
<label>Nama Penyewa</label>
<input type="text" name="nama_penyewa" required>


<label>Item</label>
<input type="text" name="item" required>


<label>Tanggal Mulai</label>
<input type="date" name="tanggal_mulai">


<label>Tanggal Selesai</label>
<input type="date" name="tanggal_selesai">


<label>Harga</label>
<input type="number" name="harga" step="0.01">


<button type="submit">Sewa</button>
</form>

=======
@extends('layouts.app')
@section('title', 'Summit Wir')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cara Sewa</h1>
        </div>
>>>>>>> 377b19ff59fffa58cfe8cd6bc442497c75dd8f49:resources/views/customer/how_to_order.blade.php

