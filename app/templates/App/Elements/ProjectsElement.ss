<div class="section section--ProjectsElement">
    <div class="section_content">
        <div class="section_text">
            <h2 class="section_title">$Title</h2>
            <div class="section_description">$Text</div>
        </div>
        <div class="section_projectlist">
            <% loop GetProjects %>
                <div class="projectitem_wrap">
                    <div class="projectitem">
                        <div class="projectitem_teams">
                            <% loop $Teams %>
                                <% if $Icon %>
                                    <a href="$getLink" class="projectitem_team" title="$Title">
                                        <img src="$Icon.FocusFill(40,40).URL" alt="$Title"/>
                                    </a>
                                <% end_if %>
                            <% end_loop %>
                        </div>
                        <a href="$Link" class="projectitem_image">
                            <% if $PhotoGalleryImages %>
                                <img src="$PhotoGalleryImages.First.Image.FocusFill(400,400).URL" alt="$Title"/>
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
            <% end_loop %>
        </div>
        <a class="link--button" href="$ProjectsHolderLink"><%t ProjectsElement.AllProjects "Alle Projekte" %></a>
    </div>
</div>
