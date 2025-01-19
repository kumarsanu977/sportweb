<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->canAccess("player/add");
    $can_edit = $user->canAccess("player/edit");
    $can_view = $user->canAccess("player/view");
    $can_delete = $user->canAccess("player/delete");
    $pageTitle = "Player Details"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="view" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col comp-grid " >
                    <div  class=" page-content" >
                        <?php
                            if($data){
                            $rec_id = ($data['playerid'] ? urlencode($data['playerid']) : null);
                            //check if user is the owner of the record.
                            $is_record_owner = ($data['uid'] == $user->uid);
                            //allow user with certain roles to manage record
                            $can_edit_record = $is_record_owner || $user->hasRole(['admin']);
                            $can_delete_record = $is_record_owner || $user->hasRole(['admin']);
                        ?>
                        <div id="page-main-content" class=" px-3 mb-3">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                            <div class="page-data">
                                <!--PageComponentStart-->
                                <div class="mb-3 row row justify-content-start g-0">
                                    <div class="col-12">
                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Playerid</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['playerid'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Sportsid</small>
                                                    <div class="fw-bold">
                                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("sports/view/$data[sportsid]?subpage=1") ?>">
                                                        <i class="material-icons">visibility</i> <?php echo "Sports Detail" ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Playernamenepali</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['playernamenepali'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Playernameenglish</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['playernameenglish'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Permanentaddress</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['permanentaddress'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Temporaryaddress</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['temporaryaddress'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Dob</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['dob'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Citizenshipno</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['citizenshipno'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Qualification</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['qualification'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Weight</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['weight'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Height</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['height'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Schoolname</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['schoolname'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Playercontact</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['playercontact'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Fathersname</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['fathersname'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Mothersname</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['mothersname'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Parentscontact</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['parentscontact'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Coachname</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['coachname'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Coachcontact</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['coachcontact'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Signature</small>
                                                <div class="fw-bold">
                                                    <?php 
                                                        Html :: page_img($data['signature'], 'auto', 'auto', "", 1); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Photo</small>
                                                <div class="fw-bold">
                                                    <?php 
                                                        Html :: page_img($data['photo'], 'auto', 'auto', "", 1); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    switch ($data['isapproved']) {
                                    case 0:
                                    echo 'Not Checked';
                                    break;
                                    case 1:
                                    echo 'Approved';
                                    break;
                                    case 2:
                                    echo 'Pending';
                                    break;
                                    case 3:
                                    echo 'Not Approved';
                                    break;
                                    default:
                                    echo 'Invalid Status';
                                    break;
                                    }
                                ?>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Date Updated</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['date_updated'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--PageComponentEnd-->
                            <div class="d-flex align-items-center gap-2">
                                <?php if($can_edit_record){ ?>
                                <a class="btn btn-sm btn-success has-tooltip "   title="Edit" href="<?php print_link("player/edit/$rec_id"); ?>" >
                                <i class="material-icons">edit</i> Edit
                            </a>
                            <?php } ?>
                            <?php if($can_delete_record){ ?>
                            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" title="Delete" href="<?php print_link("player/delete/$rec_id?redirect=player"); ?>" >
                            <i class="material-icons">delete_sweep</i> Delete
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
                }
                else{
            ?>
            <!-- Empty Record Message -->
            <div class="text-muted p-3">
                <i class="material-icons">block</i> No Record Found
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
</div>
</div>
<div  class="mb-3" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col comp-grid " >
                <div class=" ">
                    <?php
                        $params = ['show_header' => false, 'show_footer' => false, 'show_pagination' => false, 'limit' => 10]; //new query param
                        $query = array_merge(request()->query(), $params);
                        $queryParams = http_build_query($query);
                        $url = url("playersport/index/player_sport.PlayerSportID/$data[playerid]?$queryParams");
                    ?>
                    <div class="ajax-inline-page" data-url="{{ $url }}" >
                        <div class="ajax-page-load-indicator">
                            <div class="text-center d-flex justify-content-center load-indicator">
                                <span class="loader mr-3"></span>
                                <span class="fw-bold">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div  class="mb-3" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col comp-grid " >
                <div class=" ">
                    <?php
                        $params = ['show_header' => false, 'show_footer' => false, 'show_pagination' => false, 'limit' => 10]; //new query param
                        $query = array_merge(request()->query(), $params);
                        $queryParams = http_build_query($query);
                        $url = url("playerachievements/index/player_achievements.PlayerID/$data[playerid]?$queryParams");
                    ?>
                    <div class="ajax-inline-page" data-url="{{ $url }}" >
                        <div class="ajax-page-load-indicator">
                            <div class="text-center d-flex justify-content-center load-indicator">
                                <span class="loader mr-3"></span>
                                <span class="fw-bold">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@endsection
