<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->canAccess("playersport/add");
    $can_edit = $user->canAccess("playersport/edit");
    $can_view = $user->canAccess("playersport/view");
    $can_delete = $user->canAccess("playersport/delete");
    $pageTitle = "Player Sport Details"; //set dynamic page title
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
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Player Sport Details</div>
                    </div>
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
                            $rec_id = ($data['playersportid'] ? urlencode($data['playersportid']) : null);
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
                                                    <small class="text-muted">Playersportid</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['playersportid'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Playerid</small>
                                                    <div class="fw-bold">
                                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("player/view/$data[playerid]?subpage=1") ?>">
                                                        <i class="material-icons">visibility</i> <?php echo "Player Detail" ?>
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
                                            <small class="text-muted">Date</small>
                                            <div class="fw-bold">
                                                <?php echo  $data['date'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-light mb-1 card-1 p-2 border rounded">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <small class="text-muted">Location</small>
                                            <div class="fw-bold">
                                                <?php echo  $data['location'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-light mb-1 card-1 p-2 border rounded">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <small class="text-muted">Uid</small>
                                            <div class="fw-bold">
                                                <?php echo  $data['uid'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--PageComponentEnd-->
                        <div class="d-flex align-items-center gap-2">
                            <?php if($can_edit_record){ ?>
                            <a class="btn btn-sm btn-success has-tooltip "   title="Edit" href="<?php print_link("playersport/edit/$rec_id"); ?>" >
                            <i class="material-icons">edit</i> Edit
                        </a>
                        <?php } ?>
                        <?php if($can_delete_record){ ?>
                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" title="Delete" href="<?php print_link("playersport/delete/$rec_id?redirect=playersport"); ?>" >
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
</section>


@endsection
