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

{{-- Notif kalau login error, muncul di login page --}}
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

{{-- Notif kalau sign up berhasil, muncul di login page --}}
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

{{-- Notif kalau sign up gagal, muncul di sign up --}}
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

{{-- Notif kalau review mbkm/sc berhasil dibuat/diperbarui, muncul di masing-masing page --}}
@if(session()->has('successRev'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top',
            
                title: "{{ session('successRev') }}",
                showConfirmButton: false,
                timer: 1500
                });
        });
    </script>
@endif

{{-- Notif kalau review mbkm/sc mau dihapus, muncul di masing-masing page --}}
@if(session()->has('deleteRev'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top',
            
                title: "{{ session('deleteRev') }}",
                showConfirmButton: false,
                timer: 1500
                });
        });
    </script>
@endif

{{-- Notif kalau berhasil update profile --}}
@if(session()->has('updateApp'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top',
            
                title: "{{ session('updateApp') }}",
                showConfirmButton: false,
                timer: 1500
                });
        });
    </script>
@endif

{{-- Notif kalau data berhasil ditambah/diperbarui --}}
@if(session()->has('createData'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top',
            
                title: "{{ session('createData') }}",
                showConfirmButton: false,
                timer: 1500
                });
        });
    </script>
@endif

{{-- Notif kalau data mau dihapus --}}
@if(session()->has('delData'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top',
            
                title: "{{ session('delData') }}",
                showConfirmButton: false,
                timer: 1500
                });
        });
    </script>
@endif