<div class="section section--HeaderImage">
    <div class="section_image">
        <img src="$Top.HeaderImage.FocusFill(1920, 400).URL" alt="$Title" />
    </div>
</div>

<% with $Person %>
    <div class="section section--PersonDetails">
        <div class="section_content">
            <div class="section_intro">
                <div class="section_back">
                    <a class="backbutton" onclick="window.history.back();">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path fill="currentColor" d="M24 40 8 24 24 8l2.1 2.1-12.4 12.4H40v3H13.7l12.4 12.4Z"/></svg>
                    </a>
                </div>
                <% if $Image %>
                    <img class="section_image" src="$Image.Fit(400,400).URL" alt="$Title" />
                <% else %>
                    <div class="section_image"></div>
                <% end_if %>
                <h1 class="section_title">$Title</h1>
                <div class="section_description">$Description</div>
                <% if $SocialLinks %>
                    <div class="section_socials">
                        <% loop $SocialLinks %>
                            <a href="$Link" class="social_link" style="-webkit-mask-image: url($SocialPlattform.Icon.FitMax(100,100).URL);" alt="$Title"></a>
                        <% end_loop %>
                    </div>
                <% end_if %>
            </div>

            <h2>Teams</h2>
            <div class="section_teams">
                <% loop $Teams %>
                    <a class="section_team" href="$Link">
                        <img class="section_team_image" src="$Icon.Fit(250,250).URL" alt="$Title" />
                        <h3 class="section_team_title">$Title</h3>
                    </a>
                <% end_loop %>
            </div>
        </div>
    </div>

<% end_with %>
