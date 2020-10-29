<div class="card">
    <h5 class="card-header">Danh sách khách hàng</h5>
    <div class="card-body">

        <ul class="list-group mt-3">
            <?php foreach ($cus as $row) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/admin/leds/homecateid/<?php echo $row['id']; ?>" class="btn btn-xs">
                        <?php echo $row['name'];?>
                    </a>
                    <span class="badge badge-primary badge-pill">14</span>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>