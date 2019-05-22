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
     <form method='get' action='/myprojecy/public/finddata' enctype='multipart/form-data' >
       {{ csrf_field() }}
       <input type='text' name='id' >
       <input type='submit' name='submit' value='Search'>
     </form>

	  <a href="index"> Importing data </a>
  </body>
</html>