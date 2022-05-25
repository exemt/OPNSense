{{ partial("layout_partials/base_form",['fields':mainform,'id':'frm_mainform'])}}
<script type="text/javascript">
    $( document ).ready(function() {
        // link save button to API set action
        $("#goPing").click(function(){
            saveFormToEndpoint(url="/api/gerdenping/service/ping",formid='frm_mainform',callback_ok = function(response){
                $('#pingResult').html(response.data)

            },true);

        });


    });
</script>

<div class="col-md-12">
    <button class="btn btn-primary"  id="goPing" type="button"><b>{{ lang._('Save') }}</b></button>
</div>
<div class="col-md-12" id="resultContainer">
    <div class="alert alert-primary" role="alert" >
        <pre id="pingResult">
        </pre>
    </div>
</div>
