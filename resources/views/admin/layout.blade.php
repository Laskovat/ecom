
@include('admin.head')

      <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
      <!-- partial -->

        <!-- partial:partials/_navbar.html -->

@include('admin.navbar')
        <!-- partial -->
@include('admin.body')
          <!-- content-wrapper ends -->
          @yield('body')
        </div>
          <!-- partial:partials/_footer.html -->
@include('admin.footer')