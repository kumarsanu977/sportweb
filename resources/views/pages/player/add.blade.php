<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Player"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
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
                        <div class="h5 font-weight-bold text-primary">Add New Player</div>
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
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form id="player-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('player.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="sportsid">Sportsid <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-sportsid-holder" class=" ">
                                                <select required=""  id="ctrl-sportsid" data-field="sportsid" name="sportsid"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->sportsid_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('sportsid', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="playernamenepali">Playernamenepali <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-playernamenepali-holder" class=" ">
                                                <input id="ctrl-playernamenepali" data-field="playernamenepali"  value="<?php echo get_value('playernamenepali') ?>" type="text" placeholder="Enter Playernamenepali"  required="" name="playernamenepali"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="playernameenglish">Playernameenglish <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-playernameenglish-holder" class=" ">
                                                <input id="ctrl-playernameenglish" data-field="playernameenglish"  value="<?php echo get_value('playernameenglish') ?>" type="text" placeholder="Enter Playernameenglish"  required="" name="playernameenglish"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="permanentaddress">Permanentaddress <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-permanentaddress-holder" class=" ">
                                                <textarea placeholder="Enter Permanentaddress" id="ctrl-permanentaddress" data-field="permanentaddress"  required="" rows="5" name="permanentaddress" class=" form-control"><?php echo get_value('permanentaddress') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="temporaryaddress">Temporaryaddress </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-temporaryaddress-holder" class=" ">
                                                <textarea placeholder="Enter Temporaryaddress" id="ctrl-temporaryaddress" data-field="temporaryaddress"  rows="5" name="temporaryaddress" class=" form-control"><?php echo get_value('temporaryaddress') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="dob">Dob <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-dob-holder" class="input-group ">
                                                <input id="ctrl-dob" data-field="dob" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('dob') ?>" type="datetime" name="dob" placeholder="Enter Dob" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="citizenshipno">Citizenshipno <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-citizenshipno-holder" class=" ">
                                                <input id="ctrl-citizenshipno" data-field="citizenshipno"  value="<?php echo get_value('citizenshipno') ?>" type="text" placeholder="Enter Citizenshipno"  required="" name="citizenshipno"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="qualification">Qualification </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-qualification-holder" class=" ">
                                                <select  id="ctrl-qualification" data-field="qualification" name="qualification"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php
                                                    $options = Menu::qualification();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('qualification', $value, "");
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>                                   
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="weight">Weight </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-weight-holder" class=" ">
                                                <input id="ctrl-weight" data-field="weight"  value="<?php echo get_value('weight') ?>" type="number" placeholder="Enter Weight" step="0.1"  name="weight"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="height">Height </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-height-holder" class=" ">
                                                <input id="ctrl-height" data-field="height"  value="<?php echo get_value('height') ?>" type="number" placeholder="Enter Height" step="0.1"  name="height"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="schoolname">Schoolname </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-schoolname-holder" class=" ">
                                                <input id="ctrl-schoolname" data-field="schoolname"  value="<?php echo get_value('schoolname') ?>" type="text" placeholder="Enter Schoolname"  name="schoolname"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="playercontact">Playercontact </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-playercontact-holder" class=" ">
                                                <input id="ctrl-playercontact" data-field="playercontact"  value="<?php echo get_value('playercontact') ?>" type="text" placeholder="Enter Playercontact"  name="playercontact"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="fathersname">Fathersname </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-fathersname-holder" class=" ">
                                                <input id="ctrl-fathersname" data-field="fathersname"  value="<?php echo get_value('fathersname') ?>" type="text" placeholder="Enter Fathersname"  name="fathersname"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="mothersname">Mothersname </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-mothersname-holder" class=" ">
                                                <input id="ctrl-mothersname" data-field="mothersname"  value="<?php echo get_value('mothersname') ?>" type="text" placeholder="Enter Mothersname"  name="mothersname"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="parentscontact">Parentscontact </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-parentscontact-holder" class=" ">
                                                <input id="ctrl-parentscontact" data-field="parentscontact"  value="<?php echo get_value('parentscontact') ?>" type="text" placeholder="Enter Parentscontact"  name="parentscontact"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="coachname">Coachname </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-coachname-holder" class=" ">
                                                <input id="ctrl-coachname" data-field="coachname"  value="<?php echo get_value('coachname') ?>" type="text" placeholder="Enter Coachname"  name="coachname"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="coachcontact">Coachcontact </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-coachcontact-holder" class=" ">
                                                <input id="ctrl-coachcontact" data-field="coachcontact"  value="<?php echo get_value('coachcontact') ?>" type="text" placeholder="Enter Coachcontact"  name="coachcontact"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="signature">Signature <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-signature-holder" class=" ">
                                                <div class="dropzone required" input="#ctrl-signature" fieldname="signature" uploadurl="{{ url('fileuploader/upload/signature') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="signature" id="ctrl-signature" data-field="signature" required="" class="dropzone-input form-control" value="<?php echo get_value('signature') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="photo">Photo <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-photo-holder" class=" ">
                                                <div class="dropzone required" input="#ctrl-photo" fieldname="photo" uploadurl="{{ url('fileuploader/upload/photo') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="photo" id="ctrl-photo" data-field="photo" required="" class="dropzone-input form-control" value="<?php echo get_value('photo') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                Submit
                                <i class="material-icons">send</i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
