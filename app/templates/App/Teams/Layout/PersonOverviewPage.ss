<div class="section section--HeaderImage">
    <div class="section_image">
        <img src="$HeaderImage.FocusFill(1920, 400).URL" alt="$Title" />
    </div>
</div>

$ElementalArea

<div class="section section--PersonOverview">
    <div class="section_content">
        <div class="section_text">
            <h2 class="section_title">$Title</h2>
            <div class="section_description">$Text</div>
        </div>
        <div class="section_teamslist">
            <% loop $Persons %>
                <a href="$Link" class="teamitem_wrap">
                    <div class="teamitem">
                        <div class="teamitem_image">
                            <% if $Image %>
                                <img src="$Image.FocusFill(400, 400).URL" alt="$Title" />
                            <% end_if %>
                        </div>
                        <h3>$Title</h3>
                    </div>
                </a>
            <% end_loop %>
        </div>
    </div>
</div>
