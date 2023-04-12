<% with $Project %>
    <div class="section section--HeaderImage">
        <div class="section_image">
            <% if $PhotoGalleryImages %>
                <img class="blurry" src="$PhotoGalleryImages.First.Image.FocusFill(1920, 400).URL" alt="$Title" />
            <% else %>
                <img src="./_resources/app/client/icons/placeholder-header.png" alt="$Title" />
            <% end_if %>
            <img class="transition" src="./_resources/app/client/icons/transition.png"/>
        </div>
    </div>

    <div class="section section--ProjectDetails">
        <% if $PhotoGalleryImages %>
            <div class="swiper swiper--auto">
                <div class="swiper-wrapper">
                    <% loop $PhotoGalleryImages %>
                        <div class="swiper-slide">
                            <a data-gallery="gallery" data-glightbox="description: $Title" data-caption="$Title" href="$Image.FitMax(2000,2000).URL">
                                <img src="$Image.FocusFill(1200,500).URL" />
                            </a>
                        </div>
                    <% end_loop %>
                </div>
            </div>
        <% end_if %>
        <div class="section_content">
                <h1>$Title</h1>
                <p>$Content</p>
        </div>
    </div>
<% end_with %>
