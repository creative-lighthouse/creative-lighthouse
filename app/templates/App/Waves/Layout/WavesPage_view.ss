<% with $Asset %>
    <% if $Top.AssetType = "Material" %>
        <div class="section section--wavesasset">
            <div class="section_content">
                <div class="section_backbutton">
                    <a href="$Top.Link" class="asset_card_button">←</a>
                </div>
                <div class="section_model">
                    <% include MaterialModel %>
                </div>
                <div class="section_text">
                    <h1 class="section_text_title">$Title</h1>
                    <div class="section_text_content">
                        $Description
                    </div>
                    <p class="section_text_category">Categories: <% loop $Categories %>$Title<% if not $IsLast %>, <% end_if %><% end_loop %></p>
                    <a href="$Page.Link()/download/$ID" class="asset_card_button asset_card_download">Download</a>
                </div>
            </div>
        </div>
    <% end_if %>
<% end_with %>
