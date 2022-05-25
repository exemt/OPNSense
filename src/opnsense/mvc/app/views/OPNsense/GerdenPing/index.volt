<div class="col-md-12">
{{ partial("layout_partials/base_form",['fields':mainform,'id':'frm_mainform'])}}
</div>
<script type="text/javascript">



    $( document ).ready(function() {

        const container = $('#resultContainer');
        const resultContainer = $('#pingResult');
        const cb_ok = (response) => {
                switch(response.result){
                    case 'ok':
                        resultContainer.html(response.data)
                    break;
                    case 'fail':
                        resultContainer.html(response.message)
                    break;
                    default:
                    case 'fail':
                        resultContainer.html('unknown ERROR')
                }
                return
        }

        const cb_fail = (response) => {
            if(response.hasOwnProperty('message'))
                resultContainer.html(response.message)
            else
                container.css({"display":"none"})
        }

        $("#goPing").click(function(){
            container.css({"display":"block"})
            resultContainer.html('loading')
              saveFormToEndpoint(url="/api/gerdenping/service/ping",formid='frm_mainform',cb_ok,true,cb_fail);
        });
    });
</script>

<div class="col-md-12">
    <button class="btn btn-primary"  id="goPing" type="button">PING!</button>
</div>
<div class="col-md-12" id="resultContainer" style="display:none">
    <div class="alert alert-primary" role="alert" style="margin-left:0px;margin-right:0px">
        <pre id="pingResult"></pre>
    </div>
</div>
