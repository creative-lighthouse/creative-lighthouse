<div class="section section--HeaderImage">
    <div class="section_image">
        <img src="$HeaderImage.FocusFill(1920, 400).URL" alt="$Title" />
    </div>
</div>

$ElementalArea

<div class="section section--TeamsOverview">
    <div class="section_content">
        <div class="section_text">
            <h2 class="section_title">$Title</h2>
            <div class="section_description">$Text</div>
        </div>
        <% loop $Teams %>
            <div class="section_teamslist">
                <div class="teamitem_wrap">
                    <div class="teamitem">
                        <a href="$Link" class="teamitem_image">
                            <% if $Image %>
                                <img src="$Image.FocusFill(800,400).URL" alt="$Title"/>
                            <% end_if %>
                        </a>
                        <a href="$Link" class="projectitem_text">
                            <% if $FormattedStartDate && $FormattedFinishDate %>
                                <p class="projectitem_date">$FormattedStartDate - $FormattedFinishDate</p>
                            <% else_if $FormattedStartDate %>
                                <p class="projectitem_date">$FormattedStartDate</p>
                            <% else_if $FormattedFinishDate %>
                                <p class="projectitem_date">$FormattedFinishDate</p>
                            <% end_if %>
                            <h3 class="projectitem_title">$Title</h3>
                        </a>
                    </div>
                </div>
            </div>
        <% end_loop %>
    </div>
</div>
