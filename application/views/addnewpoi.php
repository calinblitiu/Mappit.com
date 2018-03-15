<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Add New POI
        
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="box box-primary">
                    <div class="box-header">
                        <!-- <h3 class="box-title">Add new POI</h3> -->
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addnewpoi-form" action="<?php echo base_url() ?>addnewpoi-post" method="post" role="form" enctype='multipart/form-data'>
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control required"  name="name" maxlength="128" required="">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control required "  name="address" maxlength="128" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Long</label>
                                        <input type="text" class="form-control required"  name="long" maxlength="128" required="">
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Lat</label>
                                        <input type="text" class="form-control required email"  name="lat" maxlength="128" required="">
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Radius(m)</label>
                                        <input type="number" class="form-control required email"  name="radius" maxlength="128" value="10">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">MP3</label>
                                        <input type="file" class="form-control" name="mp3" required="" accept="audio/mp3">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                       <textarea name="description" class="form-control" required="" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                           

                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Add" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
        </div>
    </section>
</div>