<style>
    .swal2-popup {
          width: 400px; 
          height: 50px; 
          font-size: 8px;
          font-family: Arial, sans-serif;
          color: #0E7658;
          text-align: center;
          border: 1px solid #1CAF66;
          background-color: #D1E7DD;
          
        }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if(session()->has('loginError'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top',

                title: "{{ session('loginError') }}",
                showConfirmButton: false,
                timer: 1500
                });
        });
    </script>
@endif

@if(session()->has('signSuccess'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top',
            
                title: "{{ session('signSuccess') }}",
                showConfirmButton: false,
                timer: 1500
                });
        });
    </script>
@endif

@if(session()->has('signError'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top',
            
                title: "{{ session('signError') }}",
                showConfirmButton: false,
                timer: 1500
                });
        });
    </script>
@endif