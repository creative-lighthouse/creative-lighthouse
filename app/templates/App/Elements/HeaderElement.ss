<div class="section section--HeaderElement">
    <div class="section_content">
        <div class="section_image">
            <img src="$Image.FocusFill(1920, 1080).URL" alt="$Title" />
            <img src="$Image2.FocusFill(1920, 1080).URL" alt="$Title" />
            <img src="$Image3.FocusFill(1920, 1080).URL" alt="$Title" />
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
