<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Wallet</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Dompet
            </button>
            <!-- Modal -->
            <form action="<?= BASEURL ?>/wallet/add" method="post">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dompet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="wallet_name" class="form-label">Nama Dompet</label>
                                <input class="form-control" type="text" name="wallet_name" id="wallet_name" aria-describedby="walletName">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </div>
                </div>
            </form>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nama Dompet</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data['response'] as $dompet): ?>
                <tr>
                  <td><?= $dompet['name'] ?></td>
                  <td>
                    <a href="<?= BASEURL ?>/wallet/delete/<?= $dompet['id'] ?>" class="btn btn-outline-danger delete">Delete</button>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
        </div>
    </div>
</div>