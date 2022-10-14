<?php $no = 1;
foreach ($cart as $produk) :
    $discount = ($produk['options']['discount'] / 100)  * $produk['subtotal']; ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $produk['name']; ?></td>
        <td><?= $produk['qty']; ?></td>
        <td><?= number_to_currency($produk['price'], 'IDR', 'id_ID', 2); ?></td>
        <td><?= $produk['options']['discount']; ?></td>
        <td><?= number_to_currency(($produk['subtotal'] - $discount), 'IDR', 'id_ID', 2); ?></td>
        <td>
            <button type="button" class="btn btn-warning edit-cart" data-toggle="modal" data-target="#modal-stok" id="<?= $produk['rowid'] ?>" qty="<?= $produk['qty'] ?>">Ubah</button>
            <button class="btn btn-danger hapus-cart" id="<?= $produk['rowid'] ?>">Hapus</button>
        </td>
    </tr>
<?php endforeach ?>