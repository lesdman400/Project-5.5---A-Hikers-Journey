<script>
    $( document ).ready(function() {
        sessionHelper.addReadMore("pct", "pctData");
    });
</script>
<section id="pct" class="row section section-pct" style="margin-left: auto; margin-right:auto;">
    <div class="section-title">
        <h1>{{ __('The What')}}....</h1>
    </div>
    <img class="section-pct__img" src="https://www.pcta.org/wp-content/themes/pcta/homepage-june14/images/pct-pcta-logos.png">
    <div class="row section__overflow section__overflow-hidden">
        <p id="pctData" class="col-12 section-pct-paragraph">
            {{$trail[0]->trail_about}}
        </p>
    </div>
</section>
