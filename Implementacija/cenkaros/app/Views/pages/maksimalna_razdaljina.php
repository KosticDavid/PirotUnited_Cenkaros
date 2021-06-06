<!--David Kostic 2016/0624-->
<div id="content" class="razdaljina">
    <form class="container-fluid" action="<?php echo site_url('Kupac/biranje_radnje');?>" method="POST">
        <div class="row">
            <div class="col-2 col-md-2"></div>
            <p class="col-8 col-md-4">Maksimalna razdaljina u m:</p>
            <div class="d-block d-md-none col-2"></div>
            <div class="d-block d-md-none col-2"></div>
            <input class="col-8 col-md-4" type="number" name="max_razdaljina" step="1">
            <div class="col-2 col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-6">
                <button>Pronadji</button>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>