<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Edit POI
        
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit POI</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="editpoi-form" action="<?php echo base_url() ?>poi/editpoi-post/<?=$poi->poi_id?>" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Long</label>
                                        <input type="text" class="form-control required"  name="long" maxlength="128" required="" value="<?=$poi->poi_long?>">
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Lang</label>
                                        <input type="text" class="form-control required "  name="lang" maxlength="128" required="" value="<?=$poi->poi_lang?>">
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Radius(m)</label>
                                        <input type="number" class="form-control required"  name="radius" maxlength="128" value="<?=$poi->poi_radius?>">
                                    </div>
                                </div>
                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Lang</label>
                                        <input type="text" class="form-control required "  name="lang" maxlength="128" required="" value="<?=$poi->poi_lang?>">
                                    </div>
                                </div> -->
                            </div>
                           

                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
        </div>
    </section>
</div>