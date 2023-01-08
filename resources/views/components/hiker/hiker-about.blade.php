<script>
    $( document ).ready(function() {
        sessionHelper.addReadMore("about", "aboutData");
    });
</script>
<section id="about" class="row section section-about" style="margin-left: auto; margin-right:auto;">
    <div class="row section-title">
        <h1 class="col-12">{{ __('The Who')}}..</h1>
    </div>
    <div class="row mb-5">
        <div class="col-12 offset-md-2 col-md-auto p-0 ">
            <img class="section-about-profile__img" src="{{asset('storage/'.$trail[0]->profile_img_url)}}">
        </div>
        <!-- TODO Generate dynamically based on all trails available for user -->
        <p class="col-12 col-md-4">
            @foreach  ($trailList as $trailed)
                {{$trailed->trail_name}} - {{preg_split("/-/",$trailed->trail_end_date)[0]}}
                </br>
            @endforeach  
        </p>
    </div>
    <div class="row section__overflow section__overflow-hidden">
        <p id="aboutData" class="col-12 section-about-paragraph">
            {{$trail[0]->hiker_about}}
        </p>
    </div>
</section>