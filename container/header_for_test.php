<!-- <?php
  include "container/lib01.php";
?> -->
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>svg</title>
    <style >
    .btn{position:relative; display:block; width:100px; height: 100px; line-height: 100px; text-align: center; background: #ccc;}

    .btn svg{position: absolute; top:0; left:0;}

    .rect{
    stroke-dasharray: 1000;
    stroke-dashoffset: 1000;

    }
    .btn:hover .rect{
    animation: dash 5s linear     alternate infinite;}

    @keyframes dash {
    from {
      stroke-dashoffset: 1000;
    }
    to {
      stroke-dashoffset: 0;
    }
    }




    </style>




  </head>
  <body>
    <div class="btn">

  hover

  <svg width="100" height="100" xmlns="http://w3.org/2000/svg" version="1.1" viewbox="0 0 120 120">
     <polyline class="rect" points="60 110 10 110 10 10 60 10" fill="transparent" stroke="red" stroke-width="3" />

    <polyline class="rect" points="60 110 110 110 110 10 60 10" fill="transparent" stroke="red" stroke-width="3" />
  </svg>

    </div>

  </body>
</html>
