<div class="header">
    <div class="header_nav">
        <a href="" class="nav_brand">
            <img src="_resources/app/client/icons/spu-logo.svg">
        </a>
        <h1 class="nav_title">SP Universe</h1>
        <div class="nav_menu" id="navMenu">
            <% loop $Menu(1) %>
                <% if $MenuPosition == "main1" %>
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
