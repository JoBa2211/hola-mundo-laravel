<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Hola Mundo — Ejemplo</title>
  <style>
    /*
      Comentarios rápidos para aprender:
      - Cambiar color: modifica la propiedad `color` de h1 abajo. Ej: color: #ff0000;
      - Cambiar tamaño de fuente: usa `font-size` en h1. Ej: font-size: 48px; o 3rem
      - Cambiar fuente: modifica `font-family` en body o en h1. Ej: font-family: 'Arial', sans-serif;
      - Posicionar el texto: usa `text-align` (center, left, right) o `margin` para mover el bloque.

      Ejemplos prácticos están comentados junto a las reglas.
    */

    /* Reset simple y fuente por defecto */
    *{box-sizing:border-box}
    body{
      margin:0;
      /* Cambiar la fuente global aquí */
      font-family: Arial, system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
      background: #ffffff; /* color de fondo de la página */
      color: #111111; /* color por defecto del texto */
    }

    /* Contenedor centrado: modifica margin para subir/bajar */
    .wrap{
      max-width:900px;
      margin: 120px auto; /* 120px arriba/abajo, auto centra horizontalmente */
      padding: 16px;
      text-align: center; /* centrar el texto dentro del contenedor */
    }

    /* Estilo principal del saludo */
    h1{
      margin:0;
      /* Color: cambia aquí */
      color: #0066cc; /* ejemplo: azul */
      /* Tamaño: usa px, rem o em. Ejemplo: */
      font-size: 42px; /* cambiar a 32px, 48px, 3rem, etc. */
      /* Fuente: puedes redefinir sólo para este elemento */
      /* font-family: 'Georgia', serif; */
      /* Posición vertical: ajusta margin-top/margin-bottom */
      margin-bottom: 8px;
    }

    /* Subtítulo/ayuda (opcional) */
    p.lead{
      color: #6b7280; /* color gris suave */
      margin-top: 8px;
    }
  </style>
</head>
<body>
  <div class="wrap">
    <!-- Este archivo está simplificado para que practiques cambios en CSS directamente -->
    <h1>¡Hola Mundo :3 !</h1>
    <p class="lead">Modifica las reglas CSS arriba para cambiar color, tamaño, fuente y posición.</p>
  </div>
</body>
</html>
