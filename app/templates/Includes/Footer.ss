<div class="footer">
    <div class="footer_content">
        <div class="footer_text">Creative Lighthouse © 2023</div>
        <div class="footer_menu">
            <ul role="list" class="footer_menu_list w-list-unstyled">
                <% if $Locales %>
                    <% loop $Locales %>
                        <% if $LinkingMode != "current" %>
                            <li class="footer_menu_item">
                                <a href="$Link.ATT" <% if $LinkingMode != 'invalid' %>rel="alternate"
                                hreflang="$LocaleRFC1766"<% end_if %>>$Title</a>
                            </li>
                        <% end_if %>
                    <% end_loop %>
                <% end_if %>
                <% loop $Menu(1) %>
                    <% if $MenuPosition == "footer" %>
                        <li class="footer_menu_item">
                            <a href="$Link" class="footer_text">$MenuTitle</a>
                        </li>
                    <% end_if %>
                <% end_loop %>
            </ul>
        </div>
    </div>
</div>
