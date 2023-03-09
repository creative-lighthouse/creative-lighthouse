<div class="section section--HeaderImage">
    <div class="section_image">
        <img src="$HeaderImage.FocusFill(1920, 400).URL" alt="$Title" />
    </div>
</div>

$ElementalArea

<div class="section section--ProjectsElement">
    <div class="section_content">
        <div class="section_text">
            <h2 class="section_title">$Title</h2>
            <div class="section_description">$Text</div>
        </div>
        <% loop GetProjects.GroupedBy(Status) %>
            <h2 class="state_title">
                <% if $Status = "InProgress" %>
                    <%t App.IN_PROGRESS 'Sonstiges' %>
                <% else_if $Status = "Finished" %>
                    <%t App.FINISHED 'Sonstiges' %>
                <% else_if $Status = "Planned" %>
                    <%t App.PLANNED 'Sonstiges' %>
                <% end_if %>

            </h2>

            <% loop Children.GroupedBy(Year) %>
            <h3 class="time_title"><% if $Year %>$Year<% else %>In Zukunft<% end_if %></h3>
                <div class="section_projectlist">
                    <% loop $Children %>
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
                                    <% if $Image %>
                                        <img src="$Image.FocusFill(400,400).URL" alt="$Title"/>
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
            <% end_loop %>
        <% end_loop %>
    </div>
</div>
