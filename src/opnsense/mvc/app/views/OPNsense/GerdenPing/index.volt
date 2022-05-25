<div class="col-md-12">
{{ partial("layout_partials/base_form",['fields':mainform,'id':'frm_mainform'])}}
</div>
<script type="text/javascript">
    $( document ).ready(function() {
        // link save button to API set action
        $("#goPing").click(function(){
            saveFormToEndpoint(url="/api/gerdenping/service/ping",formid='frm_mainform',callback_ok = function(response){
                switch(response.result){
                    case 'ok':
                        $('#pingResult').html(response.data)
                    break;
                    case 'fail':
                        $('#pingResult').html(response.message)
                    break;
                    default:
                    case 'fail':
                        $('#pingResult').html('unknown ERROR')
                }
            },true);
        });
    });
</script>

<div class="col-md-12">
    <button class="btn btn-primary"  id="goPing" type="button">PING!</button>
</div>
<div class="col-md-12" id="resultContainer">
    <div class="alert alert-primary" role="alert" >
        <pre id="pingResult"></pre>
    </div>
</div>
