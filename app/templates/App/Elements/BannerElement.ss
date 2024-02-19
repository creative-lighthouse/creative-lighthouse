<div class="section section--banner $Variant">
    <div class="section_content">
        <% if $Image %>
            <div class="banner_image">
                $Image.ScaleWidth(1200)
            </div>
        <% end_if %>

        <div class="banner_text">
            <% if $ShowTitle %>
                <h2 class="textimage_text_title">$Title</h2>
            <% end_if %>
            $Text
        </div>
    </div>
</div>
