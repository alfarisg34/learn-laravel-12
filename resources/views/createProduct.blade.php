<!DOCTYPE html>
<html lang="en">

@include('admin.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.header')
                <!-- End of Topbar -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Create Product</h6>
                            <a href="/admin/product" class="btn btn-outline-primary btn-sm">← Back</a>
                        </div>

                        <div class="card-body">
                            <form action="/admin/product/create" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate>
                                @csrf
                                {{-- Title --}}
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                                        class="form-control @error('title') is-invalid @enderror" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select id="category_id" name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="">-- Select Category --</option>
                                        <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Makanan &
                                            Minuman</option>
                                        <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Barang
                                        </option>
                                        <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Jasa
                                        </option>
                                        <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>Lainnya
                                        </option>
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Provinsi --}}
                                <div class="mb-3">
                                    <label for="province" class="form-label">Provinsi</label>
                                    <select id="province" name="province"
                                        class="form-control @error('province') is-invalid @enderror" required>
                                        <option value="">-- Pilih Provinsi --</option>
                                    </select>
                                    @error('province')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Kabupaten/Kota --}}
                                <div class="mb-3">
                                    <label for="regency" class="form-label">Kabupaten/Kota</label>
                                    <select id="regency" name="regency"
                                        class="form-control @error('regency') is-invalid @enderror" required disabled>
                                        <option value="">-- Pilih Kabupaten/Kota --</option>
                                    </select>
                                    @error('regency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Kecamatan --}}
                                <div class="mb-3">
                                    <label for="district" class="form-label">Kecamatan</label>
                                    <select id="district" name="district"
                                        class="form-control @error('district') is-invalid @enderror" required disabled>
                                        <option value="">-- Pilih Kecamatan --</option>
                                    </select>
                                    @error('district')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Kelurahan --}}
                                <div class="mb-3">
                                    <label for="village" class="form-label">Kelurahan</label>
                                    <select id="village" name="village"
                                        class="form-control @error('village') is-invalid @enderror" required disabled>
                                        <option value="">-- Pilih Kelurahan --</option>
                                    </select>
                                    @error('village')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Picture --}}
                                <div class="mb-3">
                                    <label for="picture" class="form-label">Picture</label>
                                    <!-- Image Preview Area -->
                                    <div class="mb-3">
                                        <img id="preview-image" src="#" alt="Preview"
                                            style="display: none; max-height: 200px;" class="mb-2 rounded">
                                    </div>
                                    <input type="file" id="picture" name="picture" accept="image/*"
                                        class="form-control @error('picture') is-invalid @enderror" required>
                                    @error('picture')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Valid until --}}
                                <div class="mb-3">
                                    <label for="deactivate_at" class="form-label">Valid For (Month)</label>
                                    <input type="number" id="deactivate_at" name="deactivate_at"
                                        value="{{ old('deactivate_at') }}"
                                        class="form-control @error('deactivate_at') is-invalid @enderror" min="1"
                                        max="24" step="1" required>
                                    @error('deactivate_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Description</label>
                                    <textarea id="desc" name="desc" rows="5" class="form-control @error('desc') is-invalid @enderror"
                                        oninput="autoResize(this)" required>{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <!-- JavaScript for Preview -->
    <script>
        document.getElementById('picture').addEventListener('change', function(event) {
            const input = event.target;
            const preview = document.getElementById('preview-image');
            const file = input.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>

    <script>
        function autoResize(textarea) {
            // Reset height to original to recalculate
            textarea.style.height = 'auto';
            // Set height based on scrollHeight
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        // Trigger on page load if there's already text (like old('desc'))
        window.addEventListener('DOMContentLoaded', function() {
            const desc = document.getElementById('desc');
            autoResize(desc);
        });
    </script>
    <script>
        async function fetchAndPopulate(url, targetSelect, placeholder = '-- Pilih --') {
            const select = document.getElementById(targetSelect);
            select.innerHTML = `<option value="">${placeholder}</option>`;
            select.disabled = true;

            try {
                const res = await fetch(url);
                const data = await res.json();

                data.data.forEach(item => {
                    const option = document.createElement("option");
                    option.value = item.code;
                    option.text = item.name;
                    select.appendChild(option);
                });

                select.disabled = false;
            } catch (err) {
                console.error('Gagal fetch:', err);
                select.innerHTML = `<option value="">Gagal memuat data</option>`;
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchAndPopulate('/api/provinces', 'province', '-- Pilih Provinsi --');

            document.getElementById('province').addEventListener('change', function() {
                const code = this.value;
                fetchAndPopulate(`/api/regencies/${code}`, 'regency', '-- Pilih Kabupaten/Kota --');

                document.getElementById('district').innerHTML =
                    '<option value="">-- Pilih Kecamatan --</option>';
                document.getElementById('district').disabled = true;
                document.getElementById('village').innerHTML =
                    '<option value="">-- Pilih Kelurahan --</option>';
                document.getElementById('village').disabled = true;
            });

            document.getElementById('regency').addEventListener('change', function() {
                const code = this.value;
                fetchAndPopulate(`/api/districts/${code}`, 'district', '-- Pilih Kecamatan --');

                document.getElementById('village').innerHTML =
                    '<option value="">-- Pilih Kelurahan --</option>';
                document.getElementById('village').disabled = true;
            });

            document.getElementById('district').addEventListener('change', function() {
                const code = this.value;
                fetchAndPopulate(`/api/villages/${code}`, 'village', '-- Pilih Kelurahan --');
            });
        });
    </script>

</body>

</html>
