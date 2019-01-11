/* Representing the two sidebar types */
let expanded = $('#sidebar-expanded');
let collapsed = $('#sidebar-collapsed');
/* Global tabs to set in functions, then get when needed */
let activeTab; // fires BEFORE the click
let newActiveTab; // the NEW active class, a.k.a most recently selected
/* Initialize activeTab to be "dashboard-tab" on page load to assist
.brand.click redirect function */
$(function() {
    activeTab = "dashboard-tab";
    $('.content-wrapper').addClass('content-expanded');
});
/* Set activeTab to selected tab on click */
$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    activeTab = e.target.id;
});
/* When toggle is clicked, switch between two sidebar types depending on what is being displayed
currently  */
$('.toggler').click(function() {
    /* When dashboard is expanded, remove current value of activeTab and show collapsed version of sidebar. Append 'active' to the collapsed version's tabs and set
    newActiveTab as current tab select */
    if (expanded.is(":visible")) {
        $('.nav-tabs #' + activeTab).removeClass('active');
        $('.content-wrapper').removeClass('content-expanded');
        expanded.hide();
        collapsed.show();
        $('.content-wrapper').addClass('content-collapsed');
        $('.nav-tabs #' + newActiveTab).removeClass('active'); // Reset new
        $('.nav-tabs #' + activeTab).addClass('active'); // and add it to the recently selected tab
        newActiveTab = $('.nav-tabs a.active').attr('id'); // find the new active class
        /* Same for collapsed. Removing and adding classes ensures that classes don't stay active on the toggled sidebar, essentially
        reseting the current value */
    } else if (collapsed.is(":visible")) {
        $('.nav-tabs #' + activeTab).removeClass('active');
        $('.content-wrapper').removeClass('content-collapsed');
        collapsed.hide();
        expanded.show();
        $('.content-wrapper').addClass('content-expanded');
        $('.nav-tabs #' + newActiveTab).removeClass('active'); // Reset new
        $('.nav-tabs #' + activeTab).addClass('active'); // and add it to the recently selected tab
        newActiveTab = $('.nav-tabs a.active').attr('id'); // find the new active class
    }
});
/* Toggle 'active' class for username dropdown (activate transition / styling) */
$('#usernameDropdownToggle').click(function(e) {
    e.preventDefault();
    $('#usernameDropdownToggle .caret-dropdown').toggleClass('active');
    if ($('#usernameDropdownToggle .caret-dropdown').hasClass('active')) {
        $('#usernameDropdown').fadeIn(220);
    } else {
        $('#usernameDropdown').fadeOut(220);
    }
});
$('#dashboard-brand-redir').click(function(e) {
    e.preventDefault();
    $('#dashboard-tab').tab('show');
});