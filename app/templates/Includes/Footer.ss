<div class="footer">
    <div class="footer_content">
        <div class="footer_text">SP Universe © $CurrentYear</div>
        <div class="footer_menu">
            <ul role="list" class="footer_menu_list w-list-unstyled">
                <% loop $Menu(1) %>
                    <% if $MenuPosition == "footer" %>
                        <li class="footer_menu_item">
                            <a href="$Link" class="footer_text">$MenuTitle</a>
                        </li>
                    <% end_if %>
                <% end_loop %>
            </ul>
        </div>
        <% if $Locales %>
            <div class="footer_languages">
                <% loop $Locales %>
                    <% if $LinkingMode != 'current' %>
                        <div class="footer_languages_setting $LinkingMode">
                            <a href="$Link.ATT" <% if $LinkingMode != 'invalid' %>rel="alternate"
                            hreflang="$LocaleRFC1766"<% end_if %>>
                                <img src="_resources/app/client/icons/language_flag-{$UrlSegment}.svg">
                            </a>
                        </div>
                    <% else %>
                        <div class="footer_languages_setting $LinkingMode">
                            <div>
                                <img src="_resources/app/client/icons/language_flag-{$UrlSegment}.svg">
                            </div>
                        </div>
                    <% end_if %>
                <% end_loop %>
            </div>
        <% end_if %>
    </div>
</div>
