
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        function confirmDelete(){
            Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
            });
        }
</script>

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
                title: "{{ session('loginError') }}"
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
                icon: 'success',
                title: "{{ session('signSuccess') }}"
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
                title: "{{ session('signError') }}"
                });
        });
    </script>
@endif

{{-- Notif kalau review mbkm/sc berhasil dibuat/diperbarui, muncul di masing-masing page --}}
@if(session()->has('successRev'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire(
            'Tersimpan!',
            "{{ session('successRev') }}",
            'success'
            )
        });
    </script>
@endif

{{-- Notif kalau berhasil update profile --}}
@if(session()->has('updateAcc'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire(
            'Tersimpan!',
            "{{ session('updateAcc') }}",
            'success'
            )
        });
    </script>
@endif

{{-- Notif kalau data berhasil ditambah/diperbarui --}}
@if(session()->has('createData'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire(
            'Tersimpan!',
            "{{ session('createData') }}",
            'success'
            )
        });
    </script>
@endif

{{-- Notif kalau data mau dihapus --}}
@if(session()->has('delData'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(
                'Terhapus!',
                "{{ session('delData') }}",
                'success'
                )
        });
    </script>
@endif


