// Popups
function popupGrind(name) {
  const popup = $(".popupGrind." + name);
  const popupContent = popup.find(".mainPopup .popupContent");

  // Show overlay
  popup.addClass("show");
  $("body").css("overflow", "hidden");

  // Show main content
  setTimeout(() => {
    popupContent.addClass("show");
  }, 100);

  // Close popup function
  function closePopup() {
    popupContent.removeClass("show");

    setTimeout(() => {
      popup.removeClass("show");
      $("body").css("overflow", "auto");
    }, 100);
  }
  //End close popup function

  // Close popup rules

  // Esc button
  $(window).keyup(function (e) {
    if (e.keyCode == 27) closePopup();
  });

  // Close button
  $(popup.find(".closePopup")).click(function () {
    closePopup();
  });

  // Back button
  if (window.history && window.history.pushState) {
    window.history.pushState(
      "forward",
      null,
      window.location.pathname + "#forward"
    );

    $(window).on("popstate", function () {
      closePopup();
    });
  }
}

$(".bottomPopup").css("bottom", "-" + $(this).height() + "px");
// End Popups
