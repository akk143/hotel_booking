<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    {{-- start header --}}
        @include('admin.header')
    {{-- end header --}}

        @include('admin.sidebar')
        
    <!-- Sidebar Navigation end-->

        @include('admin.body')

    {{-- footer section --}}
        @include('admin.footer')

  </body>
</html>