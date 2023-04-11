<div class="section section--HeaderImage">
    <div class="section_image">
        <img src="$HeaderImage.FocusFill(1920, 400).URL" alt="$Title" />
    </div>
</div>

$ElementalArea

<div class="section section--TeamOverview">
    <div class="section_content">
        <div class="section_text">
            <h2 class="section_title">$Title</h2>
            <div class="section_description">$Text</div>
        </div>
        <div class="section_teamslist">
            <% loop $Teams %>
                <div class="teamitem_wrap">
                    <div class="teamitem" style="background-image: url($Image.FocusFill(1000,800).URL);">
                        <a class="teamitem_text" href="$Link">
                            <img src="$Icon.Fit(50,50).URL" alt="$Title"/>
                            <h2>$Title</h2>
                        </a>

                        <div class="teamitem_members">
                            <% loop $Teammembers %>
                                <a class="teammember" href="$Link">
                                    <div class="teammember_image">
                                        <% if $Image %>
                                            <img src="$Image.FocusFill(400,400).URL" alt="$Title"/>
                                        <% end_if %>
                                    </div>
                                    <div class="teammember_text">
                                        <h3 class="teammember_name">$Title</h3>
                                    </div>
                                </a>
                            <% end_loop %>
                        </div>
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>
