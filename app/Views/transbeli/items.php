<?php
$no = 1;
foreach ($data as $items) :
    $discount = ($items['options']['discount'] / 100)  * $items['subtotal'];
?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $items['name'] ?></td>
        <td style="width: 10%;"><input type="number" min="1" class="form-control" value="<?= $items['qty'] ?>" rowid="<?= $items['rowid'] ?>" id="jumqty"></td>
        <td><?= number_to_currency($items['price'], 'IDR', 'id_ID', 2) ?></td>
        <td><?= number_to_currency($discount, 'IDR', 'id_ID', 2) ?> (<?= $items['options']['discount']; ?>%)</td>
        <td><?= number_to_currency(($items['subtotal'] - $discount), 'IDR', 'id_ID', 2) ?></td>
        <td>
            <button class="btn btn-danger hapus-cart" id="<?= $items['rowid'] ?>"><i class="fas fa-trash"></i></button>
        </td>
    </tr>

<?php endforeach; ?>