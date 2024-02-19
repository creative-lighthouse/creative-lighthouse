<div class="section section--teaser">
    <div class="section_content">
        <h2 class="section_title">$Title</h2>
        <div class="section_teaser_list">
            <% loop $Teasers %>
                <div class="teaser_item_wrap">
                    <a class="teaser_item effect--starfield">
                        <div id='stars'></div>
                        <div id='stars2'></div>
                        <div id='stars3'></div>
                        <% if $Image %>
                            <div class="teaser_item_image">
                                <img src="$Image.URL" alt="$Image.AltText" />
                            </div>
                        <% else %>
                            <div class="teaser_item_image_placeholder"></div>
                        <% end_if %>
                        <div class="teaser_item_content">
                            <h3>$Title</h3>
                            <p>$Content</p>
                        </div>
                    </a>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>
