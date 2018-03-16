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
                    
                    <form role="form" id="editpoi-form" action="<?php echo base_url() ?>poi/editpoi-post/<?=$poi->poi_id?>" method="post" role="form"  enctype='multipart/form-data'>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control required"  name="name" maxlength="128" required="" value="<?=$poi->poi_name?>">
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="">Name fr</label>
                                        <input type="text" class="form-control required"  name="name_fr" maxlength="128" required="" value="<?=$poi->poi_name_fr?>">
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="">Name nl</label>
                                        <input type="text" class="form-control required"  name="name_nl" maxlength="128" required="" value="<?=$poi->poi_name_nl?>">
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="">Name uk</label>
                                        <input type="text" class="form-control required"  name="name_uk" maxlength="128" required="" value="<?=$poi->poi_name_uk?>">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control required "  name="address" maxlength="128" required="" value="<?=$poi->poi_address?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Address fr</label>
                                        <input type="text" class="form-control required "  name="address_fr" maxlength="128" required="" value="<?=$poi->poi_address_fr?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Address nl</label>
                                        <input type="text" class="form-control required "  name="address_nl" maxlength="128" required="" value="<?=$poi->poi_address_nl?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Address uk</label>
                                        <input type="text" class="form-control required "  name="address_uk" maxlength="128" required="" value="<?=$poi->poi_address_uk?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Long</label>
                                        <input type="text" class="form-control required"  name="long" maxlength="128" required="" value="<?=$poi->poi_long?>">
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Lat</label>
                                        <input type="text" class="form-control required "  name="lat" maxlength="128" required="" value="<?=$poi->poi_lat?>">
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Radius(m)</label>
                                        <input type="number" class="form-control required"  name="radius" maxlength="128" value="<?=$poi->poi_radius?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">MP3</label>
                                        <input type="file" class="form-control" name="mp3" accept="audio/mp3">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">MP3 fr</label>
                                        <input type="file" class="form-control" name="mp3_fr" accept="audio/mp3">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">MP3 nl</label>
                                        <input type="file" class="form-control" name="mp3_nl" accept="audio/mp3">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">MP3 uk</label>
                                        <input type="file" class="form-control" name="mp3_uk" accept="audio/mp3">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                       <textarea name="description" class="form-control" required="" rows="5"><?=$poi->poi_description?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Description fr</label>
                                       <textarea name="description_fr" class="form-control" required="" rows="5"><?=$poi->poi_description_fr?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Description nl</label>
                                       <textarea name="description_nl" class="form-control" required="" rows="5"><?=$poi->poi_description_nl?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Description uk</label>
                                       <textarea name="description_uk" class="form-control" required="" rows="5"><?=$poi->poi_description_uk?></textarea>
                                    </div>
                                </div>
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