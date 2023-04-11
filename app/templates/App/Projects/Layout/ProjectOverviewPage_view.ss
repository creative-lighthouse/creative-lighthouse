<div class="section section--HeaderImage">
    <div class="section_image">
        <img src="$Top.HeaderImage.FocusFill(1920, 400).URL" alt="$Title" />
    </div>
</div>

<% with $Project %>

    <div class="section section--ProjectDetails">
        <img class="section_image" src="$Image.FocusFill(1200, 500).URL" alt="$Image.Title" />
        <div class="section_content">
                <h1>$Title</h1>
                <p>$Content</p>
        </div>
    </div>
<% end_with %>
