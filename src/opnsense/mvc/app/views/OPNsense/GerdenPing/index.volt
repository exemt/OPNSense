{{ partial("layout_partials/base_form",['fields':mainform,'id':'frm_mainform'])}}
<script type="text/javascript">
    $( document ).ready(function() {
        var data_get_map = {'frm_GeneralSettings':"/api/helloworld/settings/get"};
        mapDataToFormUI(data_get_map).done(function(data){
            // place actions to run after load, for example update form styles.
        });

        // link save button to API set action
        $("#saveAct").click(function(){
            saveFormToEndpoint(url="/api/gerdenping/service/pingt",formid='frm_mainform',callback_ok=function(){
                // action to run after successful save, for example reconfigure service.
            });
        });


    });
</script>

<div class="col-md-12">
    <button class="btn btn-primary"  id="saveAct" type="button"><b>{{ lang._('Save') }}</b></button>
</div>
