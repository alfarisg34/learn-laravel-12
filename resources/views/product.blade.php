<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('images/logoUmkm.png') }}" rel="icon">

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>


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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                            <a href="{{ route('createProduct') }}" class="btn btn-outline-primary btn-sm">Add New</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th style="width: 20px">Status</th>
                                            {{-- <th style="width: 50px">Last Edited By</th> --}}
                                            <th style="width: 20px">Category</th>
                                            {{-- <th style="width: 20px">Location</th> --}}
                                            <th style="width: 20px">Updated Date</th>
                                            <th style="width: 20px">Created Date</th>
                                            {{-- <th style="width: 20px">Valid Until</th> --}}
                                            <th style="width: 30px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            {{-- <th>Last Edited By</th> --}}
                                            <th>Category</th>
                                            {{-- <th>Location</th> --}}
                                            <th>Updated Date</th>
                                            <th>Created Date</th>
                                            {{-- <th>Valid Until</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                                                    title="{{ $product->title }}">
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        style="color: blue; text-decoration: underline;" target="_blank"
                                                        rel="noopener noreferrer">
                                                        {{ Str::limit($product->title, 80) }}
                                                    </a>
                                                </td>

                                                @php
                                                    $shortHtml = Str::limit(strip_tags($product->desc), 120); // no HTML inside cell
                                                @endphp
                                                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                                                    title="{{ strip_tags($product->desc) }}">
                                                    {{ $shortHtml }}
                                                </td>
                                                <td>
                                                    @if ($product->status)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Not Active</span>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $product->editor?->name ?? '—' }}</td> --}}
                                                <td>{{ $product->category?->name ?? '—' }}</td>
                                                {{-- <td>{{ $product->village_name  ?? '—' }}</td> --}}
                                                <td>{{ $product->updated_at->tz('Asia/Jakarta')->format('d/m/y H:i') }}
                                                </td>
                                                <td>{{ $product->created_at->tz('Asia/Jakarta')->format('d/m/y H:i') }}
                                                </td>
                                                {{-- <td>{{ $product->deactivate_at->tz('Asia/Jakarta')->format('d/m/y H:i') }}
                                                </td> --}}
                                                <td class="text-nowrap">
                                                    <a href="{{ route('product.edit', $product) }}"
                                                        class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('admin.product.destroy', $product) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Delete this product permanently?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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


</body>

</html>
