<form action="user/savePageList" method="post">
<div class="col-md-12">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Select Page:</h6>
        </div>
        <div class="container-fluid">
            <div class="row" id="partialview-user-page">
                <div class="col-lg-12">
                    <div class="form-group">
                        <select class="select" name="pages[]" id="fbpage-list">
                            <?php foreach ($pages['data'] as $page) { ?>
                                <option value="<?php echo $page['id'].'->'.$page['name'] ?>">
                                    <?php echo $page['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Compititors Page List:</h6>
        </div>
        <div class="container-fluid">
            <div class="row" id="partialview-user-page">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="compititors[]">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="compititors[]">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="compititors[]">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="compititors[]">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="compititors[]">
                    </div>
                    <div class="form-group">
                        <button class="btn bg-teal-400">Save List</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
    $('#fbpage-list').select2();
</script>              