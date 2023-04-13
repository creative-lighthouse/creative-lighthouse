<% with $Team %>
    <div class="section section--HeaderImage">
        <div class="section_image">
            <% if $Image %>
                <img class="blurry" src="$Image.FocusFill(1920, 400).URL" alt="$Title" />
            <% else %>
                <img class="blurry" src="./_resources/app/client/icons/placeholder-header.png" alt="$Title" />
            <% end_if %>
            <img class="transition" src="./_resources/app/client/icons/transition.png"/>
        </div>
    </div>

    <div class="section section--TeamDetails">
        <div class="section_content">
            <div class="section_icon">
                <% if $Icon %>
                    <img src="$Icon.FitMax(200,200).URL" alt="$Title" />
                <% end_if %>
            </div>
            <div class="section_text">
                <h1>$Title</h1>
                <p>$Description</p>
            </div>
            <% if $SocialLinks %>
                <div class="section_socials">
                    <% loop $SocialLinks %>
                        <a href="$Link" class="social_link" style="-webkit-mask-image: url($SocialPlattform.Icon.FitMax(100,100).URL);" alt="$Title"></a>
                    <% end_loop %>
                </div>
            <% end_if %>
            <div class="section_team">
                <h2>Team Mitglieder <span>($Teammembers.Count)</span></h2>
                <div class="section_members">
                    <% loop $Teammembers %>
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
            <% if $Projects %>
                <div class="section_projects">
                    <h2>Projekte</h2>
                    <div class="section_projectlist">
                        <% loop $Projects %>
                            <a href="$Link" class="projectitem_wrap">
                                <div class="projectitem">
                                    <div class="projectitem_image">
                                        <% if $PhotoGalleryImages %>
                                            <img src="$PhotoGalleryImages.First.Image.FocusFill(400, 400).URL" alt="$Title" />
                                        <% end_if %>
                                    </div>
                                    <h3>$Title</h3>
                                </div>
                            </a>
                        <% end_loop %>
                    </div>
                </div>
            <% end_if %>
        </div>
    </div>
<% end_with %>
