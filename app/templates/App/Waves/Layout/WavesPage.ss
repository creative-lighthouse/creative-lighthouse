<div class="section section--headerbanner">
    <div class="section_content">
        <div class="section_content_image effect--starfield">
            $HeaderImage.FocusFillMax(1920, 400)
            <div id='stars'></div>
            <div id='stars2'></div>
            <div id='stars3'></div>
        </div>

        <h1 class="section_content_title">SP Waves</h1>
    </div>
</div>

<div class="section section--waveitems">
    <div class="section_content">
        <div class="section_content_introduction">
            <p>SP Waves is a collection of Stock Assets that can be used for free with credit for any project you like. The collection includes Materials, 3D models and more.</p>
        </div>
        <div class="section_content_assets">
            <% loop $AssetTypes %>
                <div class="asset_type">
                    <h2 class="asset_type_title">$Title</h2>
                    <div class="asset_type_list">
                        <% loop $Assets %>
                            <% include AssetCard Page=$Top %>
                        <% end_loop %>
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>
