<?php
    //require_once 'TeacherSession.php';
    require_once '../lib/material.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Materials
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Materials
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<?php
    if(isset($_GET['id'])){
        if(Material::deleteMaterialById($_GET['id'])){
            echo '<div class="container greenMessage">
                <p>The Material has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
            </div>';
        }else{
            echo '<div class="container redMessage">
                <p>The Material is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
            </div>';
        }
    }
?>
<section>
    <div class="container">
        <!--  Content -->	
        <div style="height:50px"></div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
            <div class="semi-square" style="float:right ; margin-left: 50px">
                <button class="button button4" type="submit" name="search" value="search"><i class="fa fa-search"></i> Search</button>
            </div>
            <div class="styled-select slate semi-square left-right-container">
              <select name="level">
                    <?php
                        if(isset($_GET['level'])){
                            echo '<option selected="" value="'.$_GET['level'].'">'.$_GET['level'].'</option>';
                        }else{
                            echo '<option selected="" value="0">Search By Level</option>';
                        }
                    ?>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
              </select>
            </div>
            <div class="right-container">
                <div class="styled-select slate semi-square left-right-container" style="margin-left: 20px">
                <select  name="stage">
                    <?php
                        if(isset($_GET['stage'])){
                            echo '<option selected="" value="'.$_GET['stage'].'">'.$_GET['stage'].'</option>';
                        }else{
                            echo '<option selected="" value="0">Search By Stage</option>';
                        }
                    ?>
                    <option value="Preparatory">Preparatory</option>
                    <option value="Secondary">Secondary</option>
                    <option value="Academic">Academic</option>
                </select>
              </div>
                <div class="styled-select slate semi-square right-right-container">
                <select  name="type">
                    <?php
                        if(isset($_GET['stage'])){
                            echo '<option selected="" value="'.$_GET['type'].'">'.$_GET['type'].'</option>';
                        }else{
                            echo '<option value="0">Search By Type</option>';
                        }
                    ?>
                    <option value="Arabic">Arabic</option>
                    <option value="English">English</option>
                </select>
              </div>
            </div>
        </form>
        <div style="height:50px"></div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" width="50px">#</th>
                    <th scope="col" width="450px">Material Name</th>
                    <th scope="col" width="100px">Date</th>
                    <th scope="col" width="80px">Time</th>
                    <th scope="col" width="5px">DOWNLOAD</th>
                    <th scope="col" width="5px">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $count = 1;
                        if(isset($_GET['search'])){
                            $level = $_GET['level'];
                            $stage = $_GET['stage'];
                            $type = $_GET['type'];
                            $materials = Material::retreiveMaterialByFilter($level, $stage, $type);
                            if(is_array($materials) && count($materials)>0){
                                foreach ($materials as $material) {
                                    echo '<td>'.$count++.'</td>';
                                    echo '<td>'.$material['name'].'</td>';
                                    echo '<td>'.$material['date'].'</td>';
                                    echo '<td>'.$material['time'].'</td>';
                                    echo '<td><a href="download.php?filename='.$material['fileName'].'">DOWNLOAD</a></td>';
                                    echo '<td><a href="download.php?id='.$material['materialID'].'">DELETE</a></td>';
                                }
                            }else{
                                echo '<tr>
                                    <td colspan="6" style="text-align:center" scope="row"> There is no Materials Available !!!</td>
                                </tr>';
                            }
                        }else{
                            $materials = Material::retreiveAllMaterials();
                            if(is_array($materials) && count($materials)>0){
                                foreach ($materials as $material) {
                                    echo '<td>'.$count++.'</td>';
                                    echo '<td>'.$material['name'].'</td>';
                                    echo '<td>'.$material['date'].'</td>';
                                    echo '<td>'.$material['time'].'</td>';
                                    echo '<td><a href="download.php?filename='.$material['fileName'].'">DOWNLOAD</a></td>';
                                    echo '<td><a href="materials.php?id='.$material['materialID'].'">DELETE</a></td>';
                                }
                            }else{
                                echo '<tr>
                                    <td colspan="6" style="text-align:center" scope="row"> There is no Materials Available !!!</td>
                                </tr>';
                            }
                        }
                        
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<!--  Content -->
<?php
    require_once '../template/TeacherTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
