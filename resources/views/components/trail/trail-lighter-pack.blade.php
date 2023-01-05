@vite([
'resources/js/lighterPack.js'
])
<script>
    $( document ).ready(function() {
        lighterPackInit();
    });
</script>
<section id="lighterPack" class="row section section-stats" style="margin-left: auto; margin-right:auto;">
    <div class="row section-title">
        <h1 id="lighterPack-title" class="col-12">{{ __('Full Pack - PCT Gear')}}</h1>
    </div>
    <div class="row justify-content-center mb-5">
        <label class="col-auto font-weight-bold" for="lighterPackURL">{{ __('Select Pack List')}}:</label>
        <select id="lighterPackURL" class="col-auto">
            <option value="https://lighterpack.com/r/c0z1be">{{ __('Full Pack')}}</option>
            <option value="https://lighterpack.com/r/gypdcw">{{ __('Pre Kennedy Meadows')}}</option>
            <option value="https://lighterpack.com/r/xrbf9u">{{ __('High Sierra')}}</option>
        </select>
        <script>
            jQuery("#lighterPackURL").change(function(){
                jQuery("#lighterPackData").empty();
                jQuery("#lighterPack .section__show-more").remove();
                lighterPackInit(this.value);
                jQuery("#lighterPack-title")[0].innerText = this.selectedOptions[0].innerText + " - PCT Gear";
            });
        </script>
    </div>
    <div class="row section__overflow section__overflow-hidden">
        <div id="lighterPackData" class="col-12">
        
        </div>
    </div>
</section>