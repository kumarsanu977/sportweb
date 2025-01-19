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
    if ($show_header == true) {
    ?>
        <div class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto  back-btn-col">
                        <a class="back-btn btn " href="{{ url()->previous() }}">
                            <i class="material-icons">arrow_back</i>
                        </a>
                    </div>
                    <div class="col  "> 
                        <div class="">
                            <div class="h5 font-weight-bold text-primary">खेलाडी विवरण</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="">
        <div class="container">

            <div class="row ">
                <div class="col comp-grid ">
                    <div class=" page-content">
                        <?php
                        if ($data) {
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
                                        <!-- My code -->
                                        <div class="col-12">
                                            <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <!-- My code data -->
                                                        <div class="resume">
                                                            <div class="resume-header">
                                                                <div class="header-text">
                                                                    <h6>अनुसूची-१</h6>
                                                                    <p>(दफा (१२) सँग सम्बन्धित)</p>
                                                                    <h3>प्रदेश खेलकुद परिषद् लुम्बिनी</h3>
                                                                    <p>................प्रतियोगिता...................</p>
                                                                    <h1>खेलाडी दर्ता फाराम</h1>
                                                                </div>
                                                                <?php
                                                                Html::page_img($data['photo'], '100px', '100px', "small", 1);
                                                                ?>
                                                            </div>
                                                            <div>
                                                                <hr />
                                                            </div>

                                                            <div class="work-experience">
                                                                <div class="section-title">व्यक्तिगत विवरण</div>
                                                                <div>
                                                                    <table class=section-data>
                                                                        <tr>
                                                                            <td class=bold-data>दर्ता नं:</td>
                                                                            <td><?php echo $data['playerid']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>खेलको नाम:</td>
                                                                            <td><?php echo $data['sports_sportsname']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>खेलाडीको नाम, थर (देवनागरीमा):</td>
                                                                            <td><?php echo $data['playernamenepali']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>खेलाडीको नाम थर (अंग्रेजीमा):</td>
                                                                            <td><?php echo $data['playernameenglish']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>स्थायी ठेगाना:</td>
                                                                            <td><?php echo $data['permanentaddress']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>अस्थायी ठेगाना:</td>
                                                                            <td><?php echo $data['temporaryaddress']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>जन्म मिति:</td>
                                                                            <td><?php echo $data['dob']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>नागरिकता नं:</td>
                                                                            <td><?php echo $data['citizenshipno']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>शैक्षिक योग्यता:</td>
                                                                            <td><?php echo $data['qualification']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>तौल:</td>
                                                                            <td><?php echo $data['weight']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>उचाइ:</td>
                                                                            <td><?php echo $data['height']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>अध्ययनरत स्कूल/कलेजको नाम:</td>
                                                                            <td><?php echo $data['schoolname']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>खेलाडीको सम्पर्क नं:</td>
                                                                            <td><?php echo $data['playercontact']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>पिताको नाम थर:</td>
                                                                            <td><?php echo $data['fathersname']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>माताको नाम थर:</td>
                                                                            <td><?php echo $data['mothersname']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data:>पिता/माताको सम्पर्क नं:</td>
                                                                            <td><?php echo $data['parentscontact']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>प्रशिक्षकको नाम:</td>
                                                                            <td><?php echo $data['coachname']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class=bold-data>प्रशिक्षकको सम्पर्क नं:</td>
                                                                            <td><?php echo $data['coachcontact']; ?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                            <div class="education">
                                                                <div class="section-title">हाल सम्म सहभागी प्रतियोगिताको नाम</div>
                                                                <div class="section-data">
                                                                    <div class="container-fluid">
                                                                        <div class="row ">
                                                                            <div class="col comp-grid ">
                                                                                <div class=" ">
                                                                                    <?php
                                                                                    $params = ['show_header' => false, 'show_footer' => false, 'show_pagination' => false, 'limit' => 10];
                                                                                    $query = array_merge(request()->query(), $params);
                                                                                    $queryParams = http_build_query($query);
                                                                                    $url = url("playersport/index/player_sport.PlayerID/$data[playerid]?$queryParams");
                                                                                    ?>
                                                                                    <div class="ajax-inline-page" data-url="{{ $url }}">
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
                                                            </div>
                                                            <div class="organizations">
                                                                <div class="section-title">हाल सम्मको उच्चतम उपलब्धिहरु</div>
                                                                <div class="section-data">
                                                                    <div class="container-fluid">
                                                                        <div class="row ">
                                                                            <div class="col comp-grid ">
                                                                                <div class=" ">
                                                                                    <?php
                                                                                    $params = ['show_header' => false, 'show_footer' => false, 'show_pagination' => false, 'limit' => 10];
                                                                                    $query = array_merge(request()->query(), $params);
                                                                                    $queryParams = http_build_query($query);
                                                                                    $url = url("playerachievements/index/player_achievements.PlayerID/$data[playerid]?$queryParams");
                                                                                    ?>
                                                                                    <div class="ajax-inline-page" data-url="{{ $url }}">
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
                                                                    <hr/>
                                                                    <div class="section-data">
                                                                        <p><strong>माथि उल्लेखित ब्यहोरा ठिक साँचो हो, झुठ्ठा ठहर भएमा सहुँला बुझाउँला।</strong></p>
                                                                        <h5> हस्ताक्षार</h5>
                                                                        <p> <?php
                                                                            Html::page_img($data['signature'], '100px', '100px', "small", 1);
                                                                            ?></p>
                                                                    </div>
                                                                    <div class="work-experience">
                                                                        <div class="section-title">प्रमाणित गर्ने:</div>
                                                                        <div>
                                                                            <table class=section-data>
                                                                                <tr>
                                                                                    <td>प्रदेश खेलकुद परिषद अधिकारी</td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>नाम थर:</td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>मिति:</td>
                                                                                    <td><?php echo $data['date_updated']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>हस्ताक्षर:</td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>कार्यालयको छाप:</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                                        <!-- My code data end-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- my code end -->


                                    </div>
                                    <!--PageComponentEnd-->
                                    <div class="d-flex align-items-center gap-2">
                                        <?php if ($can_edit_record) { ?>
                                            <a class="btn btn-sm btn-success has-tooltip " title="Edit" href="<?php print_link("player/edit/$rec_id"); ?>">
                                                <i class="material-icons">edit</i> Edit
                                            </a>
                                        <?php } ?>
                                        <?php if ($can_delete_record) { ?>
                                            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" title="Delete" href="<?php print_link("player/delete/$rec_id?redirect=player"); ?>">
                                                <i class="material-icons">delete_sweep</i> Delete
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <!-- Empty Record Message -->
                            <div class="text-muted p-3">
                                <i class="material-icons">block</i> No Record Found
                            </div>
                        <?php
                        }
                        ?>
                        <!-- container end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection