<!DOCTYPE html>
<html>
<head>
 <style>
    body {
        background: lightblue;
        font-family: 'Courier New', Courier, monospace;
        color: navy;
    }
 </style>
</head>
<body>
  <div>
   <h2>Welcome Email<small> {{ $date }}</small></h2>
   <p>Hi {{ $name }},</p>
   <p>{{ $msg }}</p>
   <p>Find attacted you welcome letter</p>
  </div>
</body>
</html>