<!-- <script>
    $( document ).ready(function() {
        blogInit();
    });
</script> -->
<section id="blog" class="row section section-blog" style="margin-left: auto; margin-right:auto;">
    <div id="blog-title" class="row section-title" style="display:none;">
        <h1 class="col-12">{{ __('Trail Notes')}}</h1>
    </div>
    <div class="row justify-content-center mb-5" style="display:none;">
        <label class="col-auto font-weight-bold" for="blogDate">Select Post:</label>
        <select id="blogDate" class="col-auto">
            <!-- Fill options based on available files -->
            <option value="select">Please Select...</option>
        </select>
        <h5>(Sorted by Latest Post)</h5>
        <script>
            jQuery("#blogDate").change(function(){
                jQuery("#blogData").empty();
                jQuery("#blog .section__show-more").remove();
                blogInit(this.value);
                // jQuery("#blog-title")[0].innerText = this.selectedOptions[0].innerText;
            });
        </script>
    </div>
    {{$trailNotes[0]->trail_notes}}
    <div class="row section__overflow section__overflow-hidden" style="display:none;">
        <p id="blogData" class="col-12 section-blog-paragraph">
            <!-- Parse Data In via PHP-->
        </p>
    </div>
</section>