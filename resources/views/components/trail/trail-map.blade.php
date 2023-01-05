<section id="map" class="row section section-mapshare" style="margin-left: auto; margin-right:auto;">
    <div class="section-title">
        <h1>{{ __('Garmin Mapshare & Additional Info')}}</h1>
    </div> 
    <p>
        While you will not see Bubs exact location, you may use the below to see his last check in! 
        </br> He will be carrying a Garmin Mini Inreach 2, and will periodically send location data to be updated below
    </p> 
    <iframe class="section-mapshare__iframe" src="{{$trail[0]->garmin_map_url}}" frameborder="0" marginwidth="0" marginheight="0" width="810" height="760"></iframe> 
</section>