<% require javascript('$PLACEABLE_BANNER_DIR/js/jquery.cycle2.js') %>
<% if Banners %>
    <div {$ClassAttr}{$AnchorAttr}>
        <div class="slider cycle-slideshow"
            data-cycle-fx="ease"
            data-cycle-speed="500"
            data-cycle-timeout="6000"
            data-cycle-slides=">.slide"
            data-cycle-pager=">.pager-wrapper>.pager"
            data-cycle-swipe=true
            data-cycle-prev=">.prev"
            data-cycle-next=">.next"
            >
            <% loop Banners %>
                <% if Image %>
                    <% with Image %>
                        <div class="slide" style="background-image:url({$Fill(1400, 400).URL});">
                    <% end_with %>
                <% else %>
                    <div class="slide">
                    <% end_if %>
                    <div class="contents">
                        <% if Title %>
                            <p class="title">
                                {$Title}
                            </p>
                        <% end_if %>
                        <% if Content %>
                            <p class="content">
                                {$Content}
                            </p>
                        <% end_if %>
                        <% if Links %>
                            <div class="buttons">
                                <% loop Links %>
                                    {$setCSSClass('button')}
                                <% end_loop %>
                            </div>
                        <% end_if %>
                    </div>
                </div>
            <% end_loop %>
            <% if Banners.count() >=2 %>
            <div class="prev">
                previous
            </div>
            <div class="next">
                next
            </div>
            <div class="pager-wrapper">
                <div class="pager"></div>
            </div>
        <% end_if %>
    </div>
</div>
<% end_if %>
