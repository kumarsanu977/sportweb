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
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Player"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center gap-3">
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Player</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <?php if($can_add){ ?>
                    <a  class="btn btn-primary btn-block" href="<?php print_link("player/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Player 
                </a>
                <?php } ?>
            </div>
            <div class="col-md-3  " >
                <!-- Page drop down search component -->
                <form  class="search" action="{{ url()->current() }}" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="input-group">
                        <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                        <button class="btn btn-primary"><i class="material-icons">search</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<div  class="" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col comp-grid " >
                <div  class=" page-content" >
                    <div id="player-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                            <?php Html::page_bread_crumb("/player/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <?php if($can_delete){ ?>
                                        <th class="td-checkbox">
                                        <label class="form-check-label">
                                        <input class="toggle-check-all form-check-input" type="checkbox" />
                                        </label>
                                        </th>
                                        <?php } ?>
                                        <th class="td-playerid" > Playerid</th>
                                        <th class="td-sportsid" > Sportsid</th>
                                        <th class="td-playernamenepali" > Playernamenepali</th>
                                        <th class="td-playernameenglish" > Playernameenglish</th>
                                        <th class="td-permanentaddress" > Permanentaddress</th>
                                        <th class="td-temporaryaddress" > Temporaryaddress</th>
                                        <th class="td-dob" > Dob</th>
                                        <th class="td-citizenshipno" > Citizenshipno</th>
                                        <th class="td-qualification" > Qualification</th>
                                        <th class="td-weight" > Weight</th>
                                        <th class="td-height" > Height</th>
                                        <th class="td-schoolname" > Schoolname</th>
                                        <th class="td-playercontact" > Playercontact</th>
                                        <th class="td-fathersname" > Fathersname</th>
                                        <th class="td-mothersname" > Mothersname</th>
                                        <th class="td-parentscontact" > Parentscontact</th>
                                        <th class="td-coachname" > Coachname</th>
                                        <th class="td-coachcontact" > Coachcontact</th>
                                        <th class="td-signature" > Signature</th>
                                        <th class="td-photo" > Photo</th>
                                        <th class="td-isapproved" > Isapproved</th>
                                        <th class="td-btn"></th>
                                    </tr>
                                </thead>
                                <?php
                                    if($total_records){
                                ?>
                                <tbody class="page-data">
                                    <!--record-->
                                    <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = ($data['playerid'] ? urlencode($data['playerid']) : null);
                                        $counter++;
                                        //check if user is the owner of the record.
                                        $is_record_owner = ($data['uid'] == $user->uid);
                                        //allow user with certain roles to manage record
                                        $can_edit_record = $is_record_owner || $user->hasRole(['admin']);
                                        $can_delete_record = $is_record_owner || $user->hasRole(['admin']);
                                    ?>
                                    <tr>
                                        <?php if($can_delete){ ?>
                                        <td class=" td-checkbox">
                                            <?php if($can_delete_record) { ?>
                                            <label class="form-check-label">
                                            <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['playerid'] ?>" type="checkbox" />
                                            </label>
                                            <?php } ?>
                                        </td>
                                        <?php } ?>
                                        <!--PageComponentStart-->
                                        <td class="td-playerid">
                                            <a href="<?php print_link("/player/view/$data[playerid]") ?>"><?php echo $data['playerid']; ?></a>
                                        </td>
                                        <td class="td-sportsid">
                                            <a size="sm" class="btn btn-sm btn btn-secondary" href="<?php print_link("sports//$data[sportsid]?subpage=1") ?>">
                                            <?php echo $data['sports_sportsname'] ?>
                                        </a>
                                    </td>
                                    <td class="td-playernamenepali">
                                        <?php echo  $data['playernamenepali'] ; ?>
                                    </td>
                                    <td class="td-playernameenglish">
                                        <?php echo  $data['playernameenglish'] ; ?>
                                    </td>
                                    <td class="td-permanentaddress">
                                        <?php echo  $data['permanentaddress'] ; ?>
                                    </td>
                                    <td class="td-temporaryaddress">
                                        <?php echo  $data['temporaryaddress'] ; ?>
                                    </td>
                                    <td class="td-dob">
                                        <?php echo  $data['dob'] ; ?>
                                    </td>
                                    <td class="td-citizenshipno">
                                        <?php echo  $data['citizenshipno'] ; ?>
                                    </td>
                                    <td class="td-qualification">
                                        <?php echo  $data['qualification'] ; ?>
                                    </td>
                                    <td class="td-weight">
                                        <?php echo  $data['weight'] ; ?>
                                    </td>
                                    <td class="td-height">
                                        <?php echo  $data['height'] ; ?>
                                    </td>
                                    <td class="td-schoolname">
                                        <?php echo  $data['schoolname'] ; ?>
                                    </td>
                                    <td class="td-playercontact">
                                        <?php echo  $data['playercontact'] ; ?>
                                    </td>
                                    <td class="td-fathersname">
                                        <?php echo  $data['fathersname'] ; ?>
                                    </td>
                                    <td class="td-mothersname">
                                        <?php echo  $data['mothersname'] ; ?>
                                    </td>
                                    <td class="td-parentscontact">
                                        <?php echo  $data['parentscontact'] ; ?>
                                    </td>
                                    <td class="td-coachname">
                                        <?php echo  $data['coachname'] ; ?>
                                    </td>
                                    <td class="td-coachcontact">
                                        <?php echo  $data['coachcontact'] ; ?>
                                    </td>
                                    <td class="td-signature">
                                        <?php 
                                            Html :: page_img($data['signature'], '50px', '50px', "small", 1); 
                                        ?>
                                    </td>
                                    <td class="td-photo">
                                        <?php 
                                            Html :: page_img($data['photo'], '50px', '50px', "small", 1); 
                                        ?>
                                    </td>
                                    <td class="td-isapproved"><?php
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
                                    ?></td>
                                    <!--PageComponentEnd-->
                                    <td class="td-btn">
                                        <div class="dropdown" >
                                            <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                            <i class="material-icons">menu</i> 
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php if($can_view){ ?>
                                                <a class="dropdown-item "   href="<?php print_link("player/view/$rec_id"); ?>" >
                                                <i class="material-icons">visibility</i> View
                                            </a>
                                            <?php } ?>
                                            <?php if($can_edit_record){ ?>
                                            <a class="dropdown-item "   href="<?php print_link("player/edit/$rec_id"); ?>" >
                                            <i class="material-icons">edit</i> Edit
                                        </a>
                                        <?php } ?>
                                        <?php if($can_delete_record){ ?>
                                        <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("player/delete/$rec_id"); ?>" >
                                        <i class="material-icons">delete_sweep</i> Delete
                                    </a>
                                    <?php } ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        }
                    ?>
                    <!--endrecord-->
                </tbody>
                <tbody class="search-data"></tbody>
                <?php
                    }
                    else{
                ?>
                <tbody class="page-data">
                    <tr>
                        <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                            <i class="material-icons">block</i> No record found
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                ?>
            </table>
        </div>
        <?php
            if($show_footer){
        ?>
        <div class=" mt-3">
            <div class="row align-items-center justify-content-between">    
                <div class="col-md-auto d-flex">    
                    <?php if($can_delete){ ?>
                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("player/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                    <i class="material-icons">delete_sweep</i> Delete Selected
                    </button>
                    <?php } ?>
                </div>
                <div class="col">   
                    <?php
                        if($show_pagination == true){
                        $pager = new Pagination($total_records, $record_count);
                        $pager->show_page_count = false;
                        $pager->show_record_count = true;
                        $pager->show_page_limit =false;
                        $pager->limit = $limit;
                        $pager->show_page_number_list = true;
                        $pager->pager_link_range=5;
                        $pager->ajax_page = true;
                        $pager->render();
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>


@endsection
