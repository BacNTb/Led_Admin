<div class="card">
    <h5 class="card-header">Danh sách khách hàng</h5>
    <div class="card-body">
        <table class="table table-hover table-product table-product text-center">
            <thead>
                <tr class="thead-light">
                    <th>ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($cus as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['tell']; ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>