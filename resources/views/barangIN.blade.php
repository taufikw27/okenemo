@include('partials.header')
@include('partials.bar')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
  <main id="main" class="main">
    <!-- Button trigger modal -->


    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title">Datatables</h5>
             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Create
                </button>
                <thead>
                  <tr>
                    <th>
                      Date In
                    </th>
                    <th>Qty</th>
                    <th>Barang</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Update At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
              
                  @if (count($bi) === 0)
                  @include('modals.barangIN')
                  @endif
                  
                  @foreach ($bi as $item)
                  @include('modals.barangIN')
                  <tr>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->barang->nama }}</td>
                    <td>{{ $item->updated_at }} {{ $item->id }}</td>
                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                      Edit
                    </button> <form method="POST"   action="{{ route('barang.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                  </tr> 
                  @endforeach
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->
@include('partials.footer')