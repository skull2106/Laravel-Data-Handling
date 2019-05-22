<!doctype html>
<html>
  <head>
    <title>Mytheenga Project</title>
  </head>
  <body>
     @if(Session::has('message'))
        <p >{{ Session::get('message') }}</p>
     @endif
     <!-- Form -->
     <form method='post' action='/myprojecy/public/uploadFile' enctype='multipart/form-data' >
       {{ csrf_field() }}
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Import'>
     </form>
<a href="find">Some Text1</a>
  </body>
</html>