<% with $Team %>
    <div class="section section--HeaderImage">
        <div class="section_image">
            <% if $Image %>
                <img class="blurry" src="$Image.FocusFill(1920, 400).URL" alt="$Title" />
            <% else %>
                <img src="./_resources/app/client/icons/placeholder-header.png" alt="$Title" />
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
                <p>$Content</p>
            </div>
            <div class="section_members">
                <h2>Team Members</h2>
                <ul>
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
                </ul>
            </div>
        </div>
    </div>
<% end_with %>
