<div class="container mt-3">
    <div class="row">
        <div class="col-8">

            <div class="row">
                <div class="col-lg-6">
                    <?php Flasher::flash() ?>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Mahasiswa
            </button><br><br>

            <!-- <h3>Daftar Mahasiswa</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['mhs'] as $mhs): ?>
                        <tr>
                            <td><?= $mhs['nama']; ?></td>
                            <td><?= $mhs['nim']; ?></td>
                            <td><?= $mhs['email']; ?></td>
                            <td><?= $mhs['jurusan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <br>
            <h3>LIST 1</h3> -->
            <ul class="list-group">
    <?php foreach ($data['mhs'] as $mhs): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?= htmlspecialchars($mhs['nama']); ?>
            <span>
                <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id']; ?>" 
                   class="badge text-bg-primary text-decoration-none ms-2">Detail</a>
                <a href="<?= BASEURL ?>/mahasiswa/update/<?= $mhs['id']; ?>" 
                   class="badge text-bg-success text-decoration-none ms-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">Edit</a>
                <a href="javascript:void(0);" 
                   class="badge text-bg-danger text-decoration-none ms-2 hapus-btn" 
                   data-id="<?= $mhs['id']; ?>">
                   Hapus
                </a>
            </span>
        </li>
    <?php endforeach; ?>
</ul>
        </div>
    </div>
</div>
<br>





<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalTitle">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim" placeholder="Input NIM">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="" disabled selected>Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Elektronika">Teknik Elektronika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.hapus-btn').forEach(button => {
        button.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= BASEURL ?>/mahasiswa/hapus/" + id;
                }
            });
        });
    });
</script>