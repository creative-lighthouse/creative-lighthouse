<div class="section section--HeaderElement">
    <div class="section_content">
        <div class="section_image">
        <% if $Image %><img src="$Image.FocusFill(1920, 1080).URL" alt="$Title" /><% end_if %>
            <% if $Image2 %><img src="$Image2.FocusFill(1920, 1080).URL" alt="$Title" /><% end_if %>
            <% if $Image3 %><img src="$Image3.FocusFill(1920, 1080).URL" alt="$Title" /><% end_if %>
            <% if $PlaceholderImage %><img class="image-placeholder" src="$PlaceholderImage.FocusFill(1920, 1080).URL" alt="$Title" /><% end_if %>
        </div>
        <div class="section_text">
            <% if ShowTitle %>
                <h1 class="text_title">$Title</h1>
            <% end_if %>
            <% if $Text %>
                <div class="text_content">$Text</div>
            <% end_if %>
        </div>
    </div>
</div>
