

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Notif kalau login error, muncul di login page --}}
@if(session()->has('loginError'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'error',
                title: 'Login gagal'
                });
        });
    </script>
@endif

{{-- Notif kalau sign up berhasil, muncul di login page --}}
@if(session()->has('signSuccess'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'succes',
                title: 'Sign up berhasil'
                });
        });
    </script>
@endif

{{-- Notif kalau sign up gagal, muncul di sign up --}}
@if(session()->has('signError'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'error',
                title: 'Signup gagal'
                });
        });
    </script>
@endif

{{-- Notif kalau review mbkm/sc berhasil dibuat/diperbarui, muncul di masing-masing page --}}
@if(session()->has('successRev'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'succes',
                title: 'Berhasil diperbarui'
                });
        });
    </script>
@endif

{{-- Notif kalau review mbkm/sc mau dihapus, muncul di masing-masing page --}}
@if(session()->has('deleteRev'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
            title: 'Are you sure?',
            
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            });
        });
    </script>
@endif

{{-- Notif kalau berhasil update profile --}}
@if(session()->has('updateApp'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'succes',
                title: 'Profile berhasil dipudate'
                });
        });
    </script>
@endif

{{-- Notif kalau data berhasil ditambah/diperbarui --}}
@if(session()->has('createData'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'succes',
                title: 'Data berhasil ditambah/perbarui'
                });
    </script>
@endif

{{-- Notif kalau data mau dihapus --}}
@if(session()->has('delData'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
            title: 'Are you sure?',
            
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            });
        });
    </script>
@endif
