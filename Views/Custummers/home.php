<div class="card">
    <h5 class="card-header">Danh sách khách hàng</h5>
    <div class="card-body">

        <ul class="list-group mt-3">

            <?php $total_priceAll = 0;?>
            
            <?php foreach ($cus as $rowCus) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/shop/admin/custummers/home/" class="btn btn-xs">
                        <?php echo $rowCus['name'];?>
                        </a>
                        <span class="badge badge-primary badge-pill">
                        <?php foreach ($check as $rowCheck) { ?>                  
                            <?php if($rowCus['id'] == $rowCheck['cus_id']) { ?>
                      
                                <?php $total_priceAll += $rowCheck['total_price'];?>                
                                <?php echo number_format($total_priceAll, 0, ',', '.'); ?><sup>đ</sup>
                            <?php } ?>
                            

                            <?php $total_priceAll = 0;?>
                        <?php } ?>
                        </span>
                    </li>     
            <?php } ?>
        </ul>
    </div>
</div>