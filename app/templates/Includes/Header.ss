<div class="header">
    <div class="header_nav">
        <div class="nav_menu left">
            <% loop $Menu(1) %>
            <% if $MenuPosition == "main1" %>
            <a href="$Link" class="nav_link<% if $LinkOrSection == "section" %> nav_link--active<% end_if %>">$MenuTitle</a>
            <% end_if %>
            <% end_loop %>
        </div>
        <a href="" class="nav_brand">
            <img src="_resources/app/client/icons/cl_logo.png">
        </a>
        <div class="nav_menu right">
            <% loop $Menu(1) %>
            <% if $MenuPosition == "main2" %>
            <a href="$Link" class="nav_link<% if $LinkOrSection == "section" %> nav_link--active<% end_if %>">$MenuTitle</a>
            <% end_if %>
            <% end_loop %>
        </div>
        <div class="nav_button" data-behaviour="toggle-menu">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
        </div>
    </div>
</div>
