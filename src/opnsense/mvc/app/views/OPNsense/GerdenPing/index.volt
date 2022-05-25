{{ partial("layout_partials/base_form",['fields':mainform,'id':'frm_mainform'])}}
<script type="text/javascript">
    $( document ).ready(function() {
        // link save button to API set action
        $("#goPing").click(function(){
            saveFormToEndpoint(url="/api/gerdenping/service/ping",formid='frm_mainform',callback_ok=function(){
                // action to run after successful save, for example reconfigure service.
            },true);

        });


    });
</script>

<div class="col-md-12">
    <button class="btn btn-primary"  id="goPing" type="button"><b>{{ lang._('Save') }}</b></button>
</div>
