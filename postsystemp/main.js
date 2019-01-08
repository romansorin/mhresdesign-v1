$(document).ready(function() {
    $('.toggler').click(function() {
        let expanded = $('#sidebar-expanded');
        let collapsed = $('#sidebar-collapsed');
        if (expanded.is(":visible")) {
            expanded.hide();
            collapsed.show();
        } else if (collapsed.is(":visible")) {
            collapsed.hide();
            expanded.show();
        }
    });
    $('#usernameDropdownToggle').click(function(e) {
        e.preventDefault();
        $('#usernameDropdownToggle .caret-dropdown').toggleClass('active');
    });
});