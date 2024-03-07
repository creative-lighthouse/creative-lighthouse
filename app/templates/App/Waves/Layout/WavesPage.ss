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

$ElementalArea

<div class="section section--waveitems">
    <div class="section_content">
        <div class="section_content_introduction">
            <p>SP Waves is a collection of Stock Assets that can be used for free with credit for any project you like. The collection includes Materials, 3D models and more.</p>
        </div>
        <div class="section_content_assets">
            <% loop $Assets %>
                <% include AssetCard Page=$Top %>
            <% end_loop %>
        </div>
        <div class="section_content_pagination">
            <a class="prev <% if $Assets.NotFirstPage %>active<% end_if %>" href="$Assets.PrevLink">Previous</a>
            <a class="next <% if $Assets.NotLastPage %>active<% end_if %>" href="$Assets.NextLink">Next</a>
        </div>
    </div>
</div>
