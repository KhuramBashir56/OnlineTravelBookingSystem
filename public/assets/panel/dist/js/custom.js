$(function () {
  "use strict";

  $(".preloader").fadeOut();
  // ==============================================================
  // Theme options
  // ==============================================================
  setInterval(() => {
    $('.my-alert').slideUp();
  }, 5000);
  // ==============================================================
  // sidebar-hover
  // ==============================================================

  $(".left-sidebar").hover(
    function () {
      $(".navbar-header").addClass("expand-logo");
    },
    function () {
      $(".navbar-header").removeClass("expand-logo");
    }
  );
  // this is for close icon when navigation open in mobile view
  $(".nav-toggler").on("click", function () {
    $("#main-wrapper").toggleClass("show-sidebar");
    $(".nav-toggler i").toggleClass("ti-menu");
  });
  $(".nav-lock").on("click", function () {
    $("body").toggleClass("lock-nav");
    $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
    $("body, .page-wrapper").trigger("resize");
  });

  // ==============================================================
  // Right sidebar options
  // ==============================================================
  $(function () {
    $(".service-panel-toggle").on("click", function () {
      $(".customizer").toggleClass("show-service-panel");
    });
    $(".page-wrapper").on("click", function () {
      $(".customizer").removeClass("show-service-panel");
    });
  });
  // ==============================================================
  // This is for the floating labels
  // ==============================================================
  $(".floating-labels .form-control")
    .on("focus blur", function (e) {
      $(this)
        .parents(".form-group")
        .toggleClass("focused", e.type === "focus" || this.value.length > 0);
    })
    .trigger("blur");

  // ==============================================================
  //tooltip
  // ==============================================================
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
  // ==============================================================
  //Popover
  // ==============================================================
  $(function () {
    $('[data-toggle="popover"]').popover();
  });

  // ==============================================================
  // Perfact scrollbar
  // ==============================================================
  $(".message-center, .customizer-body, .scrollable").perfectScrollbar({
    wheelPropagation: !0,
  });

  /*var ps = new PerfectScrollbar('.message-body');
    var ps = new PerfectScrollbar('.notifications');
    var ps = new PerfectScrollbar('.scroll-sidebar');
    var ps = new PerfectScrollbar('.customizer-body');*/

  // ==============================================================
  // Resize all elements
  // ==============================================================
  $("body, .page-wrapper").trigger("resize");
  $(".page-wrapper").delay(20).show();
  // ==============================================================
  // To do list
  // ==============================================================
  $(".list-task li label").click(function () {
    $(this).toggleClass("task-done");
  });

  //****************************
  /* This is for the mini-sidebar if width is less then 1170*/
  //****************************
  var setsidebartype = function () {
    var width = window.innerWidth > 0 ? window.innerWidth : this.screen.width;
    if (width < 1170) {
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  };
  $(window).ready(setsidebartype);
  $(window).on("resize", setsidebartype);
  //****************************
  /* This is for sidebartoggler*/
  //****************************
  var $mainWrapper = $("#main-wrapper");
  var $sidebartoggler = $(".sidebartoggler");

  $sidebartoggler.on("click", function () {
    // Toggle the "mini-sidebar" class on the main wrapper
    $mainWrapper.toggleClass("mini-sidebar");

    if ($mainWrapper.hasClass("mini-sidebar")) {
      $sidebartoggler.prop("checked", true);
      $mainWrapper.attr("data-sidebartype", "mini-sidebar");
    } else {
      $sidebartoggler.prop("checked", false);
      $mainWrapper.attr("data-sidebartype", "full");
    }
  });
});
