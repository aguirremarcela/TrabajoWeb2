<!DOCTYPE html>
<html lang="es">

<head>
  <base href="{$base_url}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$title}</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/style404notFound.css">
</head>
<body>
  <div>
    <header class="bg-dark">
      <a href=""><img class="logo" src="./images/logo.png" alt="Logotipo"></a>
      {if !empty($user)}
      <!--Boton desplegable Logout-->
      <div class="row dropdown">
        <div class="col-sm-12 d-flex justify-content-end">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          {$user}
          </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="logout">Logout</a>
        </div>
        </div>
      </div>
      {/if}
    </header>
  </div>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav m-auto">
        <li><a class="navbar-brand" href="home">Home</a></li>
        <li><a class="navbar-brand" href="contacts">Contactos</a></li>
        <li><a class="navbar-brand" href="aboutUs">¿Quiénes somos?</a></li>
      </ul>
    </div>
  </nav>