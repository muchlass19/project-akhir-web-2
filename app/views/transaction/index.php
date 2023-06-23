<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Transaksi</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Transaksi
            </button>

            <!-- Modal -->
            <form action="<?= BASEURL ?>/transaction/add" method="post">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Jumlah Transaksi</label>
                                    <input type="number" class="form-control" id="amount" name="amount">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe Transaksi</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="income">Pemasukan</option>
                                        <option value="expense">Pengeluaran</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_wallets" class="form-label">Dompet</label>
                                    <select class="form-control" name="id_wallets" id="id_wallets">
                                        <?php foreach($data['wallets'] as $dompet): ?>
                                        <option value="<?= $dompet['id'] ?>"><?= $dompet['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Jumlah Transaksi</th>
                  <th scope="col">Tipe</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data['transactions'] as $transaction): ?>
                <tr>
                  <td><?= $transaction['description'] ?></td>
                  <td><?= $transaction['amount'] ?></td>
                  <td>
                    <?php 
                    if($transaction['type'] == 'expense') {
                        $type = 'Pengeluaran';
                        echo '<span class="badge bg-danger">'.$type.'</span>';
                    } else {
                        $type = 'Pemasukan';
                        echo '<span class="badge bg-success">'.$type.'</span>';
                    }
                    ?>
                  </td>
                  <td>
                    <a href="<?= BASEURL ?>/transaction/detail/<?= $transaction['id'] ?>" class="btn btn-outline-primary me-2">Detail</button>
                    <a href="<?= BASEURL ?>/transaction/delete/<?= $transaction['id'] ?>" class="btn btn-outline-danger">Delete</button>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
        </div>
    </div>
</div>