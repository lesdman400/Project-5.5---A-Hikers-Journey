@vite([
        'resources/js/fitbit.js'
        ])
<script>
    $( document ).ready(function() {
        fitbitInit();
    });
</script>
<section id="fitbit" class="row section section-stats" style="margin-left: auto; margin-right:auto;">
    <div class="row section-title">
        <h1 class="col-12">{{ __('Fitbit PCT Stats')}}</h1>
    </div>
    <div class="row section__overflow section__overflow-hidden">
        <div id="fitbitData" class="row mb-5 flex-column align-items-center align-items-center flex-md-row flex-md-center">
        <!-- Populated by fitbit.js -->
        </div>
    </div>
</section>