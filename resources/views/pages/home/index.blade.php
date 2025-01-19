<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php 
    $pageTitle = "Home"; // set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<div>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row "> 
                <div class="col comp-grid " >
                    <div class="">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12 comp-grid " >
                    <div class=" "><div class="card">
                        <div class="card-header">
                            खेलाडी दर्ता विधि
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">प्रदेश खेलकुद परिषद लुम्बिनी प्रदेश, खेलाडी आवेदन प्रणालीमा स्वागत छ ।</h5>
                            <p class="card-text">१. खेलाडी दर्ताको लागि मेनु बारमा रहेको "खेलाडीहरु" अप्सनमा क्लिक गरि +नया खेलाडी दर्ता गर्नुहोसमा क्लिक गर्नुहोस ।</p>
                            <p class="card-text">२. हाल सम्म सहभागी प्रतियोगिताहरु छन भने मेनु बारमा रहेको "प्रतियोगिताहरु" मा क्लिक गरि +प्रतियोगिताहरु थप्नुहोस  ।</p>
                            <p class="card-text">३. हाल सम्मको उच्चतम उपलब्धिहरु छन भने मेनु बारमा रहेको "उपलब्धिहरु" मा क्लिक गरि +उपलब्धिहरु थप्नुहोस ।</p>
                            <p class="card-text">४. * लेखिएको अनिवार्य रहेको छ। (सबै फिल्ड हरु अनिवार्य भर्नुहोस्)</p>
                            <p class="card-text">५. खेलाडीको उचाई र तौल लेख्नु पर्ने ठाउमा अंग्रेजी नम्बर राख्नुहोस।</p>
                            <a href="/player/add" class="btn btn-primary">सुरु गर्नुहोस</a>
                        </div>
                    </div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Page custom css -->
@section('pagecss')
<style>
</style>
@endsection
<!-- Page custom js -->
@section('pagejs')
<script>
    $(document).ready(function(){
    // custom javascript | jquery codes
    });
</script>
@endsection
