<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> POIs
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <table class="table table-hover" style="background: white;">
                    <tr>
                      <th>POI ID</th>
                      <th>Lang</th>
                      <th>Long</th>
                      <th>Radius</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    
                    <?php
                    $i = 1;
                      foreach ($pois as $poi) {
                        ?>
                        <tr>
                          <td><?=$i?></td>
                          <td><?=$poi->poi_lang?></td>
                          <td><?=$poi->poi_long?></td>
                          <td><?=$poi->poi_radius?></td>
                          <td class="text-center">
                            <a href="<?=base_url()?>poi/edit/<?=$poi->poi_id?>" class="btn btn-success">Edit</a>
                            <a href="<?=base_url()?>poi/delete/<?=$poi->poi_id?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                      }
                    ?>
                  </table>
        </div>
    </section>
</div>